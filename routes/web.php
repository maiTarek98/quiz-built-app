<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group([ 'middleware' => 'auth'], function () {



Route::resource('quizes', QuizController::class);
Route::resource('questions', QuestionController::class);
});
Auth::routes();

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('home');

Route::get('/takeQuiz/{quiz}', [App\Http\Controllers\HomeController::class, 'take_quiz'])->name('quiz_no');

Route::get('/takeQuiz/{quiz}/{question}', [App\Http\Controllers\HomeController::class, 'show_quiz_questions'])->name('quiz_questions');
Route::any('/store_answer/{question}', [App\Http\Controllers\HomeController::class, 'store_answer'])->name('store_answer');

Route::get('/result/{quiz}', [App\Http\Controllers\HomeController::class, 'show_result'])->name('show_result');
