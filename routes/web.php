<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChartController;

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
Route::get('/', [FrontController::class, 'index']);
Route::get('/message', [FrontController::class, 'message']);
Route::get('/answer/{url}', [FrontController::class, 'answers']);
//->where('url', '[0-9a-fA-F]{8}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{12}');



Route::prefix('administration')->name('administration.')->middleware('auth')->group(function (){
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/questionnaires', [DashboardController::class, 'questionnaires']);
    Route::get('/answers', [DashboardController::class, 'answers']);
});

Route::resource('answer', AnswerController::class);


require __DIR__.'/auth.php';



