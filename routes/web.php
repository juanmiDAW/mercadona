<?php

use App\Http\Controllers\ProductoController;
use App\Models\Producto;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/compra', function () {
    return view('compra');
})->name('compra');

Route::resource('productos', ProductoController::class);