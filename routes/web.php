<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AnswerController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\MainController;
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
Route::get('/', [MainController::class, 'index']);
Route::get('/quizzes/{quiz}', [\App\Http\Controllers\QuizController::class, 'show']);

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
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
    });
});


