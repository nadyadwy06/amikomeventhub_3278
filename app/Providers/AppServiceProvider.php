<?php

namespace App\Providers;

use App\Models\Partner; // Tambahkan ini
use Illuminate\Support\Facades\View; // Tambahkan ini
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Mengirim data partners ke layout app.blade.php secara global
        View::composer('layouts.app', function ($view) {
            $view->with('partners', Partner::all());
        });
        View::composer('kategori', function ($view) {
        $view->with('categories', \App\Models\Category::all());
        $view->with('events', \App\Models\Event::all());
        });
    }   
    }