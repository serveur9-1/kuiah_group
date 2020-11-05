<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
    public function __construct(Testimonial $instance)
    {
        $this->instance = $instance;
    }

    public function index()
    {
        return response()->json(
            $this->instance->newQuery()->get(),
            200
        );
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'company' => 'required',
                'content' => 'required'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $new = $this->instance->newQuery()->create([
            "name" => $request->get("name"),
            "company" => $request->get("company"),
            "content" => $request->get("content"),
        ]);

        return response()->json($new, 200);
    }


    public function show($id)
    {
        $selected = $this->instance->newQuery()->find($id);

        return response()->json($selected,200);
    }


    public function update(Request $request, $id)
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

    public function switchStatus($id)
    {

        $selected = $this->instance->newQuery()->findOrFail($id);

        $selected->update([
            'is_show' => !$selected->is_show
        ]);

        return response()->json($selected,200);

    }
}
