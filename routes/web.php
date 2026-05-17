<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TransactionController;

/*
|--------------------------------------------------------------------------
| USER AREA
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/tentang', function () {
    return '<h1>Ini adalah Halaman Tentang Aplikasi Event Hub</h1>';
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/profil', function () {
    return view('profil');
})->name('profil');

Route::get('/katalog', function () {
    return view('katalog');
})->name('katalog');

Route::get('/bantuan', function () {
    return view('bantuan');
})->name('bantuan');

Route::get('/kontak', function () {
    return view('contact');
})->name('kontak');

Route::get('/event-detail', [EventController::class, 'show'])
    ->name('events.show');

Route::get('/checkout', [EventController::class, 'checkout'])
    ->name('checkout');

Route::get('/ticket', [TicketController::class, 'index'])
    ->name('ticket');


/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | EVENTS CRUD
    |--------------------------------------------------------------------------
    */

    Route::get('/events', [AdminEventController::class, 'index'])
    ->name('events.index');

    Route::get('/events/create', [AdminEventController::class, 'create'])
        ->name('events.create');

    Route::post('/events', [AdminEventController::class, 'store'])
        ->name('events.store');

    Route::get('/events/{id}/edit', [AdminEventController::class, 'edit'])
        ->name('events.edit');

    Route::put('/events/{id}', [AdminEventController::class, 'update'])
        ->name('events.update');

    Route::delete('/events/{id}', [AdminEventController::class, 'destroy'])
        ->name('events.destroy');


    /*
    |--------------------------------------------------------------------------
    | TRANSACTIONS CRUD
    |--------------------------------------------------------------------------
    */

    Route::get('/transactions', [TransactionController::class, 'index'])
        ->name('transactions.index');

    Route::get('/transactions/create', [TransactionController::class, 'create'])
        ->name('transactions.create');

    Route::post('/transactions', [TransactionController::class, 'store'])
        ->name('transactions.store');

    Route::get('/transactions/{id}/edit', [TransactionController::class, 'edit'])
        ->name('transactions.edit');

    Route::put('/transactions/{id}', [TransactionController::class, 'update'])
        ->name('transactions.update');

    Route::delete('/transactions/{id}', [TransactionController::class, 'destroy'])
        ->name('transactions.destroy');


    /*
    |--------------------------------------------------------------------------
    | CATEGORIES CRUD
    |--------------------------------------------------------------------------
    */

    Route::get('/categories', [CategoryController::class, 'index'])
        ->name('categories.index');

    Route::get('/categories/create', [CategoryController::class, 'create'])
        ->name('categories.create');

    Route::post('/categories', [CategoryController::class, 'store'])
        ->name('categories.store');

    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])
        ->name('categories.edit');

    Route::put('/categories/{id}', [CategoryController::class, 'update'])
        ->name('categories.update');

    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])
        ->name('categories.destroy');

});