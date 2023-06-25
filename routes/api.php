<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProductController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('password', function(){
    return bcrypt('taufiq');
});

// Route::apiResource('product',ProductController::class)-> middleware('auth:api');
Route::apiResource('matakuliah',MatakuliahController::class);

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

   
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

     // Route::post('login', 'AuthController@login');
    // Route::get('login', 'AuthController@login')->name('login');
    // Route::post('refresh', 'AuthController@refresh');
    // Route::post('me', 'AuthController@me');
    // Route::post('logout', 'AuthController@logout');

});


// Route::group(['prefix' => 'v1'], function(){

//     Route::get('/', [ProductController::class, 'index']);
//     Route::get('/task/{id}', [ProductController::class, 'show']);
//     Route::delete('task/{id}', [ProductController::class, 'delete']);



//     // Route::get('/Cost/{id}', [Biaya019Controller::class, 'show']);
//     // Route::post('/Cost/', [Biaya019Controller::class, 'store']);
//     // Route::delete('/Cost/{id}', [Biaya019Controller::class, 'destroy']);
//     // Route::patch('Cost/{id}', [Biaya019Controller::class, 'update']);
//     // Route::delete('Cost/{id}', [Biaya019Controller::class, 'delete']);
// });
