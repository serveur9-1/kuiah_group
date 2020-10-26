<?php

namespace App\Http\Controllers\v1;

use App\Investor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvestorController extends Controller
{
    public function __construct(Investor $investor)
    {
        $this->instance = $investor;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'is_investor' => 'required',
                'country' => 'required',
                'city' => 'required',
                'biography' => 'required',
                'min' => 'required',
                'max' => 'required',
                'user_id' => 'required'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $new = $this->instance->newQuery()->create($request->all());

        return response()->json($new,200);
    }

    public function update($id, Request $request)
    {
        $selected = $this->instance->newQuery()->findOrFail($id);

        $selected->update($request->all());

        return response()->json($selected, 200);
    }
}
