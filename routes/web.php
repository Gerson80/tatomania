<?php

use Illuminate\Support\Facades\Route;
use Filament\Filament;
use App\Http\Livewire\Admin;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/use App\Http\Livewire\Login;

// Ruta para el componente de Livewire


Route::middleware(['role:admin'])->group(function () {
    Filament::route();
});

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/preguntas', function () {
    return view('preguntas');
})->name('preguntas');

Route::get('/acerca', function () {
    return view('acerca');
})->name('acerca');

Route::get('/registro', function () {
    return view('registro');
})->name('registro');


Route::get('/login2', function () {
    return view('login2');
})->name('login2');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');






Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('iniciologin');
    })->name('dashboard');
    

    Route::get('/iniciologin', function () {
        return view('iniciologin');
    })->name('iniciologin');

    Route::get('/vivencias', function () {
        return view('vivencias');
    })->name('vivencias');

    Route::get('/perfil', function () {
        return view('perfil');
    })->name('perfil');




    
});
