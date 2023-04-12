<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SwapController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AngkaController;
use App\Http\Controllers\ConvertController;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    // Route::resource('dashboard', 'DashboardController');
    Route::resource('/user', UserController::class);
    Route::resource('/profile', UserController::class);
    Route::resource('/product', ProductController::class);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/convert', AngkaController::class);
    Route::get('/terbilang/{angka}', function ($angka) {
        $result = terbilang($angka);
        return $result;
    });
    // Route::get('/swap', function () {
    //     return view('convert');
    // });
    Route::resource('/swap', ConvertController::class);
});
