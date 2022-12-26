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

Route::get('/accounts', function () {
    return view('accounts');
})->middleware(['auth', 'verified'])->name('accounts');

Route::get('/transaction-types', [PagesController::class, 'transactionTypes'])->middleware(['auth', 'verified'])->name('transaction-types');
Route::get('/transaction-types/new', [PagesController::class, 'transactionTypesAdd'])->middleware(['auth', 'verified'])->name('transaction-types_new');

Route::get('/transactions', function () {
    return view('transactions');
})->middleware(['auth', 'verified'])->name('transactions');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
