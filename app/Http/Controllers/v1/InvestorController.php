<?php

namespace App\Http\Controllers\v1;

use App\Investor;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvestorController extends Controller
{
    public function __construct(Investor $investor, User $user)
    {
        $this->instance = $investor;
        $this->user = $user;
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
                'user_id' => 'required',
                'domain' => 'required',
                'domains' => 'required',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $user = $this->user->newQuery()->find($request->get("user_id"));
        $this->user->newQuery()->update(["process_type_is_investor" => false ]);

        $new = $this->instance->newQuery()->create($request->all());

        if(is_array($request->get('domains')))
        {
            $user->toDomains()->sync($request->get('domains'));
        }

        return response()->json([
            "success" => true,
            "message" => "Profile completed successfully",
        ],200);
    }

    public function update($id, Request $request)
    {
        $selected = $this->instance->newQuery()->findOrFail($id);

        $selected->update($request->all());

        return response()->json($selected, 200);
    }
}
