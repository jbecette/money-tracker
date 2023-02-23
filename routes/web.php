<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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

Route::get('/', function () {
    return redirect('/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [PagesController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

/* Accounts routes */
Route::get('/accounts', [PagesController::class, 'accounts'])->middleware(['auth', 'verified'])->name('accounts');
Route::get('/accounts/new', [PagesController::class, 'accountsNew'])->middleware(['auth', 'verified'])->name('accounts_new');
Route::post('/accounts/new', [PagesController::class, 'accountsNewInsert'])->middleware(['auth', 'verified'])->name('accounts_new_insert');
Route::get('/accounts/update/{id}', [PagesController::class, 'accountsUpdateView'])->middleware('auth')->name('accounts_update_form');
Route::put('/accounts/update/{id}', [PagesController::class, 'accountUpdate'])->middleware('auth')->name('accounts_update');
Route::delete('/accounts/delete/{id}', [PagesController::class, 'accountDelete'])->middleware('auth')->name('accounts_delete');

/* Transaction types routes */
Route::get('/transaction-types', [PagesController::class, 'transactionTypes'])->middleware(['auth', 'verified'])->name('transaction-types');
Route::get('/transaction-types/new', [PagesController::class, 'transactionTypesAdd'])->middleware(['auth', 'verified'])->name('transaction-types_new');

/* Transactions routes */
Route::get('/transactions/{id?}', [PagesController::class, 'transactions'])->middleware(['auth', 'verified'])->where('id','[0-9]+')->name('transactions');
Route::get('/transactions/new', [PagesController::class, 'transactionsNew'])->middleware(['auth', 'verified'])->name('transactions_new');
Route::post('/transactions/new', [PagesController::class, 'transactionsNewInsert'])->middleware(['auth', 'verified'])->name('transactions_new_insert');
Route::get('/transactions/update/{id}', [PagesController::class, 'transactionsUpdateView'])->middleware('auth')->name('transactions_update_form');
// Route::put('/accounts/update/{id}', [PagesController::class, 'accountUpdate'])->middleware('auth')->name('accounts_update');
Route::delete('/transactions/delete/{id}', [PagesController::class, 'transactionDelete'])->middleware('auth')->name('transaction_delete');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
