<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\CategoryController;
  
Route::get('/', function () {
    return view('welcome');
});

//Rute User Area
Route::get('/', [HomeController::class, 'index']);
Route::get('/event-detail', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/ticket', [TicketController::class, 'index'])->name('ticket');

//Rute Admin Area
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/events', [AdminEventController::class, 'index'])->name('events');

    Route::get('/transactions', [AdminEventController::class, 'transactions'])->name('transactions');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

});