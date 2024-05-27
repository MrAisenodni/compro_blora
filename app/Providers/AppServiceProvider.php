<?php

namespace App\Providers;

use App\Models\Setting\{ Menu, Provider, SocialMedia };
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Fungsi untuk menampilkan Menu pada Header
        view()->composer('layouts.header', function($view) {
            $data = [
                'sosmeds'       => SocialMedia::select('id', 'title', 'icon', 'url')->where('disabled', 0)->orderBy('order_no')->get(),
            ];

            $view->with($data);
        }); 

        // Fungsi untuk menampilkan Menu pada Navbar
        view()->composer('layouts.navbar', function($view) {
            $data = [
                'menus'         => Menu::select('id', 'title', 'icon', 'url', 'is_parent', 'parent_id')->where('disabled', 0)->orderBy('order_no')->get(),
            ];

            $view->with($data);
        }); 

        // Fungsi untuk menampilkan Menu pada Main Template
        view()->composer('layouts.main', function($view) {
            $data = [
                'menus'         => Menu::select('id', 'title',  'url')->where('disabled', 0)->where('parent_id', 0)->where('is_parent', 0)->orderBy('order_no')->get(),
                'provider'      => Provider::select('id', 'title', 'birth_place', 'birth_date', 'address', 'province', 'city', 'district', 'village', 'maps', 'phone_no', 'home_no', 'office_no', 'logo', 'logo_header')->where('disabled', 0)->first(),
            ];

            $view->with($data);
        }); 
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
