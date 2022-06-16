<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CVController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\UserController;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

Route::group(['prefix' => 'admin'], function () {
    Route::get('login', function () {
        if (Session::get('admin')) {
            return redirect('/admin');
        } else {
            return view('admin.login');
        }
    });
    Route::post('login', function (Request $request) {
        if ($request->email === 'admin@gmail.com' && $request->password === 'password') {
            session()->put('admin', true);
            return redirect('admin');
        } else {
            return redirect()->back()->with('res', ['type' => 'danger', 'message' => 'credentials not matched']);
        }
    });
    Route::group(['middleware' => 'admin'], function () {
        Route::view('/', 'admin.index');
        Route::post('logout', function () {
            if (Session::get('admin')) {
                session()->forget('admin');
                return redirect('admin/login');
            } else {
                return redirect()->back();
            }
        });
        Route::resource('title', TitleController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('company', CompanyController::class)->except(['edit', 'update']);
        Route::resource('location', LocationController::class);
        Route::post('approve-company', [CompanyController::class, 'approveCompany'])->name('approve-company');
        Route::post('disapprove-company', [CompanyController::class, 'disapproveCompany'])->name('disapprove-company');
        Route::get('company/edit/{id}', [CompanyController::class, 'adminEditCompnay']);
        Route::post('company/update', [CompanyController::class, 'adminUpdateCompnay']);

        // job seakers / users - admin related routes
        Route::get('users', [UserController::class, 'index']);
        Route::get('users/edit/{id}', [UserController::class, 'edit']);
        Route::post('users/update', [UserController::class, 'update']);
        Route::delete('users/delete/{id}', [UserController::class, 'delete']);
        Route::get('users/status/{id}', [UserController::class, 'status']);
        Route::get('users/cv/{id}', [UserController::class, 'show_cv']);
        Route::get('users/highlight/{id}', [UserController::class, 'highlight_user']);

        // applications
        Route::get('applications', [ApplicationController::class, 'index']);

        // chats
        Route::view('chat', 'admin.chat.chat');
    });
});



Route::group(['middleware' => 'company'], function () {
    Route::view('/', 'company.index');
    Route::get('company/{company}/edit', [CompanyController::class, 'edit']);
    Route::post('company/{company}', [CompanyController::class, 'update']);
    Route::post('/logout', function () {
        session()->forget('company');
        return redirect()->back();
    });
    Route::resource('job', JobController::class);
    Route::post('job/{id}/update', [JobController::class, 'update']);
    Route::get('/job/{id}/applications', [ApplicationController::class, 'job_applications']);
    Route::get('cv/{id}', [CVController::class, 'show']);

    // quiz related routes
    Route::get('quiz', [QuizController::class, 'getQuizzesByJob']);
    Route::get('quiz/create/{job_id}', [QuizController::class, 'createQuizesByJob']);
    Route::post('quiz/create', [QuizController::class, 'insertQuizesByJob']);
    Route::delete('quiz/delete/{id}', [QuizController::class, 'deleteQuiz']);
    Route::get('quiz/edit/{id}', [QuizController::class, 'editQuiz']);
    Route::post('quiz/update', [QuizController::class, 'updateQuiz']);
});

Route::get('registration', function () {
    if (Session::get('company')) {
        return redirect()->back();
    } else {
        return view('company.registration', ['locations' => Location::all()]);
    }
});
Route::post('registration', [CompanyController::class, 'registration']);

Route::get('login', function () {
    if (Session::get('company')) {
        return redirect('/');
    } else {
        return view('company.login');
    }
});
Route::post('login', [CompanyController::class, 'login']);
