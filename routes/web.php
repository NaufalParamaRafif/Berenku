<?php

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

Route::get('/', function () {
    return view('home.home');
});
Route::get('/home', function () {
    return view('home.home');
});

Route::get('/ditandai', function () {
    return view('ditandai.ditandai');
});

Route::get('/daftar_peminjaman', function () {
    return view('daftar_peminjaman.daftar_peminjaman');
});