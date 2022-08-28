<?php

namespace App\Providers;

use App\Models\Settings\Menu;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Fungsi yang dipanggila pada setiap Menu
        view()->composer('layouts.navbar', function ($view) {
            $view->with(
                'menus', Menu::select('id', 'title', 'icon', 'url', 'parent')->where('disabled', 0)->get()
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
