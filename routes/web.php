<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\JourneyController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SortingController;
use App\Http\Controllers\SearchByCategoriesContoller;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [JourneyController::class, 'home'])->name('pages.home');
    Route::get('/catatan-perjalanan', [JourneyController::class, 'catatanPerjalanan'])->name('pages.dashboard');

    Route::get('/isi-data', [JourneyController::class, 'inputTable']);
    Route::post('/buat-data', [JourneyController::class, 'createData']);

    Route::get('/cari', [SearchByCategoriesContoller::class, 'searchByCategories']);
    
    Route::get('/urutkan', [SortingController::class, 'sorter']);
    Route::get('/hapus/{id}', [JourneyController::class, 'deleteData'])->name('deleteData');

    Route::get('/ubah/{id}', [JourneyController::class, 'ubahData'])->name('ubahData');
    Route::post('/update', [JourneyController::class, 'updateData'])->name('updateData');

    Route::get('/logout', [LogoutController::class, 'logout']);
});

Route::middleware(['guest'])->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('auth.login');
    Route::any('/login', [LoginController::class, 'authenticate']);

    Route::get('/daftar', [RegisterController::class, 'create'])->name('auth.register');
    Route::post('/post', [RegisterController::class, 'store']);
});




