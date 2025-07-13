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
    return view('form'); // <<< SUDAH DIUBAH KE 'form'
});

// Ini adalah route untuk form Anda
Route::get('/form', function () {
    return view('form'); // Pastikan 'form' ini persis sama dengan nama file tanpa .blade.php
});