<?php

namespace App\Http\Controllers\v1;
use App\Http\Resources\UserResource;
use App\User;
use App\Http\Controllers\Controller;
use App\Mail\WelcomeToYou;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\waitAccountValidate;
use App\Mail\enableOrDisableAccount;

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
        $request->title = "le tueur qui tue";
        $request->img = "http://localhost:8000/public/partners/kuiahfinance_profil.jpeg";
        $request->description = "le tueur qui tue";

        //Mail::send(new WelcomeToYou($request));

        //send salutation
         return new waitAdsValidate($request);


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

    public function switchStatus($id, Request $request)
    {
        $selected = $this->instance->newQuery()->findOrFail($id);

        $selected->update([
            'is_actived' => !$selected->is_actived
        ]);

        // new UserResource($selected)

        // Send mail

        if(!$selected->is_actived)
        {
            $selected->update([
                'is_first_activation' => false
            ]);
        }

        $selected->is_fr = $request->is_fr;

        return new enableOrDisableAccount($selected);

    }

    //Upload profile picture

    public function uploadProfilePicture(Request $request)
    {

    }

}
