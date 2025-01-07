<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ContactUsController;



// Route::get('/', function () {
//     return view('index');
// });


Route::get('/', function () {
    return redirect('/register');
});

Route::get('/donate', [PaymentController::class, 'index']);
Route::post('/donate', [PaymentController::class, 'store']);


Route::get('/payment', [PaymentController::class, 'index']);
Route::post('/payment/process', [PaymentController::class, 'process'])->name('payment.process');
Route::get('/payment/success', [PaymentController::class, 'success'])->name('success');
Route::get('/homepage', [CampaignController::class, 'index1'])->name('homepagelogin');
Route::get('/opsi-donasi/{id}', [CampaignController::class, 'show1']);
Route::post('/submit-nominal', [PaymentController::class, 'submitNominal'])->name('submit.nominal');
Route::get('/payment/{id}', [PaymentController::class, 'getById'])->name('payment.details');
Route::post('/submit-nominal', [PaymentController::class, 'submitNominal'])->name('submit.nominal');
Route::get('/payment/{id}', [PaymentController::class, 'getById'])->name('payment.details');
Route::post('/payment/update-status', [PaymentController::class, 'updateStatus'])->name('payment.updateStatus');
Route::get('/ContactUs', [ContactUsController::class, 'index']);
Route::post('/api/contact_us', [ContactUsController::class, 'store']);

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/campaigns', [CampaignController::class, 'index'])->name('admin.campaigns.index');
    Route::get('/campaigns/create', [CampaignController::class, 'create'])->name('admin.campaigns.create');
    Route::post('/campaigns', [CampaignController::class, 'store'])->name('admin.campaigns.store');
    Route::get('/campaigns/{campaign}', [CampaignController::class, 'show'])->name('admin.campaigns.show');
    Route::get('/campaigns/{campaign}/edit', [CampaignController::class, 'edit'])->name('admin.campaigns.edit');
    Route::put('/campaigns/{campaign}', [CampaignController::class, 'update'])->name('admin.campaigns.update');
    Route::delete('/campaigns/{campaign}', [CampaignController::class, 'destroy'])->name('admin.campaigns.destroy');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/verifikasi-email', [AuthController::class, 'verifikasi']);
Route::get('/api/reset-password', [AuthController::class, 'resetPassword']);
// Route::get('/', [CampaignController::class, 'index']);


