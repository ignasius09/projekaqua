<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;

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

Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');


Route::get('/tambahpegawai', [PegawaiController::class, 'tambahpegawai'])->name('tambahpegawai');
Route::post('/insertdata', [PegawaiController::class, 'insertdata'])->name('insertdata');

Route::get('/tampilkandata/{id}', [PegawaiController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}', [PegawaiController::class, 'updatedata'])->name('updatedata');

Route::get('/delete/{id}', [PegawaiController::class, 'delete'])->name('delete');

//export PDF
Route::get('/exportpdf', [PegawaiController::class, 'exportpdf'])->name('exportpdf');
Route::get('/exportexcel', [PegawaiController::class, 'exportexcel'])->name('exportexcel');
Route::post('/importexcel', [PegawaiController::class, 'importexcel'])->name('exportexcel');
