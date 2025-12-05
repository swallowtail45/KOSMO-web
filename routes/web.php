<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register-2', function () {
    return view('register-2');
});

Route::get('/cek', function () {
    return view('cek');
})->middleware(['auth', 'verified'])->name('cek');

Route::get('/kelola-kos', function () {
    return view('kelola-kos');
})->middleware(['auth', 'verified'])->name('kelola-kos');

Route::get('/profil', function () {
    return view('profil');
})->middleware(['auth', 'verified'])->name('profil');

Route::get('/reminder', function () {
    return view('reminder');
})->middleware(['auth', 'verified'])->name('reminder');

Route::get('/sidebar', function () {
    return view('sidebar');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
