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
});
Route::get('certificate/index', [\App\Http\Controllers\CertificateController::class, 'index'])->name('certificate.index');
Route::get('certificate/create', [\App\Http\Controllers\CertificateController::class, 'create'])->name('certificate.create');
Route::post('certificate/store', [\App\Http\Controllers\CertificateController::class, 'store'])->name('certificate.store');




