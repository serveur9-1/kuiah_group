<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\User;
use App\Investor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Client as OClient;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;

use App\Mail\waitAccountValidate;

class AuthController extends Controller
{
    public $successStatus = 200;

    public function login(Request $request) {
        $user = User::where('email', $request->get('email'))->first();

        if($user)
        {
            if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
                $oClient = OClient::where('password_client', 1)->first();
                return $this->getTokenAndRefreshToken($oClient, $request->get('email'), $request->get('password'));
            }
            else {
                return response()->json(['error'=>'Password missmatch'], 401);
            }

        } else {
            return response()->json(['error'=>"User does not exist"], 401);
        }
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'is_investor' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $password = $request->password;
        $input = $request->except('is_fr');
        $input['password'] = bcrypt($input['password']);
        $input['process_type_is_investor'] = (boolean) $input['is_investor'];
        $input['is_register_process_completed'] = (boolean) !$input['is_investor'];

        $user = User::create($input); // create user

        // All users are an investor (empty or not)
        if(!$input['is_investor']) Investor::create([
            "is_investor" => false,
            "user_id" => $user->id
        ]);

        //return new waitAccountValidate($request);

        if (Auth::attempt(['email' => $user->email, 'password' => $request->get('password')])) {
            $oClient = OClient::where('password_client', 1)->first();
            return $this->getTokenAndRefreshToken($oClient, $user->email, $request->get('password'));
        }
    }

    public function logout (Request $request) {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, $this->successStatus);
    }

    public function generateResetPasswordCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $user = User::where('email', $request->get('email'))->first();

        if($user)
        {
            // $rand = Str::random(5);

            // //Code expire in 15min
            // $expire = now()->addMinute(15);

            // $user->update([
            //     "password_reset_code" => $rand,
            //     "password_reset_code_created" => $expire
            // ]);

            // //Send mail with params @email, @rand, @expire f

            // return response()->json([
            //     'code' => $rand,
            //     "expire_in" => $expire
            // ], 200);

            Password::sendResetLink(["email" => $request->get('email')]);

            return response()->json([
                "message" => 'Reset password link sent on your email',
                "status" => 200
            ], 200);

        } else {
            return response()->json(['error'=>"User does not exist"], 401);
        }
    }

    public function reset() {
        $credentials = request()->validate([
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|confirmed'
        ]);

        $reset_password_status = Password::reset($credentials, function ($user, $password) {
            $user->password = bcrypt($password);
            $user->save();
        });

        if ($reset_password_status == Password::INVALID_TOKEN) {
            // return response()->json(["msg" => "Invalid token provided"], 400);
            return redirect()->route("password.failure")->with("msg", "Invalid token provided");
        }

        //return response()->json(["msg" => "Password has been successfully changed"]);
        return redirect()->route("password.success")->with("msg", "Password has been successfully changed");
    }

    //Verify reset password code
    public function checkResetCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password_reset_code' => 'required|min:5|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $user = User::where('password_reset_code', $request->get('password_reset_code'))->first();

        if($user)
        {

            //New password
            $new_pwd = Str::random(5);

            //Code expire in 15min
            if($user->password_reset_code_created < now()->toDateTimeString())
            {
                return response()->json(['error' => "Code expired"], 401);
            }

            $user->update([
                "password_reset_code" => null,
                "password_reset_code_created" => null,
                "password" => bcrypt($new_pwd)
            ]);

            //Send mail within new password

            $request->email = $user->email;
            $request->password = $new_pwd;

            //login regenerate token
            if (Auth::attempt(['email' => $user->email, 'password' => $new_pwd])) {
                $oClient = OClient::where('password_client', 1)->first();
                return $this->getTokenAndRefreshToken($oClient, $user->email, $new_pwd);
            } else {
                return response()->json(['error' => "An error occured"], 401);
            }

        } else {
            return response()->json(['error' => "Code does not exist"], 401);
        }
    }


    //Modify password
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $user = User::where('email', $request->user()->email)->first();

        if($user)
        {
            $user->update([
                "password" => bcrypt($request->get('password')),
                "password_reset_code" => null,
                "password_reset_code_created" => null
            ]);

            return response()->json(["message" => "Password updated"], 200);

        } else {
            return response()->json(['error'=>"User does not exist"], 401);
        }
    }

    //old password
    public function oldPassword($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $user = User::where('id', $id)->first();

        if($user)
        {
            if(Auth::attempt(['email' => $user->email, 'password' => $request->get('old_password')])){

                $user->update([
                    "password" => bcrypt($request->get('password')),
                ]);

                return response()->json(["message" => "Password updated"], 200);
            }else{

                return response()->json(['error'=>"Old password incorrect"], 401);
            }


        } else {
            return response()->json(['error'=>"User does not exist"], 401);
        }
    }


    public function refreshToken(Request $request) {
        $refresh_token = $request->header('Refresh-Token');
        $oClient = OClient::where('password_client', 1)->first();

        $http = new Client([
            'base_uri' => 'http://localhost:8001',
            'defaults' => [
                'exceptions' => false
            ]
        ]);

        try {

            $response = $http->request('POST', '/oauth/token', [
                'form_params' => [
                    'grant_type' => 'refresh_token',
                    'refresh_token' => $refresh_token,
                    'client_id' => $oClient->id,
                    'client_secret' => $oClient->secret,
                    'scope' => '*',
                ],
            ]);
            return json_decode((string) $response->getBody(), true);

        } catch (Exception $e) {
            $response = ['message' => 'Unauthorized'];
            return response()->json($response, 401);
        }
    }

    public function unauthorized()
    {
        $response = ['message' => 'Unauthorized'];
        return response()->json($response, 401);
    }

    public function getTokenAndRefreshToken(OClient $oClient, $email, $password) {
        $oClient = OClient::where('password_client', 1)->first();
        $http = new Client([
            'base_uri' => 'http://localhost:8001',
            'defaults' => [
                'exceptions' => false
            ]
        ]);
        $response = $http->request('POST', '/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => $oClient->id,
                'client_secret' => $oClient->secret,
                'username' => $email,
                'password' => $password,
                'scope' => '*',
            ],
        ]);
        $info = $response->getBody();
        $result = json_decode((string) $info, true);
        $result["user_id"] = auth()->user()->id;
        $result["is_investor"] = auth()->user()->is_investor;
        $result["process_type_is_investor"] = auth()->user()->process_type_is_investor;
        $result["is_register_process_completed"] = auth()->user()->is_register_process_completed;
        return response()->json($result, $this->successStatus);
    }
}
