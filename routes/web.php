<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;

// Admin Controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\PartnerController;

/*
|--------------------------------------------------------------------------
| USER AREA
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/tentang', 'tentang')->name('tentang');
Route::view('/profil', 'profil')->name('profil');
Route::view('/kategori', 'kategori')->name('kategori');
Route::view('/bantuan', 'bantuan')->name('bantuan');
Route::view('/kontak', 'contact')->name('kontak');

/*
|--------------------------------------------------------------------------
| EVENT & TICKET
|--------------------------------------------------------------------------
*/
// Pastikan parameter di sini {event} agar sesuai dengan Controller Model Binding
Route::get('/event/{event}', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout/{event}', [EventController::class, 'checkout'])->name('checkout');
Route::get('/ticket/{id}', [TransactionController::class, 'show'])->name('ticket.show');

/*
|--------------------------------------------------------------------------
| ADMIN AREA (Diringkas agar tidak 404 karena salah penamaan)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Menggunakan resource akan otomatis membuatkan route:
    // admin.events.index, .create, .store, .edit, .update, .destroy
    Route::resource('events', AdminEventController::class);
    Route::resource('transactions', TransactionController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('partners', PartnerController::class);
    
});