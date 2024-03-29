<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AnswerController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
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
Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/quizzes', [MainController::class, 'index']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout')->middleware('auth');
Route::post('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');

Route::get('/register', [LoginController::class, 'registerForm'])->name('register.form')->middleware('guest');
Route::post('/register', [LoginController::class, 'register'])->name('register')->middleware('guest');

Route::get('/quizzes/{quiz}', [\App\Http\Controllers\QuizController::class, 'show'])->middleware('auth');
Route::post('/quizzes/{quiz}', [\App\Http\Controllers\QuizController::class, 'store'])->middleware('auth');

Route::get('/user/{user:name}', [UserController::class, 'show']);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['admin']], function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'quiz', 'as' => 'quiz.'], function () {
        Route::get('/{quiz}/edit', [QuizController::class, 'edit'])->name('edit');
        Route::get('/', [QuizController::class, 'index'])->name('index');
        Route::post('/', [QuizController::class, 'store'])->name('store');
        Route::post('/{quiz}', [QuizController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'question', 'as' => 'question.'], function () {
        Route::put('/{question}', [QuestionController::class, 'update'])->name('update');
        Route::post('/', [QuestionController::class, 'store'])->name('store');
    });

    Route::group(['prefix' => 'answer', 'as' => 'answer.'], function () {
        Route::post('/', [AnswerController::class, 'store'])->name('store');
        Route::post('/update-order', [AnswerController::class, 'updateOrder'])->name('update.order');
        Route::put('/{answer}/update-text', [AnswerController::class, 'updateText'])->name('update');
        Route::delete('/{answer}', [AnswerController::class, 'destroy'])->name('destroy');
    });
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('index');
        Route::get('/{user}/edit', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('edit');
        Route::put('/{user}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('update');
        Route::put('/{user}/update-roles',[\App\Http\Controllers\Admin\UserController::class,'updateRoles'])->name('update.roles');
    });
});


