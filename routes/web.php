<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\KeranjangController;
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

Route::get('/',[AuthController::class,'index'])->name('login') ;
Route::post('/ceklogin',[AuthController::class,'ceklogin'])->name('ceklogin') ;
Route::get('/register',[AuthController::class,'register'])->name('register') ;
Route::post('/daftar',[AuthController::class,'daftar'])->name('daftar') ;
Route::post('/logout',[AuthController::class,'logout'])->name('logout') ;
Route::post('/checkvoucher', [VoucherController::class, 'checkVoucher'])->name('checkvoucher');

Route::middleware(['Check'])->group(function () {
    Route::get('/produk',[ProdukController::class,'index'])->name('produk');
    Route::post('/addproduk',[ProdukController::class,'addproduk'])->name('addproduk');
    Route::get('/keranjang',[KeranjangController::class,'index'])->name('keranjang');
    Route::delete('/destroy',[KeranjangController::class,'destroy'])->name('destroy');
    Route::post('/checkout',[KeranjangController::class,'checkout'])->name('checkout');
    Route::get('/pesanan',[PesananController::class,'index'])->name('pesanan');
    Route::get('/voucher',[VoucherController::class,'index'])->name('voucher');
});

