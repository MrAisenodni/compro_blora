<?php

namespace App\Providers;

use App\Repositories\Managements\ContactInfo\{ ContactInfoRepository, ContactInfoRepositoryInterface };
use App\Repositories\Managements\Slider\{ SliderRepository, SliderRepositoryInterface };
use App\Repositories\Managements\Service\{ ServiceRepository, ServiceRepositoryInterface };
use App\Repositories\Managements\ServiceDetail\{ ServiceDetailRepository, ServiceDetailRepositoryInterface };
use App\Repositories\Masters\Template\{ TemplateRepository, TemplateRepositoryInterface };
use App\Repositories\Settings\Menu\{ MenuRepository, MenuRepositoryInterface };
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
        // Management Repositories
        $this->app->bind(ContactInfoRepositoryInterface::class, ContactInfoRepository::class);
        $this->app->bind(SliderRepositoryInterface::class, SliderRepository::class);
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
        $this->app->bind(ServiceDetailRepositoryInterface::class, ServiceDetailRepository::class);

        // Master Repositories
        $this->app->bind(TemplateRepositoryInterface::class, TemplateRepository::class);

        // Setting Repositories
        $this->app->bind(MenuRepositoryInterface::class, MenuRepository::class);
    }
}
