<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
    return view('login'); // Ganti dengan view beranda Anda
})->name('login');

// Route untuk halaman login
Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');

// Route untuk memproses login
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

// Route untuk logout
Route::post('logout', [LoginController::class, 'actionlogout'])->name('logout');

// Route ke halaman dashboard untuk admin dan user setelah login
Route::middleware(['auth'])->group(function () {
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});

