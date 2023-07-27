<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Redirect;
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
    return Redirect::route('login');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [TransactionController::class, 'index'])->name('home');
    Route::get('/deposit', [TransactionController::class, 'deposit'])->name('deposit');
    Route::get('/withdraw', [TransactionController::class, 'withdraw'])->name('withdraw');
    Route::get('/transfer', [TransactionController::class, 'transfer'])->name('transfer');
    Route::get('/statement', [TransactionController::class, 'statement'])->name('statement');
    Route::patch('/profile', [TransactionController::class, 'update'])->name('profile.update');
});

require __DIR__.'/auth.php';
