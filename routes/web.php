<?php

use App\Http\Controllers\Crm;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Penjualan;
use App\Http\Controllers\UserController;
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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');






Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.index');
    //User
    Route::get('/admin/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/admin/user/tambah', [UserController::class, 'create'])->name('user.create');
    Route::post('/admin/user/simpan', [UserController::class, 'store'])->name('user.store');
    Route::get('/admin/user/hapus/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/admin/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/admin/user/update/{id}', [UserController::class, 'update'])->name('user.update');


});

Route::middleware(['auth'])->group(function(){
    //CRM
    Route::get('/crm', [Crm::class, 'index'])->name('crm.index');
    Route::get('/crm/tambah', [Crm::class, 'create'])->name('crm.tambah');
    Route::post('/crm/simpan', [Crm::class, 'store'])->name('crm.store');
    Route::get('/crm/hapus/{id}', [Crm::class, 'destroy'])->name('crm.destroy');
    Route::get('/crm/edit/{id}', [Crm::class, 'edit'])->name('crm.edit');
    Route::get('/penjualan', [Penjualan::class, 'index'])->name('penjualan.index');
});



require __DIR__.'/auth.php';
