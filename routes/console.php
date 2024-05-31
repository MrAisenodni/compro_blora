<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('generate:sitemap', function () {
    Sitemap::create()
        ->add(Url::create('/'))
        ->add(Url::create('/doctor-schedule'))
        ->add(Url::create('/service-facilities'))
        ->add(Url::create('/about-us'))
        ->add(Url::create('/contact-us'))
        ->writeToFile(public_path('sitemap.xml'));
})->describe('Generate the sitemap.');