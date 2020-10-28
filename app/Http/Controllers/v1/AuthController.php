<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Client as OClient;

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
