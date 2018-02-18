<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;
use App\User;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users', function (Request $request) {
	file_put_contents("php://stderr", "hello, this is a test!\n");
	return json_encode(response(User::all()));
});

Route::post('users', function (Request $request) {
	file_put_contents("php://stderr", "POST USERS: " . json_decode($request)["body"]);
	return "";
});
