<?php

namespace App\Http\Controllers\v1;

use App\Media;
use App\RealEstate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\RealEstateResource;
use App\Shared\SaveFiles;
use App\Mail\waitAdsValidate;
use App\Mail\enableOrDisableProject;


class RealEstateController extends Controller
{
    public function __construct(RealEstate $instance, SaveFiles $__save)
    {
        $this->instance = $instance;
        $this->__save = $__save;
    }

    public function index (Request $r)
    {
        return RealEstateResource::collection($this->instance->newQuery()->where("is_deleted", false)->paginate($r->get('per') ?? 10));
    }

    public function store(Request $request)
    {
        $action = "created";
        $new = null;

        if($request->get("step") == 1 && !$request->get("update")){
            $validator = Validator::make($request->all(),
                [
                    "title"=> 'required',
                    "description" => 'required',
                    "price" => 'required',
                    "country_id" => 'required',
                    "user_id" => 'required',
                ]
            );

            if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()], 401);
            }

            $new = $this->instance->newQuery()->create($request->all());

        }

        if($request->get("step") == 1 && $request->get("update")){
            $validator = Validator::make($request->all(),
                [
                    "title"=> 'required',
                    "description" => 'required',
                    "price" => 'required',
                    "country_id" => 'required',
                    "user_id" => 'required',
                ]
            );

            if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()], 401);
            }

            $input = $request->except(["is_fr", "step", "update"]);
            $new = $this->instance->newQuery()->update($input);

        }

        // $validator = Validator::make($request->all(),
        //     [
        //         "title"=> 'required',
        //         "description" => 'required',
        //         "price" => 'required',
        //         "country_id" => 'required',
        //         "user_id" => 'required',
        //         "medias" => "required",
        //     ]
        // );

        // if ($validator->fails()) {
        //     return response()->json(['error'=>$validator->errors()], 401);
        // }

        // $new = null;

        // if ($files = $request->file('medias')) {

        //     $new = $this->instance->newQuery()->create($request->all());

        //     $data = $this->__save->save(true,"realestates", "medias",  "realestate_$new->id", $request);
        //     // $data[0] return 1st item of array which verify if there are many files (true if an array)

        //     for ($i = 1; $i < count($data); $i++)
        //     {
        //         Media::create([
        //             "name" => $data[$i],
        //             "real_estate_id" => $new->id,
        //         ]);
        //     }
        // } else {
        //     return response()->json(['error'=>'Medias are not files'], 401);
        // }

        $request->name = "sande";
        $request->email = "francksande@live.ca";

        //return new waitAdsValidate($request);

        return response()->json([
            "message" => "Real estate $action successfully",
            "data" => $new
        ], 200);
    }

    public function show($id, Request $req)
    {
        $selected = $this->instance->newQuery()->find($id);
        $u = new RealEstateResource($selected);

        return response()->json($u,200);

    }

    public function update($id, Request $request)
    {
        $old = $this->instance->newQuery()->findOrFail($id);

        $old->update($request->all());

        return response()->json($old, 200);
    }

    //When a user archives a project #Lorsqu'un utilisateur met son projet en archive.

    public function destroy($id)
    {
        $selected = $this->instance->newQuery()->findOrFail($id);

        $selected->update([
            'is_deleted' => true
        ]);

        return response()->json(["message" => "Real estate has been deleted successfully"], 200);
    }

    public function switchStatus($id, Request $request)
    {
        $selected = $this->instance->newQuery()->findOrFail($id);

        $state = $selected->is_actived ? 'locked' : 'actived';

        $selected->update([
            'is_actived' => !$selected->is_actived
        ]);

        if($selected->is_first_activation)
        {
            $selected->update([
                'is_first_activation' => false
            ]);
        }

        $selected->is_fr = $request->is_fr;

        $selected->name = "sande";
        $selected->email = "francksande@live.ca";

        //return new enableOrDisableProject($selected);

        return response()->json(["message" => "Real estate has been $state successfully"], 200);

    }

    //When user archives or actives his project.

    public function archiveRealEstate($id, Request $request)
    {
        $selected = $this->instance->newQuery()->findOrFail($id);

        $selected->update([
            'is_archived' => !$selected->is_archived
        ]);

        $status = !$selected->is_archived? 'actived' : 'archived';

        // Send mail

        $selected->is_fr = $request->is_fr;

        $selected->name = "sande";
        $selected->email = "francksande@live.ca";

        return response()->json(["message" => "Real estate has been $status"],200);
    }
}
