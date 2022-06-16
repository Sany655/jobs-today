<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CVController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\QuizController;
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

// usre controller with user model
Route::post('/registration',[UserController::class,'registration']);
Route::post('/login',[UserController::class,'login']);
Route::post('/update-profile',[UserController::class,'update_profile']);
Route::post('/update-image',[UserController::class,'update_image']);
Route::get("/highighted_user",[UserController::class,'highighted_user']);

// job controller with job model
Route::post('/hot-jobs',[JobController::class,'hot_jobs']);
Route::get('/hot-jobs',[JobController::class,'hot_jobs_values']);

// CV controller with cv model
Route::post('/update-cv',[CVController::class,'upsert']);
Route::get('/get-cv',[CVController::class,'edit']);

// Quiz controller with quiz model
Route::get('/quiz',[QuizController::class,'getQuizzesByJobApi']);

// Apply for job
Route::post('/apply-confirmations',[ApplicationController::class,'apply_confirm']);
Route::post('/apply-job',[ApplicationController::class,'store']);
Route::post('/my-applications',[ApplicationController::class,'show']);
