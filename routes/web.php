<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::view('forgot_password', 'auth.reset_password')->name('password.reset');

Route::get('/forgot_success', function () {
    return view('auth.reset_succed');
})->name('password.success');

Route::get('/forgot_failure', function () {
    return view('auth.reset_failure');
})->name('password.failure');

Route::post('password/reset', 'v1\AuthController@reset')->name('reset.post');

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
