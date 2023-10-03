<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\barangController;


route::get('/',[HomeController::class,'index']);
route::get('profile', [HomeController::class,'profile']);
route::get('dashboard', [HomeController::class,'dashboard']);
route::get('contact', [HomeController::class,'contact']);
route::get('FAQ', [HomeController::class,'FAQ']);
route::resource('produk', ProdukController::class);
route::resource('barang', barangController::class);