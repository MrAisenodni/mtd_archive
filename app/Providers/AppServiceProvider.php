<?php

namespace App\Providers;

use App\Models\Settings\{
    Menu,
    Provider,
    User,
};
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
        // Fungsi untuk menampilkan Provider pada Main Halaman
        view()->composer('layouts.main', function ($view) {
            $view->with(
                'provider', Provider::select('id', 'provider_name', 'provider_logo')->where('disabled', 0)->first()
            );
        });

        // Fungsi untuk menampilkan Menu
        view()->composer('layouts.navbar', function ($view) {
            $view->with(
                'menus', Menu::select('id', 'title', 'icon', 'url', 'parent')->where('disabled', 0)->get()
            )->with(
                'provider', Provider::select('id', 'provider_name', 'provider_picture')->where('disabled', 0)->first()
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
