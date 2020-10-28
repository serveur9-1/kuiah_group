<?php

use App\Http\Controllers\v1\DomainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(['prefix' => 'v1'], function () {

    Route::group(['middleware' => ['json.response']], function () {

        Route::get('/users/mail/test', 'v1\UserController@testMail');

        Route::resource('users', \v1\UserController::class)->except(['store']);
        Route::post('users/{user}/status', 'v1\UserController@switchStatus')->where('user','[0-9]+');

        Route::resource('investors', \v1\InvestorController::class)->only(['store', 'update']);

        Route::resource('countries', \v1\CountryController::class);
        Route::resource('industries',\v1\IndustryController::class);
        Route::resource('domains',\v1\DomainController::class);
        Route::resource('partners',\v1\PartnerController::class);
        Route::resource('stades',\v1\StadeController::class);
        Route::resource('real_estates',\v1\RealEstateController::class);
        Route::get('projects/filter', ['uses' => 'v1\ProjectController@filtered']);
        Route::resource('projects',\v1\ProjectController::class)->except(['update']);

        //Auth
        Route::post('users/login', ['uses' => 'v1\AuthController@login']);
        Route::post('users/register', ['uses' => 'v1\AuthController@register']);

        Route::middleware('auth:api')->group(function () {

            Route::post('users/logout', ['uses' => 'v1\AuthController@logout']);

        });


        //WARNING:  Laissez toujours en bas
        Route::group(['middleware' => 'makePostPatch'], function () {
            Route::post('projects/{project}', ['uses' => 'v1\ProjectController@update'])->where('user','[0-9]+');
        });
    });

});
