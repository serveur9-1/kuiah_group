<?php

namespace App\Http\Controllers\v1;

use App\Domain;
use App\Http\Controllers\Controller;
use App\Http\Resources\DomainResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DomainController extends Controller
{
    public function __construct(Domain $instance)
    {
        $this->instance = $instance;
    }

    public function index (Request $r)
    {
        return response()->json(
            DomainResource::collection($this->instance->newQuery()->get()),
            200
        );
    }

    public function store(Request $request)
    {
        /*Validation
        */

        $validator = Validator::make($request->all(),
            [
                'name_fr' => 'required|unique:domains',
                'name_en' => 'required|unique:domains',
                "img" => 'required',
                "industry_id" => 'required',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $new = $this->instance->newQuery()->create([
            "name_fr" => $request->get("name_fr"),
            "name_en" => $request->get("name_en"),
            "img" => $request->get("img"),
            "industry_id" => $request->get("industry_id"),
        ]);

        return response()->json($new, 200);
    }

    public function update($id, Request $request)
    {
        $old = $this->instance->newQuery()->findOrFail($id);

        $old->name_fr = $request->get("name_fr");
        $old->name_en = $request->get("name_en");
        $old->img = $request->get("img");
        $old->industry_id = $request->get("industry_id");
        $old->save();

        return response()->json($old, 200);
    }

    public function destroy($id)
    {
        $selected = $this->instance->newQuery()->findOrFail($id);
        $selected->delete();
        return response()->json(null,200);
    }
}
