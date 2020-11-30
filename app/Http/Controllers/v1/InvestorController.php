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

        $this->user->newQuery()->update([
            "is_register_process_completed" => true
        ]);

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
        $user = User::find($id);
        if(!$user) return response()->json(["error" => "User not find"], 401); 
        $selected = $this->instance->newQuery()->where("user_id",$id);

        if(!$selected) return response()->json(["error" => "Not a business angel"], 401); 

        $r = $request->except('is_fr');
        $selected->update($r);

        return response()->json(["message" => "Updated successfully"], 200);
    }
}
