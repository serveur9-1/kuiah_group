<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeToYou;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


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
}
