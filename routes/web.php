<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
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
Route::group(['prefix' => 'admin', 'name' => 'admin.'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'quiz', 'name' => 'quiz.'], function () {
        Route::get('/', [QuizController::class, 'index'])->name('index');
        Route::get('/{quiz}/edit', [QuizController::class, 'edit'])->name('edit');
        Route::post('/{quiz}', [QuizController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'question', 'name' => 'question.'], function () {
        Route::put('/{question}', [QuestionController::class, 'update'])->name('update');
        Route::post('/', [QuestionController::class, 'store'])->name('store');
    });

    Route::group(['prefix' => 'answer', 'name' => 'answer.'], function () {
        Route::post('/', [AnswerController::class, 'store'])->name('store');
        Route::post('/update-order', [AnswerController::class, 'updateOrder'])->name('update.order');
        Route::put('/{answer}/update-text', [AnswerController::class, 'updateText'])->name('update');
    });
});


