<?php

use App\Http\Controllers\TransactionController;
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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [TransactionController::class, 'index'])->name('home');

    Route::get('/deposit', [TransactionController::class, 'deposit'])->name('deposit');
    Route::post('deposit-post', [TransactionController::class, 'depositPost'])->name('depositPost');

    Route::get('/withdraw', [TransactionController::class, 'withdraw'])->name('withdraw');
    Route::post('withdraw-post', [TransactionController::class, 'withdrawPost'])->name('withdrawPost');

    Route::get('/transfer', [TransactionController::class, 'transfer'])->name('transfer');
    Route::post('transfer-post', [TransactionController::class, 'transferPost'])->name('transferPost');

    Route::get('/statement', [TransactionController::class, 'statement'])->name('statement');
    Route::get('statement-result', [TransactionController::class, 'result'])->name('statement.result');
});

require __DIR__.'/auth.php';
