<?php

use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelolaMasyarakatController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\Api\PetugasApiController;
use App\Models\Berita;
use App\Http\Controllers\WelcomeController;
use FontLib\Table\Type\name;
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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/berita/{id}', [WelcomeController::class, 'berita'])->name('berita.berita');

// Admin/Petugas routes with middleware 'auth' and 'admin'
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::post('login', [AuthenticatedSessionController::class, 'store'])->middleware('throttle:5,1');

        Route::get('/', 'DashboardController@index')->name('dashboard');

        // Pengaduan
        Route::resource('pengaduans', 'PengaduanController');

        // Tanggapan
        Route::get('tanggapan/{id}', [TanggapanController::class, 'index'])->name('tanggapan.index');
        Route::post('tanggapan/store', [TanggapanController::class, 'store'])->name('tanggapan.store');

        // Petugas
        Route::get('/admin/petugas', [PetugasController::class, 'index'])->name('petugas.index');
        Route::get('/petugas/create', [PetugasController::class, 'create'])->name('petugas.create');
        Route::post('/petugas/store', [PetugasController::class, 'store'])->name('petugas.store');
        Route::get('/petugas/{id}/edit', [PetugasController::class, 'edit'])->name('petugas.edit');
        Route::post('/petugas/update/{id}', [PetugasController::class, 'update'])->name('petugas.update');
        Route::get('/petugas/{id}/delete', [PetugasController::class, 'confirmDelete'])->name('petugas.confirmDelete'); // Jika kamu ingin memakai konfirmasi
        Route::delete(uri: '/petugas/{id}', action: [PetugasController::class, 'destroy'])->name('petugas.destroy');

        Route::get('laporan', 'AdminController@laporan')->name('laporan.index');
        Route::get('laporan/cetak', [AdminController::class, 'cetak'])->name('laporan.cetak');
        Route::get('pengaduan/cetak/{id}', 'AdminController@pdf');
        Route::post('/admin/pengaduan/{id}/update', [PengaduanController::class, 'updateStatus'])->name('pengaduan.update.status');

        Route::get('/log_aktivitas', [AdminController::class, 'logAktivitas'])->name('admin.log_aktivitas');
        //Berita
        Route::get('berita', [BeritaController::class, 'index'])->name('berita.index');
        Route::get('berita/create', [BeritaController::class, 'create'])->name('berita.create');
        Route::post('berita', [BeritaController::class, 'store'])->name('berita.store');
        Route::get('show_berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
        Route::get('berita/{berita}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
        Route::put('berita/{berita}', [BeritaController::class, 'update'])->name('berita.update');
        Route::delete('berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');
    });

// Route::get('/test-wa', function () {
//     $controller = app(\App\Http\Controllers\PengaduanController::class);
//     $controller->sendWhatsApp('0895414850238', 'Tes kirim WA dari sistem.');
//     return 'Pesan WA dikirim (periksa nomor tujuan).';
// });



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
Route::get('berita/{id}', [WelcomeController::class, 'berita'])->name('berita.detail');
Route::get('berita', [BeritaController::class, 'allberita'])->name('allberita');

require __DIR__ . '/auth.php';


// Masyarakat
// Route::prefix('user')
//     ->middleware(['auth', 'MasyarakatMiddleware'])
//     ->group(function () {
//         Route::get('/', 'MasyarakatController@index')->name('masyarakat-dashboard');
//         Route::resource('pengaduan', 'MasyarakatController');
//         Route::get('pengaduan', 'MasyarakatController@lihat');
//         Route::delete('masyarakat/{id}', 'MasyarakatController@destroy')->name('masyarakat.destroy');
//     });