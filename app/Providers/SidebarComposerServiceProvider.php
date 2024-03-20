<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\sekolah;

class SidebarComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('admin.layout.sidebar', function($view){
            $sekolahs = sekolah::all();
            $view->with('sekolahs', $sekolahs);
        });
    }
}
