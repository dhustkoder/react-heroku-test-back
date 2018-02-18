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

Route::post('users/register', function (Request $request) {
	try {
		file_put_contents("php://stderr",
			"POST USERS: "
			. "login: " . (string)$request->input('login') . "\n"
			. "email: " . (string)$request->input('email') . "\n"
			. "password: " . (string)$request->input('password') . "\n"
		);

		$user = User::where('name', (string)$request->input('login'));

		if ($user != null)
			return json_encode(response("{ \"error\": \"Email já em uso\" }"));

		User::create([
			'name' => $request->input('login'),
			'email' => $request->input('email'),
			'password' => $request->input('password'),
		]);

		return json_encode(response("{ \"success\": \"Usuário registrado com sucesso\" }"));
	} catch (Exception $error) {
		return json_encode(response("{ \"error\": \"" . (string)$error->getMessage() . "\""));
	}
});
