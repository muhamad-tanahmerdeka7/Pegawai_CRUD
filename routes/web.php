<?php

use App\Http\Controllers\PegawaiController;
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
    return view('welcome');
});

Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');

Route::get('/tambahdata', [PegawaiController::class, 'tambahdata'])->name('tambahdata');

Route::post('/insertdata', [PegawaiController::class, 'insertdata'])->name('insertdata');

Route::get('/tampildata/{id}', [PegawaiController::class, 'tampildata'])->name('itampildata');

Route::post('/editdata/{id}', [PegawaiController::class, 'editdata'])->name('editdata');

Route::get('/hapusdata/{id}', [PegawaiController::class, 'hapusdata'])->name('hapusdata');
Route::get('/exportpdf', [PegawaiController::class, 'exportpdf'])->name('exportpdf');
Route::get('/exportexcel', [PegawaiController::class, 'exportexcel'])->name('exportexcel');
Route::post('/importexcel', [PegawaiController::class, 'importexcel'])->name('importexcel');
