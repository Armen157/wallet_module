<?php

use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::group(['middleware' => ['auth','verified','hasWallet']], function() {

        Route::get('/', function () {
            return view('Dashboard.dashboard');
        })->name('dashboard');

        // user wallets
        Route::resource('wallets', WalletController::class);
});



