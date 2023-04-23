<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\TrainingMenuController;
use App\Http\Controllers\TrainingResultController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\GroupUserController;


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

Route::get('/',  [WebController::class, 'index'])->middleware('auth');

Route::resource('menus', TrainingMenuController::class)->only(['store'])->middleware('auth');

Route::resource('training_results', TrainingResultController::class)->only(['index', 'store', 'update', 'destroy'])->middleware('auth');

// グループ機能
Route::resource('groups', GroupController::class)->only(['index', 'show', 'store', 'update', 'destroy'])->middleware('auth');
// グループ招待機能
Route::resource('invitations', InvitationController::class)->only(['store', 'destroy'])->middleware('auth');
Route::resource('participants', GroupUserController::class)->only(['store'])->middleware('auth');
Route::post('/participants/exit', [GroupUserController::class, 'exit'])->name('participants.exit')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// チャートデータ取得処理
Route::get('/chart-get', [ChartController::class, 'chartGet'])->name('chart-get');