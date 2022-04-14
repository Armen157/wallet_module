<?php

use App\Http\Controllers\FacebookController;
use App\Http\Controllers\WalletController;
use App\Models\UserWallets;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
require __DIR__.'/auth.php';
Route::get('/', function () {
    return view('welcome');
});

Route::get('/add-wallet',[WalletController::class, 'create'])->middleware(['auth','verified'])->name('add.wallet');
Route::post('/store-wallet',[WalletController::class, 'store'])->middleware(['auth','verified'])->name('store.wallet');

Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);

