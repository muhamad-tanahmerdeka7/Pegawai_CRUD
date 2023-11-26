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
// */

Route::get('/', function () {
    return view('pages.auth.auth-login');
});


Route::middleware(['auth'])->group(function () {
    // Pegawai
    Route::get('home', function () {
        return view('pages.app.dashboard-crud', ['type_menu' => '']);
    })->name('home');
});





// Route::get('/', function () {
//     return view('pages.app.dashboard-crud', ['type_menu' => '']);
// });

// Route::get('/login', function () {
//     return view('pages.auth.auth-login');
// })->name('login');

// Route::get('/register', function () {
//     return view('pages.auth.auth-register');
// })->name('register');

// Route::get('/forgot', function () {
//     return view('pages.auth.auth-forgot-password');
// })->name('forgot');


// Route::get('/reset-password', function () {
//     return view('pages.auth.auth-reset-password');
// })->name('reset-password');

// Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');

// Route::get('/tambahdata', [PegawaiController::class, 'tambahdata'])->name('tambahdata');

// Route::post('/insertdata', [PegawaiController::class, 'insertdata'])->name('insertdata');

// Route::get('/tampildata/{id}', [PegawaiController::class, 'tampildata'])->name('itampildata');

// Route::post('/editdata/{id}', [PegawaiController::class, 'editdata'])->name('editdata');

// Route::get('/hapusdata/{id}', [PegawaiController::class, 'hapusdata'])->name('hapusdata');
// Route::get('/exportpdf', [PegawaiController::class, 'exportpdf'])->name('exportpdf');
// Route::get('/exportexcel', [PegawaiController::class, 'exportexcel'])->name('exportexcel');
// Route::post('/importexcel', [PegawaiController::class, 'importexcel'])->name('importexcel');
