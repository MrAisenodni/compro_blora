<?php

namespace App\Services;

use App\Helpers\AppHelper;
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
        $menu = $this->menuRepository->findBySlug('');

        $data = [
            'provider'          => $this->providerRepository->findData(),
            'sliders'           => $this->sliderRepository->getByCondition("id, title, subtitle, slug, description, picture", "menu_id = $menu->id", "order_no ASC"), 
            'contact_infos'     => $this->contactInfoRepository->getByCondition("id, title, subtitle, slug, description, icon", "menu_id = $menu->id", "order_no ASC"), 
            'services'          => $this->serviceRepository->getByCondition("id, title, subtitle, slug, description, icon, picture", "menu_id = $menu->id", "order_no ASC"), 
            'c_menu'            => $menu,
        ];

        return $data;
    }

    public function page($slug)
    {
        $menu = $this->menuRepository->findBySlug($slug);

        $data = [
            'provider'          => $this->providerRepository->findData(),
            'sliders'           => $this->sliderRepository->getByCondition("id, title, subtitle, slug, description, picture", "menu_id = $menu->id", "order_no ASC"), 
            'contact_infos'     => $this->contactInfoRepository->getByCondition("id, title, subtitle, slug, description, icon", "menu_id = $menu->id", "order_no ASC"), 
            'services'          => $this->serviceRepository->getByCondition("id, title, subtitle, slug, description, icon, picture", "menu_id = $menu->id", "order_no ASC"), 
            'c_menu'            => $menu,
        ];

        return $data;
    }

    public function sitemap()
    {
        $sitemap = Sitemap::create(env('APP_URL_PRODUCTION'))
            ->add(Url::create('/')->setLastModificationDate(now())->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setPriority(1.0))
            ->add(Url::create('/jadwal-dokter')->setLastModificationDate(now())->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setPriority(0.8))
            ->add(Url::create('/fasilitas-pelayanan')->setLastModificationDate(now())->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setPriority(0.8))
            ->add(Url::create('/tentang')->setLastModificationDate(now())->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setPriority(0.8))
            ->add(Url::create('/kontak')->setLastModificationDate(now())->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setPriority(0.8))
            ->writeToFile(public_path('sitemap.xml'));

        return $sitemap->render();
    }
}