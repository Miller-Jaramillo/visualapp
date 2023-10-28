<?php

use App\Http\Controllers\RegisteredAdminController;
use App\Http\Controllers\RegisterUserController;
use App\Livewire\UsersTableComponent;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register-user', [RegisterUserController::class, 'create'])->name('register-user.create');
Route::post('/register-user', [RegisterUserController::class, 'store'])->name('register-user.store');

// Ruta para procesar la solicitud de registro de administradores
Route::get('/register', [RegisteredAdminController::class, 'create'])->name('register');
Route::post('/register', [RegisteredAdminController::class, 'store']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/users', UsersTableComponent::class)->name('users');
});
