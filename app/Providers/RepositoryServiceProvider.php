<?php

namespace App\Providers;

use App\Repositories\Masters\Template\{ TemplateRepository, TemplateRepositoryInterface };
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Master Repositories
        $this->app->bind(TemplateRepositoryInterface::class, TemplateRepository::class);
    }
}
