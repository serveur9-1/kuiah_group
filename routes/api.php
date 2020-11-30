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

        Route::resource('teams',\v1\TeamController::class)->only(['destroy']);
        Route::resource('real_estates',\v1\RealEstateController::class);
        Route::post('real_estates/{real_estate}/status', 'v1\RealEstateController@switchStatus')->where('real_estate','[0-9]+');
        Route::post('real_estates/{real_estate}/archive', 'v1\RealEstateController@archiveRealEstate')->where('real_estate','[0-9]+');
        Route::post('real_estates/{project}/archive', 'v1\ProjectController@archiveProject')->where('project','[0-9]+');

        //Middleware applied in Controller
        Route::post('projects/{project}/status', 'v1\ProjectController@switchStatus')->where('project','[0-9]+');
        Route::post('projects/{project}/archive', 'v1\ProjectController@archiveProject')->where('project','[0-9]+');
        Route::post('projects/{project}/publish', 'v1\ProjectController@publish')->where('project','[0-9]+');
        Route::get('projects/filter', ['uses' => 'v1\ProjectController@filtered']);
        Route::resource('projects',\v1\ProjectController::class)->except(['update']);
        
        Route::resource('project_steps', \v1\InterestingProjectStepController::class)->only(['index']);


        Route::resource('investors', \v1\InvestorController::class)->only(['store', 'update']);

        Route::resource('countries', \v1\CountryController::class);
        Route::resource('industries',\v1\IndustryController::class);
        Route::resource('partners',\v1\PartnerController::class);
        Route::resource('stades',\v1\StadeController::class);

        Route::resource('stats',\v1\StatsController::class);

        //Testimonials
        Route::resource('testimonials',\v1\TestimonialController::class);
        Route::post('testimonials/{testimonial}/status', 'v1\TestimonialController@switchStatus')->where('testimonial','[0-9]+');

        //Domains
        Route::resource('domains',\v1\DomainController::class);
        Route::get('domains/resource/filter','v1\DomainController@filter');

        Route::resource('users', \v1\UserController::class)->except(['store']);
        Route::post('users/{user}/status', 'v1\UserController@switchStatus')->where('user','[0-9]+');
        Route::post('users/domains/add', 'v1\UserController@addDomain');
        Route::post('users/updateProfil', 'v1\UserController@uploadProfilePicture');

        //Auth
        Route::post('users/login', ['uses' => 'v1\AuthController@login']);
        Route::post('users/register', ['uses' => 'v1\AuthController@register']);
        Route::post('users/refreshtoken', 'v1\AuthController@refreshToken');
        Route::post('users/oldPassword/{user}', 'v1\AuthController@oldPassword');
        Route::post('users/generatecode', 'v1\AuthController@generateResetPasswordCode');
        Route::post('users/checkresetcode', 'v1\AuthController@checkResetCode');

        // Route::post('users/updateProfil', 'v1\UserController@uploadProfilePicture');

        //Extra
        Route::get('/unauthorized', 'v1\AuthController@unauthorized');

        //Private routes
        Route::middleware('auth:api')->group(function () {

            //Project
            Route::post('projects/{project}/changestep', ['uses' => 'v1\ProjectController@changeStep'])->where('project','[0-9]+');
            Route::post('projects/{project}/itinterestmeornot', ['uses' => 'v1\ProjectController@itInterestMe'])->where('project','[0-9]+');

            //Auth private
            Route::post('users/logout', ['uses' => 'v1\AuthController@logout']);
            Route::post('users/updatePassword', 'v1\AuthController@updatePassword');

            // User Private
            // Route::resource('users', \v1\UserController::class)->except(['store']);
            // Route::post('users/{user}/status', 'v1\UserController@switchStatus')->where('user','[0-9]+');
            // Route::post('users/domains/add', 'v1\UserController@addDomain');
            // Route::post('users/updateProfil', 'v1\UserController@uploadProfilePicture');

        });


        //WARNING:  Laissez toujours en bas
        Route::group(['middleware' => 'makePostPatch'], function () {
            Route::post('projects/{project}', ['uses' => 'v1\ProjectController@update'])->where('user','[0-9]+');
        });
    });

});
