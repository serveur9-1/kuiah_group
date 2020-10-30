<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Client as OClient;
use Illuminate\Support\Str;

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
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $password = $request->password;
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $oClient = OClient::where('password_client', 1)->first();

        //return new waitAccountValidate($request);

        return $this->getTokenAndRefreshToken($oClient, $user->email, $password);
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
            $rand = Str::random(5);

            //Code expire in 15min
            $expire = now()->addMinute(15);

            $user->update([
                "password_reset_code" => $rand,
                "password_reset_code_created" => $expire
            ]);

            //Send mail with params @email, @rand, @expire

            return response()->json([
                'code' => $rand,
                "expire_in" => $expire
            ], 200);

        } else {
            return response()->json(['error'=>"User does not exist"], 401);
        }
    }

    //Verify reset password code
    public function checkResetCode(Request $request)
    {
        $user = User::where('password_reset_code', $request->get('password_reset_code'))->first();

        if($user)
        {
            //Code expire in 15min
            if($user->password_reset_code_created < now()->toDateTimeString())
            {
                return response()->json(['error' => "Code expired"], 401);
            }

            $user->update([
                "password_reset_code" => null,
                "password_reset_code_created" => null
            ]);

            return response()->json(['message' => 'Code is validate'], 200);

        } else {
            return response()->json(['error' => "Code does not exist"], 401);
        }
    }


    //Modify password
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $user = User::where('email', $request->user()->email)->first();

        if($user)
        {
            $user->update([
                "password" => bcrypt($request->get('email')),
                "password_reset_code" => null,
                "password_reset_code_created" => null
            ]);

            return response()->json(["message" => "Password updated"], 200);

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

        $result = json_decode((string) $response->getBody(), true);
        return response()->json($result, $this->successStatus);
    }
}
