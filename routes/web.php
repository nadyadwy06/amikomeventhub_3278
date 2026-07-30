<?php

use Illuminate\Support\Facades\Route;

// User Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MidtransWebhookController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Organizer\DashboardController as OrganizerDashboard;

// Admin Controllers
use App\Http\Controllers\Admin\AuthController; 
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\OrganizerApprovalController;
use App\Http\Controllers\Admin\CheckInController;

/*
|--------------------------------------------------------------------------
| USER AREA & PUBLIC
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/tentang', 'tentang')->name('tentang');
Route::view('/profil', 'profil')->name('profil');
Route::view('/kategori', 'kategori')->name('kategori');
Route::view('/bantuan', 'bantuan')->name('bantuan');
Route::view('/kontak', 'contact')->name('kontak');

// Event & Checkout Publik
Route::get('/event/{event}', [EventController::class, 'show'])->name('events.show');

Route::get('/checkout/{event}', [CheckoutController::class, 'create'])->name('checkout.create');
Route::post('/checkout/{event}', [CheckoutController::class, 'store'])->name('checkout.store');

// Payment & Webhook
Route::get('/payment/{order_id}', [CheckoutController::class, 'payment'])->name('checkout.payment');
Route::get('/success/{order_id}', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('/ticket/{id}', [TransactionController::class, 'show'])->name('ticket.show');
Route::post('/midtrans/callback', [MidtransWebhookController::class, 'handle']);

// Socialite Google
Route::get('/auth/google', [SocialiteController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [SocialiteController::class, 'handleGoogleCallback']);

// Redirect Login Default ke Admin Login
Route::get('/login', function () { 
    return redirect()->route('admin.login'); 
})->name('login'); 

// Authenticated User Routes
Route::middleware(['auth'])->group(function () {
    Route::post('/events/{eventId}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
});

// Dashboard Kepanitiaan/HIMA
Route::middleware(['auth'])->prefix('organizer')->name('organizer.')->group(function () {
    Route::get('/', function() { return redirect()->route('organizer.dashboard'); }); // <-- Tambahkan baris ini
    Route::get('/dashboard', [OrganizerDashboard::class, 'index'])->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    
    // Auth Admin (Bebas Akses)
    Route::get('login', [AuthController::class, 'showLogin'])->name('login'); 
    Route::post('login', [AuthController::class, 'login'])->name('login.post'); 

    // Rute yang Dilindungi Admin Middleware (SEMUA ROUTE ADMIN DIGABUNG DI SINI)
    Route::middleware(['auth', 'admin'])->group(function () { 
        

        Route::post('logout', [AuthController::class, 'logout'])->name('logout'); 
        
        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard'); 

        // Resource Admin
        Route::resource('events', AdminEventController::class);
        Route::resource('transactions', TransactionController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('partners', PartnerController::class);

        // Approval Organizer
        Route::get('/organizers', [OrganizerApprovalController::class, 'index'])->name('organizers.index');
        Route::patch('/organizers/{id}/status', [OrganizerApprovalController::class, 'updateStatus'])->name('organizers.updateStatus');

        // Scanner Check-In
        Route::get('/scan', function() { return redirect()->route('admin.checkin.index'); }); // <-- Tambahkan baris ini
        Route::get('/scan-checkin', [CheckInController::class, 'index'])->name('checkin.index');
        Route::post('/scan-checkin/validate', [CheckInController::class, 'validateQr'])->name('checkin.validate');
        // di gate
        

    });
});