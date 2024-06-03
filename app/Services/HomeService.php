<?php

namespace App\Services;

use App\Repositories\Managements\ContactInfo\ContactInfoRepositoryInterface;
use App\Repositories\Managements\Service\ServiceRepositoryInterface;
use App\Repositories\Managements\ServiceDetail\ServiceDetailRepositoryInterface;
use App\Repositories\Managements\Slider\SliderRepositoryInterface;
use App\Repositories\Settings\Menu\MenuRepositoryInterface;
use App\Repositories\Settings\Provider\ProviderRepositoryInterface;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class HomeService
{
    public function __construct(
        SliderRepositoryInterface $sliderRepository, MenuRepositoryInterface $menuRepository, 
        ContactInfoRepositoryInterface $contactInfoRepository, ServiceRepositoryInterface $serviceRepository,
        ProviderRepositoryInterface $providerRepository
    )
    {
        $this->contactInfoRepository    = $contactInfoRepository;
        $this->serviceRepository        = $serviceRepository;
        $this->sliderRepository         = $sliderRepository;
        $this->menuRepository           = $menuRepository;
        $this->menuRepository           = $menuRepository;
        $this->providerRepository       = $providerRepository;
    }

    public function index()
    {
        $menu = $this->menuRepository->findByCondition("id, title, description, url", "url = ''");

        $data = [
            'sliders'           => $this->sliderRepository->getByCondition("id, title, subtitle, slug, description, picture", "menu_id = $menu->id", "order_no ASC"), 
            'contact_infos'     => $this->contactInfoRepository->getByCondition("id, title, subtitle, slug, description, icon", "menu_id = $menu->id", "order_no ASC"), 
            'services'          => $this->serviceRepository->getByCondition("id, title, subtitle, slug, description, icon, picture", "menu_id = $menu->id", "order_no ASC"), 
            'provider'          => $this->providerRepository->findByCondition("title", "disabled = 0"),
            'c_menu'            => $menu,
        ];

        return $data;
    }

    public function sitemap()
    {
        $sitemap = Sitemap::create()
            ->add(Url::create('/')->setLastModificationDate(now())->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setPriority(1.0))
            ->add(Url::create('/doctor-schedule')->setLastModificationDate(now())->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setPriority(0.8))
            ->add(Url::create('/service-facilites')->setLastModificationDate(now())->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setPriority(0.8))
            ->add(Url::create('/about-us')->setLastModificationDate(now())->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setPriority(0.8))
            ->add(Url::create('/contact-us')->setLastModificationDate(now())->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setPriority(0.8));

        return $sitemap->toResponse(request());
    }
}