<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\SymptomController;
use App\Http\Controllers\RespondentController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\GuestController;

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

Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::resource('diagnosis', DiagnosisController::class);
Route::resource('guest', GuestController::class);
Route::post('history.index', [HistoryController::class, 'index']);
Route::get('admin', [HomeController::class, 'admin'])->name('admin_login');

Route::resource('symptom', SymptomController::class)->middleware('auth');
Route::resource('respondent', RespondentController::class)->middleware('auth');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/symptom_information', [GuestController::class, 'symptoms_information']);

Route::view('/test', 'test');