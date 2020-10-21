<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\IndustryResource;
use App\Industry;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    public function __construct(Industry $instance)
    {
        $this->instance = $instance;
    }

    public function index (Request $r)
    {
        return response()->json(
            IndustryResource::collection($this->instance->newQuery()->get()),
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
        $this->validate($request,[
            'name_fr' => 'required|unique:industries',
            'name_en' => 'required|unique:industries',
        ]);

        $new = $this->instance->newQuery()->create([
            "name_fr" => $request->get("name_fr"),
            "name_en" => $request->get("name_en")
        ]);

        return response()->json($new, 200);
    }

    public function update($id, Request $request)
    {
        $old = $this->instance->newQuery()->findOrFail($id);

        $old->name_fr = $request->get("name_fr");
        $old->name_en = $request->get("name_en");
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
