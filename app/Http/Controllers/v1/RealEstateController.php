<?php

namespace App\Http\Controllers\v1;

use App\RealEstate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\RealEstateResource;


class RealEstateController extends Controller
{
    public function __construct(RealEstate $instance)
    {
        $this->instance = $instance;
    }

    public function index (Request $r)
    {
        return response()->json(
            RealEstateResource::collection($this->instance->newQuery()->get()),
            200
        );
    }

    public function store(Request $request)
    {
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

        return response()->json($new, 200);
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

    public function destroy($id)
    {
        $selected = $this->instance->newQuery()->findOrFail($id);
        $selected->delete();
        return response()->json(null,200);
    }
}
