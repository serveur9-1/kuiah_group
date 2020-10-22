<?php

namespace App\Http\Controllers\v1;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use App\Mail\WelcomeToYou;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    public function __construct(Country $instance)
    {
        $this->instance = $instance;
    }

    public function index (Request $r)
    {
        return response()->json(
            CountryResource::collection($this->instance->newQuery()->get()),
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
                'name_fr' => 'required|unique:countries',
                'name_en' => 'required|unique:countries',
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
