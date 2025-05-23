<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

   
    Route::resource('items', ItemController::class);
    Route::get('/transaksi', [TransactionController::class, 'create'])->name('transaksi.create');
    Route::post('/transaksi', [TransactionController::class, 'store'])->name('transaksi.store');
    Route::get('/transaksi/{id}', [TransactionController::class, 'show'])->name('transaksi.show');

    Route::get('/riwayat', [TransactionController::class, 'history'])->name('riwayat.index');
    Route::get('/transaksi/{id}/pdf', [TransactionController::class, 'generatePDF'])->name('transaksi.pdf');
});

require __DIR__.'/auth.php';
