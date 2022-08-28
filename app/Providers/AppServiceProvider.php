<?php

namespace App\Providers;

use App\Models\Masters\User;
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
        // Fungsi untuk menampilkan Menu
        view()->composer('layouts.navbar', function ($view) {
            $view->with(
                'menus', Menu::select('id', 'title', 'icon', 'url', 'parent')->where('disabled', 0)->get()
            );
        });

        // Fungsi untuk menampilkan User Login
        view()->composer('layouts.header', function ($view) {
            $view->with(
                'user', User::select('id', 'full_name')->where('disabled', 0)->where('id', session()->get('suser_id'))->first()
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
