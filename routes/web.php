<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\RakbukuController;
use App\Http\Controllers\CaribukuController;
use App\Http\Controllers\DatabukuController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\LaporanbukuController;
use App\Http\Controllers\KategoribukuController;
use App\Http\Controllers\LaporansiswaController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\LaporanpeminjamanController;
use App\Http\Controllers\LaporanpengembalianController;

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

// Registrasi
Route::get('/registrasi', [RegistrasiController::class, 'index'])->name('registrasi'); 
Route::post('/inputregistrasi', [RegistrasiController::class, 'inputregistrasi'])->name('inputregistrasi'); 


// Login
Route::get('/', [LoginController::class, 'index'])->name('/')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);

// Logout
Route::get('/logout',[LoginController::class, 'logout']);


// Dashboard
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware('auth');


//Pengguna
Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna')->middleware('auth');
Route::get('/tambahpengguna', [PenggunaController::class, 'tambahpengguna'])->name('tambahpengguna')->middleware('auth');
Route::post('/insertdata', [PenggunaController::class, 'insertdata'])->name('insertdata');
Route::get('/editdata/{id}', [PenggunaController::class, 'editdata'])->name('editdata')->middleware('auth');
Route::post('/updatedata', [PenggunaController::class, 'updatedata'])->name('updatedata');
Route::post('/hapusdatapengguna',[PenggunaController::class, 'hapusDataPengguna'])->name('hapusdatapengguna');
Route::post('gantipassword',[PenggunaController::class, 'gantiPassword'])->name('gantipassword');

// Datasiswa
Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa')->middleware('auth');
Route::get('/tambahsiswa', [SiswaController::class, 'tambahsiswa'])->name('tambahsiswa')->middleware('auth');
Route::post('/insertsiswa', [SiswaController::class, 'insertsiswa'])->name('insertsiswa');
Route::get('/editsiswa/{id}', [SiswaController::class, 'editsiswa'])->name('editsiswa')->middleware('auth');
Route::post('/updatesiswa', [SiswaController::class, 'updatesiswa'])->name('updatesiswa');
Route::post('/hapusdatasiswa',[SiswaController::class, 'hapusdatasiswa'])->name('hapusdatasiswa');

//Databuku
Route::get('/databuku', [DatabukuController::class, 'index'])->name('databuku')->middleware('auth');
Route::get('/tambahbuku', [DatabukuController::class, 'tambahbuku'])->name('tambahbuku')->middleware('auth');
Route::post('/insertbuku}', [DatabukuController::class, 'insertbuku'])->name('insertbuku');
Route::get('/editbuku/{id}', [DatabukuController::class, 'editbuku'])->name('editbuku')->middleware('auth');
Route::post('/updatebuku', [DatabukuController::class, 'updatebuku'])->name('updatebuku');
Route::post('/hapusdatabuku',[DatabukuController::class, 'hapusDataBuku'])->name('hapusdatabuku');

//Kategoribuku
Route::get('/kategoribuku', [KategoribukuController::class, 'index'])->name('kategoribuku')->middleware('auth');
Route::post('/insertkategori', [KategoribukuController::class, 'insertkategori'])->name('insertkategori');
Route::post('/editkategori/{id}', [KategoribukuController::class, 'editkategori'])->name('editkategori');
Route::post('/updatekategori', [KategoribukuController::class, 'updatekategori'])->name('updatekategori');
Route::post('/hapusdatakategori',[KategoribukuController::class, 'hapusdatakategori'])->name('hapusdatakategori');

//Rakbuku
Route::get('/rakbuku', [RakbukuController::class, 'index'])->name('rakbuku')->middleware('auth');
Route::post('/insertrak', [RakbukuController::class, 'insertrak'])->name('insertrak');
Route::post('/editrak/{id}', [RakbukuController::class, 'editrak'])->name('editrak');
Route::post('/updaterak', [RakbukuController::class, 'updaterak'])->name('updaterak');
Route::post('/hapusdatarak',[RakbukuController::class, 'hapusdatarak'])->name('hapusdatarak');

//Caribuku (Detail Cari buku belum)
Route::get('/caribuku', [CaribukuController::class, 'index'])->name('caribuku');

//Peminjaman 
Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman')->middleware('auth');
Route::get('/tambahpinjam', [PeminjamanController::class, 'tambahpinjam'])->name('tambahpinjam')->middleware('auth');
Route::post('/insertpinjam}', [PeminjamanController::class, 'insertpinjam'])->name('insertpinjam');
Route::get('/editpinjam/{id}', [PeminjamanController::class, 'editpinjam'])->name('editpinjam')->middleware('auth');
Route::post('/updatepinjam', [PeminjamanController::class, 'updatepinjam'])->name('updatepinjam');
Route::post('/hapusdatapinjam',[PeminjamanController::class, 'hapusDatapinjam'])->name('hapusdatapinjam');
Route::get('/detailpinjam/{id}',[PeminjamanController::class, 'detailpinjam'])->name('detailpinjam')->middleware('auth');
Route::get('/carinisn', [PeminjamanController::class, 'cariNISN'])->name('carinisn')->middleware('auth');
Route::post('/cekpeminjaman', [PeminjamanController::class, 'cekpeminjaman'])->name('cekpeminjaman');


//Pengembalian 
Route::get('/pengembalian', [PengembalianController::class, 'index'])->name('pengembalian')->middleware('auth');
Route::post('/tambahkembalian', [PengembalianController::class, 'tambahkembalian'])->name('tambahkembalian');
Route::post('/insertkembalian}', [PengembalianController::class, 'insertkembalian'])->name('insertkembalian');
Route::get('/editkembalian/{id}', [PengembalianController::class, 'editkembalian'])->name('editkembalian')->middleware('auth');
Route::post('/updatekembalian', [PengembalianController::class, 'updatekembalian'])->name('updatekembalian');
Route::post('/hapusdatakembalian',[PengembalianController::class, 'hapusDatakembalian'])->name('hapusdatakembalian');


//Denda
Route::get('/denda', 'DendaController@index')->name('denda');

//Laporan

Route::controller(LaporanController::class)->group(function () {
  Route::get('printlaporansiswa', 'printLaporanSiswa')->name('printlaporansiswa')->middleware('auth');
  Route::get('printlaporanbuku', 'printLaporanBuku')->name('printlaporanbuku')->middleware('auth');
  Route::post('printlaporanpeminjaman', 'printLaporanPeminjaman')->name('printlaporanpeminjaman');
  Route::post('printlaporanpengembalian', 'printLaporanPengembalian')->name('printlaporanpengembalian');
});

// Laporan
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan')->middleware('auth');

//Laporan Siswa
// Route::get('/laporansiswa', [LaporansiswaController::class, 'index'])->name('laporansiswa');

// //Laporan Buku
// Route::get('/laporanbuku', [LaporanbukuController::class, 'index'])->name('laporanbuku');

// //Laporan Peminjaman
// Route::get('/laporanpeminjaman', [LaporanpeminjamanController::class, 'index'])->name('laporanpeminjaman');

// //Laporan Pengembalian
// Route::get('/laporanpengembalian', [LaporanpengembalianController::class, 'index'])->name('laporanpengembalian');