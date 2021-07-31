<?php

use App\Http\Controllers\apiController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/login', [ apiController::class , 'login'] );

Route::post('/sanctum/token', function (Request $request){
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required'
    ]);

    $userlog = User::where('email', $request->email)->first();
    $allUser = User::all();

    if (! $userlog || ! Hash::check($request->password, $userlog->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    $token =  $userlog->createToken($request->device_name)->plainTextToken;
    $device = $request->device_name;
    $response = [
        [
            'user' => $userlog,
            'token' => $token,
            'device_name' => $device,
        ], 
        [
            'all_user' => $allUser
        ]
    ];

    return response($response, 201);
});
Route::group(['middleware' => 'auth:sanctum'], function(){
});