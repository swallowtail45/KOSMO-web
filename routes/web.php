<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompleteProfileController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ReminderController;

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
    Route::get('/profil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profil', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('complete-profile', [CompleteProfileController::class, 'create'])->name('complete-profile.create');
    Route::put('complete-profile', [CompleteProfileController::class, 'store'])->name('complete-profile.store');
    Route::post('/payment-methods', [PaymentMethodController::class, 'store'])->name('payment-method.store');
    Route::delete('/payment-methods/{paymentMethod}', [PaymentMethodController::class, 'destroy'])->name('payment-method.destroy');
    Route::get('/reminder', [ReminderController::class, 'index'])->name('reminder.index');
    Route::post('/reminder', [ReminderController::class, 'store'])->name('reminder.store');
    Route::delete('/reminder/{reminder}', [ReminderController::class, 'destroy'])->name('reminder.destroy');
});

require __DIR__.'/auth.php';
