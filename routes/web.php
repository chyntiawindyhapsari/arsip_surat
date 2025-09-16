<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\KategoriController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ArsipController::class, 'index'])->name('arsip.index');
Route::resource('arsip', ArsipController::class);
Route::resource('kategori', KategoriController::class);

Route::view('/about', 'arsip.about')->name('about');
