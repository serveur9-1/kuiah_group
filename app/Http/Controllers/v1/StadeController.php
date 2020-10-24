<?php

namespace App\Http\Controllers\v1;


use App\Stade;
use App\Http\Controllers\Controller;
use App\Http\Resources\StadeResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StadeController extends Controller
{
    public function __construct(Stade $instance)
    {
        $this->instance = $instance;
    }

    public function index (Request $r)
    {
        return response()->json(
            StadeResource::collection($this->instance->newQuery()->get()),
            200
        );

        /*#Tu peux utiliser ça si necessaire
         *
         * return $this->instance->newQuery()->get();*/
    }

    public function store(Request $request)
    {
        /*Validation
        */

        $validator = Validator::make($request->all(),
            [
                'name_fr' => 'required|unique:stades',
                'name_en' => 'required|unique:stades',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $new = $this->instance->newQuery()->create([
            "name_fr" => $request->get("name_fr"),
            "name_en" => $request->get("name_en")
        ]);

        return response()->json($new, 200);
    }

    public function show($id, Request $req)
    {
        $selected = $this->instance->newQuery()->find($id);
        $u = new StadeResource($selected);

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
