<?php

use App\Http\Controllers\CameraController;
use App\Http\Controllers\DetectionController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//authenticated route
Route::middleware(['auth:sanctum'])->group(function () {
    //Cameras
    Route::get('/cameras', [CameraController::class, 'index']);
    Route::post('/cameras', [CameraController::class, 'store']);
    Route::get('/cameras/{camera}', [CameraController::class, 'show']);
    Route::delete('/cameras/{camera}', [CameraController::class, 'destroy']);
    Route::put('/cameras/{camera}', [CameraController::class, 'update']);
    Route::get('/cameras/search/{name}', [CameraController::class, 'search_name']);

    //Detections
    Route::get('/detections', [DetectionController::class, 'index']);
    Route::post('/detections', [DetectionController::class, 'store']);
    Route::get('/detections/{detection}', [DetectionController::class, 'show']);
    Route::delete('/detections/{detection}', [DetectionController::class, 'destroy']);
    Route::get('/detections/search/{plate_number}', [DetectionController::class, 'search_plate_number']);

    //User
    Route::get('/user/logout',[UserController::class, 'logout']);
});

//User-not authenticated
Route::post('/user/register',[UserController::class, 'register']);
Route::post('/user/login', [UserController::class, 'login']);


// Route::resources([
//     'cameras' => CameraController::class,
//     'detections' => DetectionController::class,
// ]);
