<?php

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
    return view('index');
})->name('home');

Route::middleware('auth:admin')->group(function (){
    Route::get('certificate/index', [\App\Http\Controllers\CertificateController::class, 'index'])->name('certificate.index');
    Route::get('certificate/create', [\App\Http\Controllers\CertificateController::class, 'create'])->name('certificate.create');
    Route::post('certificate/store', [\App\Http\Controllers\CertificateController::class, 'store'])->name('certificate.store');
    Route::get('certificate/show/{id}', [\App\Http\Controllers\CertificateController::class, 'show'])->name('certificate.show');
    Route::get('certificate/changeStatus/{id}/status', [\App\Http\Controllers\CertificateController::class, 'changeStatus'])->name('certificate.changeStatus');


    Route::get('auth/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function (){
    Route::get('auth/login', [\App\Http\Controllers\AuthController::class, 'loginView'])->name('login.view');
    Route::post('auth/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');

    Route::get('register', [\App\Http\Controllers\AuthController::class, 'registerView'])->name('register.view');
    Route::post('register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');
});




