<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function __construct(Partner $instance)
    {
        $this->instance = $instance;
    }

    public function index (Request $r)
    {
        return response()->json($this->instance->newQuery()->get(),200);
    }

    public function store(Request $request)
    {
        /*Validation
        */
        $this->validate($request,[
            'name' => 'required|unique:partners',
            'img' => 'required',
        ]);

        $new = $this->instance->newQuery()->create([
            "name" => $request->get("name"),
            "img" => $request->get("img"),
        ]);

        return response()->json($new, 200);
    }

    public function update($id, Request $request)
    {
        $old = $this->instance->newQuery()->findOrFail($id);

        $old->name = $request->get("name");
        $old->img = $request->get("img");
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
