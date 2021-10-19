<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuizController;
use App\Services\QuizService;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/codes', function (QuizService $quizService) {
    return response()->json($quizService->allCodes());
});

Route::get('/quiz/{code}', [QuizController::class, 'loadQuestion'])->middleware('auth')->name('quiz');
Route::post('/quiz/{code}', [QuizController::class, 'validateAnswer'])->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
