<?php
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

// Rutas
Route::get('/', [UsuarioController::class, 'index']);
Route::get('adminView', [UsuarioController::class, 'adminView']);
Route::get('userView', [UsuarioController::class, 'userView']);
Route::get('registro', [UsuarioController::class, 'registro']);


//RUTAS SINGIN LOGIN LOGOUT
Route::post('/loginpost',[UsuarioController::class, 'loginpost']);
Route::post('/registerpost',[UsuarioController::class, 'registerpost']);
Route::get('/logoutpost',[UsuarioController::class, 'logoutpost']);
Route::get('logout', [UsuarioController::class, 'logout']);
