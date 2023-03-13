<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TimeslotController;
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

Route::get('/class', [ClassController::class, 'index']);
Route::get('/classroom', [ClassroomController::class, 'index']);
Route::get('/teacher', [TeacherController::class, 'index']);
Route::get('/subject', [SubjectController::class, 'index']);
Route::get('/timeslot', [TimeslotController::class, 'index']);
Route::get('/group', [GroupController::class, 'index']);

Route::group(['prefix' => 'auth'], function (){
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::group(['middleware' => 'auth:sanctum'], function (){
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});

Route::group(['middleware' => 'auth:sanctum','is_admin'], function (){

    Route::put('/user', [UserController::class, 'update']);
    Route::group(['middleware' => 'admin'], function (){
        Route::group(['prefix' => 'class'], function (){
            Route::post('/', [ClassController::class, 'create']);
            Route::put('/{class}', [ClassController::class, 'update']);
            Route::delete('/{class}', [ClassController::class, 'delete']);
        });
        Route::group(['prefix' => 'building'], function (){
            Route::post('/', [BuildingController::class, 'create']);
            Route::put('/{building}', [BuildingController::class, 'update']);
            Route::delete('/{building}', [BuildingController::class, 'delete']);
        });
        Route::group(['prefix' => 'classroom'], function (){
            Route::post('/', [ClassroomController::class, 'create']);
            Route::put('/{classroom}', [ClassroomController::class, 'update']);
            Route::delete('/{classroom}', [ClassroomController::class, 'delete']);
        });
        Route::group(['prefix' => 'subject'], function (){
            Route::post('/', [SubjectController::class, 'create']);
            Route::put('/{subject}', [SubjectController::class, 'update']);
            Route::delete('/{subject}', [SubjectController::class, 'delete']);
        });
        Route::group(['prefix' => 'group'], function (){
            Route::post('/', [GroupController::class, 'create']);
            Route::put('/{group}', [GroupController::class, 'update']);
            Route::delete('/{group}', [GroupController::class, 'delete']);
        });
        Route::group(['prefix' => 'teacher'], function (){
            Route::post('/', [TeacherController::class, 'create']);
            Route::put('/{teacher}', [TeacherController::class, 'update']);
            Route::delete('/{teacher}', [TeacherController::class, 'delete']);
        });
        Route::group(['prefix' => 'user'], function (){
            Route::get('/', [UserController::class, 'index']);
            Route::post('/{user}/{teacher}', [UserController::class, 'attach']);
        });
    });
});
