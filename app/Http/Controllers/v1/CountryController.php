<?php

namespace App\Http\Controllers\v1;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function __construct(Country $country)
    {
        $this->country = $country;
    }

    public function index (Request $r)
    {
        return CountryResource::collection($this->country->newQuery()->get());
    }

    public function store(Request $request)
    {
        /*Validation
        */
        $this->validate($request,[
            'name_fr' => 'required|unique:countries',
            'name_en' => 'required|unique:countries',
        ]);

        $new = $this->country->newQuery()->create([
            "name_fr" => $request->get("name_fr"),
            "name_en" => $request->get("name_en")
        ]);

        return response()->json($new, 200);
    }

    public function update($id, Request $request)
    {
        $old = $this->country->newQuery()->findOrFail($id);

        $old->name_fr = $request->get("name_fr");
        $old->name_en = $request->get("name_en");
        $old->save();

        return response()->json($old, 200);
    }

    public function destroy($id)
    {
        $selected = $this->country->newQuery()->findOrFail($id);
        $selected->delete();
        return response()->json($selected,200);
    }
}
