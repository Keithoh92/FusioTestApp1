<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WeatherController;

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
    return view('/auth/login');
});


Route::post('/auth/save', [AuthController::class, 'save'])->name('auth.save');
Route::post('/auth/check', [AuthController::class, 'check'])->name('auth.check');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('dashboard', function (){
    return view('dashboard');
});
Route::get('dashboard', [WeatherController::class, 'show']);
Route::get('delete/{forecast_id}', [WeatherController::class, 'delete']);
Route::get('edit/{forecast_id}', [WeatherController::class, 'showData']);
Route::post('add', [WeatherController::class, 'add'])->name('add');

Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('dashboard', [WeatherController::class, 'show']);
    Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/auth/register', [AuthController::class, 'register'])->name('auth.register');
});
