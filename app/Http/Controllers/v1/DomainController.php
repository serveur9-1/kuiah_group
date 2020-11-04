<?php

namespace App\Http\Controllers\v1;

use App\Domain;
use App\Http\Controllers\Controller;
use App\Http\Resources\DomainResource;
use App\Shared\SaveFiles;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;

class DomainController extends Controller
{
    public function __construct(Domain $instance, SaveFiles $__save)
    {
        $this->instance = $instance;
        $this->__save = $__save;
    }

    public function index (Request $r)
    {
        return response()->json(
            DomainResource::collection($this->instance->newQuery()->get()),
            200
        );
    }

    //Filtered
    public function filter(Request $request)
    {
        $prj = Domain::orderBy('created_at','desc');

        if(count($prj->get()) <= 2*intval($request->get('per')))
        {
            return DomainResource::collection($prj->paginate($request->get('per') ?? 10));
        }

        if($request->has('user_id') && $request->filled('user_id'))
        {
            $user = User::where('id', $request->get("user_id"))->first();

            if($user)
            {
                //Filter by user's choosen domains
                $ids = Arr::pluck($user->toDomains, "id");
                $prj = $prj->orWhereIn("id", $ids);

                //filter by user's interesting projects domain_id
                if($user->toInvestor)
                {
                    $ids = Arr::pluck(
                        $user->toInvestor->toInterestedProjects,
                        "id"
                    );

                    if(count($ids) > 0) $prj = $prj->orWhereIn("id", $ids);

                }
            }

            return DomainResource::collection($prj->paginate($request->get('per') ?? 10));
        }
    }

    public function store(Request $request)
    {
        /*Validation
        */

        $validator = Validator::make($request->all(),
            [
                'name_fr' => 'required|unique:domains',
                'name_en' => 'required|unique:domains',
                "img" => 'required|max:2048',
                "industry_id" => 'required',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        if ($files = $request->file('img')) {

            $data = $this->__save->save(true,"domains", "img", $request->get("name_fr"),$request);
            // $data[0] return 1st item of array which verify if there are many files (true if an array)
            $new = $this->instance->newQuery()->create([
                "name_fr" => $request->get("name_fr"),
                "name_en" => $request->get("name_en"),
                "img" => $data[2],
                "industry_id" => $request->get("industry_id"),
            ]);

            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "img" => asset($data[1]),
                "name_fr" => $request->get("name_fr"),
                "name_en" => $request->get("name_en"),
            ]);

        }

    }

    public function show($id, Request $req)
    {
        $selected = $this->instance->newQuery()->find($id);
        $u = new DomainResource($selected);

        return response()->json($u,200);
    }

    public function update($id, Request $request)
    {
        $old = $this->instance->newQuery()->findOrFail($id);

        $old->update($request->all());

        return response()->json($old, 200);
    }

    public function destroy($id)
    {
        $selected = $this->instance->newQuery()->findOrFail($id);
        $selected->delete();
        return response()->json(null,200);
    }
}
