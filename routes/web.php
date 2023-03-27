<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\TrainingMenuController;
use App\Http\Controllers\TrainingResultController;
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

Route::get('/',  [WebController::class, 'index']);

Route::resource('menus', TrainingMenuController::class)->only(['store'])->middleware('auth');
Route::resource('training', TrainingResultController::class)->only(['index', 'store', 'update', 'destroy'])->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// チャートデータ取得処理
Route::get('/chart-get', [ChartController::class, 'chartGet'])->name('chart-get');

/* chart.js用お試し　後で削除 */
Route::get('/chartjs', function () {
    return view('chartjs');
});