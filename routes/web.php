<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\typeToolController;
use App\Http\Controllers\PuskesmasController;
use App\Http\Controllers\ToolsController;

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

Route::get('/navbar', function () {
    return view('navbar');
});
// user
Route::get('/index', [PuskesmasController::class, 'index']);
Route::post('/post', [PuskesmasController::class, 'store'])->name('post');
Route::put('/update/{id}', [PuskesmasController::class, 'update'])->name('update');
Route::delete('/hapus/{id_user}', [PuskesmasController::class, 'destroy'])->name('delete');

// type tools
Route::get('/pitik', [typeToolController::class, 'index']);
Route::post('/store', [typeToolController::class, 'store'])->name('store');
Route::put('/update/{id}', [typeToolController::class, 'update'])->name('update');
Route::delete('delete/{idTypeTool}', [typeToolController::class, 'delete'])->name('hapus');

// tools
Route::get('/tools', [ToolsController::class, 'index']);
