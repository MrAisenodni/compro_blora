<?php

namespace App\Providers;

use App\Models\Setting\Menu;
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
        // Fungsi untuk menampilkan Menu pada Navbar
        view()->composer('layouts.navbar', function($view) {
            $data = [
                'menus'        => Menu::select('id', 'title', 'icon', 'url', 'is_parent', 'parent_id')->where('disabled', 0)->orderBy('order_no')->get(),
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
