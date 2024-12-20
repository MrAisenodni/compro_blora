<?php

namespace App\Providers;

use App\Models\Managements\ServiceDetail;
use App\Models\Settings\{ Menu, Provider, SocialMedia };
use Illuminate\Support\Facades\Cache;
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
        // Fungsi untuk menampilkan Data pada Header
        view()->composer('layouts.header', function($view) {
            $data = Cache::remember('header_sosmeds', 60 * 60, function() {
                return [
                    'sosmeds' => SocialMedia::select('id', 'title', 'icon', 'url')
                                            ->where('disabled', 0)
                                            ->orderBy('order_no')
                                            ->get(),
                ];
            });
            
            $view->with($data);
        }); 

        // Fungsi untuk menampilkan Data pada Navbar
        view()->composer('layouts.navbar', function($view) {
            $data = Cache::remember('navbar_menus', 60 * 60, function() {
                return [
                    'menus' => Menu::select('id', 'title', 'icon', 'url', 'is_parent', 'is_shown', 'parent_id')
                                   ->whereRaw("disabled = 0 AND is_login = 0 AND is_shown = 1 AND url <> 'privacy'")
                                   ->orderBy('order_no')
                                   ->get(),
                ];
            });

            $view->with($data);
        }); 

        // Fungsi untuk menampilkan Data pada Main Template
        view()->composer('layouts.main', function($view) {
            $data = Cache::remember('main_template_data', 60 * 60, function() {
                return [
                    'menus'    => Menu::select('id', 'title',  'url')
                                      ->whereRaw("disabled = 0 AND parent_id = 0 AND is_parent = 0 AND is_login = 0 AND is_shown = 1 AND url <> 'privacy'")
                                      ->orderBy('order_no')
                                      ->get(),
                    'provider' => Provider::select('id', 'title', 'description', 'birth_place', 'birth_date', 'address', 'province', 'city', 'district', 'village', 'maps', 'phone_no', 'home_no', 'office_no', 'logo', 'logo_header', 'logo_footer')
                                          ->where('disabled', 0)
                                          ->first(),
                    'services' => ServiceDetail::select('id', 'title', 'slug')
                                               ->where('disabled', 0)
                                               ->orderBy('order_no')
                                               ->paginate(5),
                    'sosmeds'  => SocialMedia::select('id', 'title', 'icon', 'url')
                                             ->where('disabled', 0)
                                             ->orderBy('order_no')
                                             ->get(),
                ];
            });

            $view->with($data);
        }); 

        /*
            | This Part for Admin Dashboard
        */

        // Fungsi untuk menampilkan Data pada Admin Navbar
        view()->composer('admin.layouts.navbar', function($view) {
            $data = Cache::remember('admin_navbar_menus', 60 * 60, function() {
                return [
                    'menus' => Menu::select('id', 'title', 'icon', 'url', 'is_parent', 'is_shown', 'parent_id')
                                   ->whereRaw("disabled = 0 AND is_login = 1 AND is_shown = 1")
                                   ->orderBy('order_no')
                                   ->get(),
                ];
            });

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
