<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelolaMasyarakatController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TanggapanController;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;


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
    return view('welcome');
});
// Admin/Petugas routes with middleware 'auth' and 'admin'
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');

        Route::resource('pengaduans', 'PengaduanController');

        Route::resource('tanggapan', 'TanggapanController');

        Route::resource('kelola-masyarakat', 'KelolaMasyarakatController');
        Route::get('/kelola-masyarakat/{id}/delete', 'KelolaMasyarakatController@confirmDelete')->name('kelola-masyarakat.confirmDelete');
        Route::delete('/kelola-masyarakat/{id}', 'KelolaMasyarakatController@destroy')->name('kelola-masyarakat.destroy');

        Route::resource('petugas', 'PetugasController');
        Route::get('/petugas/{id}/delete', 'PetugasController@confirmDelete')->name('petugas.confirmDelete');
        Route::delete('/petugas/{id}', 'PetugasController@destroy')->name('petugas.destroy');


        Route::get('laporan', 'AdminController@laporan')->name('laporan.index');
        Route::get('laporan/cetak', 'AdminController@cetak');
        Route::get('pengaduan/cetak/{id}', 'AdminController@pdf');

    });
// Masyarakat routes
Route::get('/pengaduan', [MasyarakatController::class, 'index'])->name('pengaduan.index');
Route::get('/riwayat-pengaduan', [PengaduanController::class, 'riwayat'])->name('riwayat.pengaduan');
Route::post('/pengaduan/store', [PengaduanController::class, 'store'])->name('pengaduan.store');
Route::get('/pengaduan/lihat', [MasyarakatController::class, 'lihat'])->name('pengaduan.lihat');
Route::get('user/pengaduan/{id}', [PengaduanController::class, 'show'])->name('pengaduan.show');
Route::get('/pengaduan/sukses', [PengaduanController::class, 'sukses'])->name('pengaduan.sukses');
Route::get('/pengaduan/create', [PengaduanController::class, 'create'])->name('pengaduan.create');
Route::get('/pengaduan/status', [PengaduanController::class, 'status'])->name('pengaduan.status');
Route::get('/pengaduan/check', [PengaduanController::class, 'check'])->name('pengaduan.check');

    

// Masyarakat
// Route::prefix('user')
//     ->middleware(['auth', 'MasyarakatMiddleware'])
//     ->group(function () {
//         Route::get('/', 'MasyarakatController@index')->name('masyarakat-dashboard');
//         Route::resource('pengaduan', 'MasyarakatController');
//         Route::get('pengaduan', 'MasyarakatController@lihat');
//         Route::delete('masyarakat/{id}', 'MasyarakatController@destroy')->name('masyarakat.destroy');
//     });

require __DIR__ . '/auth.php';
