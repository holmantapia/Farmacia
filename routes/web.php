<?php

use App\Http\Controllers\PedidosController;
use Illuminate\Support\Facades\Route;

// Ruta principal que redirige a la lista de pedidos
Route::get('/', function () {
    return redirect()->route('pedidos.index');
});

// Ruta para mostrar todos los pedidos
Route::get('/pedidos', [PedidosController::class, 'index'])->name('pedidos.index');

// Ruta para crear un nuevo pedido
Route::get('/pedidos/realizar_pedido', [PedidosController::class, 'create'])->name('pedidos.create');

// Ruta para almacenar un nuevo pedido
Route::post('/pedidos', [PedidosController::class, 'store'])->name('pedidos.store');

// Ruta para mostrar la vista de pedido exitoso
Route::get('/pedidos/pedido-exitoso', function () {
    return view('pedidos.pedido-exitoso');
})->name('pedidos.pedido-exitoso');

// Ruta para editar un pedido
Route::get('/pedidos/editar/{id}', [PedidosController::class, 'edit'])->name('pedidos.editar');

// Ruta para actualizar un pedido
Route::put('/pedidos/{id}', [PedidosController::class, 'update'])->name('pedidos.update');

// Ruta para eliminar un pedido
Route::delete('/pedidos/{id}', [PedidosController::class, 'destroy'])->name('pedidos.destroy');

Route::get('/pedido-actualizado', function () {
    return view('pedidos.pedido-actualizado');
})->name('pedido.actualizado');
