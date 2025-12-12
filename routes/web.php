<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NovelController;

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

    Route::get('/novel', [NovelController::class, 'index'])->name('novel.index');
    Route::get('/novel/tambah', [NovelController::class, 'create'])->name('novel.create');
    Route::post('/novel/store', [NovelController::class, 'store'])->name('novel.store');
    Route::get('/novel/edit/{id_novel}', [NovelController::class, 'edit'])->name('novel.edit');
    Route::put('/novel/update/{id_novel}', [NovelController::class, 'update'])->name('novel.update');
    Route::delete('/novel/delete/{id_novel}', [NovelController::class, 'destroy'])->name('novel.destroy');

    Route::get('/novel/cetak', [NovelController::class, 'cetak']);

