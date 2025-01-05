<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\FoodDonationController;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/verifikasi-email', [AuthController::class, 'verifikasi']);
Route::get('/reset-password', [AuthController::class, 'resetPassword']);
// Route::get('/', [CampaignController::class, 'index']);
// Route::get('/opsi-donasi/{id}', [CampaignController::class, 'show']);
