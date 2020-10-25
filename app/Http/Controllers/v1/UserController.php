<?php

namespace App\Http\Controllers\v1;
use App\Http\Resources\UserResource;
use App\User;
use App\Http\Controllers\Controller;
use App\Mail\WelcomeToYou;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    // http://localhost:8000/api/v1/users/mail/test?lang=en
    public function testMail(Request $request)
    {
        /*
         * @param array
         *  email: string
         *  name: string*/

        $request->email = "ymjm97@gmail.com";
        $request->name = "Yves";

        //Mail::send(new WelcomeToYou($request));
        return new WelcomeToYou($request);
    }

    public function __construct(User $user)
    {
        $this->instance = $user;
    }

    public function index()
    {
        return response()->json(UserResource::collection($this->instance->newQuery()->get()),200);
    }

    public function show($id)
    {
        $selected = $this->instance->newQuery()->find($id);
        return response()->json(new UserResource($selected),200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $new = $this->instance->newQuery()->create($request->all());

        return response()->json(new UserResource($new),200);
    }

    public function update($id, Request $request)
    {
        $selected = $this->instance->newQuery()->findOrFail($id);

        $selected->update($request->all());

        return response()->json(new UserResource($selected), 200);
    }

    public function destroy($id)
    {
        $selected = $this->instance->newQuery()->findOrFail($id);

        $selected->update([
            'is_archived' => true
        ]);

        $selected->is_archived = true;

        return response()->json(new UserResource($selected), 200);
    }

    public function switchStatus($id)
    {
        $selected = $this->instance->newQuery()->findOrFail($id);

        $selected->update([
            'is_actived' => !$selected->is_actived
        ]);


        return response()->json(new UserResource($selected), 200);
    }

}
