<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Partner;
use App\Shared\SaveFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PartnerController extends Controller
{
    public function __construct(Partner $instance, SaveFiles $__save)
    {
        $this->instance = $instance;
        $this->__save = $__save;
    }

    public function index (Request $r)
    {
        return response()->json($this->instance->newQuery()->get(),200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|unique:partners',
                'img' => 'required|max:2048',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        if ($files = $request->file('img')) {

            $data = $this->__save->save(true,"partners", "img", $request);
            // $data[0] return 1st item of array which verify if there are many files (true if an array)
            $new = $this->instance->newQuery()->create([
                "name" => $request->get("name"),
                "img" => $data[2],
            ]);

            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "img" => asset($data[1])
            ]);

        }
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
