<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductoController;
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




Route::get('/', [LoginController::class, 'loginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);



Route::get('productos', [ProductoController::class, 'index'])->name('listadoProductos')->middleware('auth');
Route::get('productos/{id}', [ProductoController::class, 'show'])->middleware('auth');


Route::get('crud', [UserController::class, 'index'])->name('crud')->middleware(['auth', 'roles:admin']);
Route::delete('crud/{id}', [UserController::class, 'destroy'])->name('users.destroy')->middleware(['auth', 'roles:admin']);

Route::get('crud/crear', [UserController::class, 'create'])->name('users.create')->middleware(['auth', 'roles:admin']);
Route::post('crud', [UserController::class, 'store'])->name('añadirUsuario')->middleware(['auth', 'roles:admin']);
Route::get('crud/{id}/edit', [UserController::class, 'edit'])->name('editarUsuario')->middleware(['auth', 'roles:admin']);
Route::put('crud/{id}', [UserController::class, 'update'])->name('modificar')->middleware(['auth', 'roles:admin']);







