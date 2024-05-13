<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(UsuarioController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout'); // atento siempre con los name, son la ruta por la que accederan los href
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(UsuarioController::class)->prefix('usuarios')->group(function () {
        Route::get('', 'index')->name('usuarios');
        Route::get('create', 'create')->name('usuarios.create');
        Route::post('store', 'store')->name('usuarios.store');
        Route::get('show/{id}', 'show')->name('usuarios.show');
        Route::get('edit/{id}', 'edit')->name('usuarios.edit');
        Route::put('edit/{id}', 'update')->name('usuarios.update');
        Route::delete('destroy/{id}', 'destroy')->name('usuarios.destroy');
    });

    Route::get('/profile', [App\Http\Controllers\UsuarioController::class, 'profile'])->name('profile');

        // Ruta para la vista de bienvenida
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    // Ruta para el dashboard del administrador
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard')->middleware('auth');

    Route::get('/perfil/{id}', [UsuarioController::class, 'showProfile'])->name('views.perfil')->middleware('auth');


});

