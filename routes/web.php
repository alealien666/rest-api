<?php

use App\Http\Controllers\PuskesmasController;
use Illuminate\Support\Facades\Route;

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

Route::get('/pitik', function () {
    return view('pitik');
});

Route::get('/index', [PuskesmasController::class, 'index']);
Route::post('/post', [PuskesmasController::class, 'store'])->name('post');
Route::put('/update/{id}', [PuskesmasController::class, 'update'])->name('update');
Route::delete('/hapus/{id}', [PuskesmasController::class, 'destroy'])->name('delete');
