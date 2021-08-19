<?php

use App\Http\Controllers\apiController;
use App\Models\User;
use App\Models\Presensi;
use App\Models\Pegawai;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     $allUser = User::all();
//     $user = User::where('email', 'sandiduta@gmail.com')->get();
//     $response = 
//         [
//             'user' => $user
//         ];
//     // return response($user);
//     // return response()->json($response);;
//     return $request->user();
// });

Route::get('/login', [ apiController::class , 'login'] );

Route::post('/sanctum/token', function (Request $request){
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required'
    ]);

    $userlog = User::where('email', $request->email)->first();
    // $role = User::where('email', $request->email)->get('role');  -- GET THE FIELD ARRAY

    // GET THE FIELD VALUE
    $role = User::where('email', $request->email)->value('role');   

    $allUser = User::all();

    if (! $userlog || ! Hash::check($request->password, $userlog->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    $token =  $userlog->createToken($request->device_name)->plainTextToken;
    $device = $request->device_name;
    $response = [
        
            'user' => $userlog,
            'token' => $token,
            'role' => $role,
            'device_name' => $device,
            'all_user' => $allUser
        
    ];
    $resrole = [
        'role' => $role
    ];

    return response($response, 201);
});

Route::get('/dummy', [apiController::class, 'dummy']);

Route::get('/presensi/{id}/get', function ($id) {
    $id - $request->id;
    $data_presensi = Presensi::where('pegawai_id', '=', $id)->get();

    $data_pegawai = Pegawai::find($id);

    $response = [
        'data_presensi' => $data_presensi,
        'data_pegawai' => $data_pegawai
    ];

    // return $id;s
    return response()->json($response);
});


// Get the desired data for attendant system

Route::post('/presensi/getpresent', [apiController::class, 'getpresent']);
Route::post('/presensi/getupdate', [apiController::class, 'getupdate']);


Route::post('/presensi/present', [apiController::class, 'present']);

Route::post('/presensi/absent', [apiController::class, 'absent'])->name('absent');
Route::put('/presensi/{id}/update',[apiController::class, 'update'])->name('present.update');


Route::group(['middleware' => 'auth:sanctum'], function(){

    Route::get('/user', function (Request $request) {
        $allUser = User::all();
        // $user = User::where('email', 'sandiduta@gmail.com')->get();
        $response = 
            [
                'user' => $allUser
            ];
        // return response($user);
        // return response()->json($response);;
        return $request->user();
    });
    Route::post('/logout', function (Request $request) {
        $request->user()->tokens()->delete();
    
        return response('Loggedout', 200);
    });

});