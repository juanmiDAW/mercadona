<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TicketController;
use App\Models\Producto;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/compra', function () {
    return view('compra');
})->name('compra');

Route::resource('productos', ProductoController::class);

Route::get('/finalizar', function(Request $request){
    return view('finalizar');
})->name('finalizar');

Route::resource('tickets', TicketController::class);