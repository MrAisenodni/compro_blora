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

    public function about()
    {
        $menu = $this->menuRepository->findByCondition("id, title, description, url", "url = 'tentang'");

        $data = [
            'sliders'           => $this->sliderRepository->getByCondition("id, title, subtitle, slug, description, picture", "menu_id = $menu->id", "order_no ASC"), 
            'contact_infos'     => $this->contactInfoRepository->getByCondition("id, title, subtitle, slug, description, icon", "menu_id = $menu->id", "order_no ASC"), 
            'services'          => $this->serviceRepository->getByCondition("id, title, subtitle, slug, description, icon, picture", "menu_id = $menu->id", "order_no ASC"), 
            'provider'          => $this->providerRepository->findByCondition("title", "disabled = 0"),
            'c_menu'            => $menu,
        ];

        return $data;
    }

    public function contact()
    {
        $menu = $this->menuRepository->findByCondition("id, title, description, url", "url = 'kontak'");

        $data = [
            'sliders'           => $this->sliderRepository->getByCondition("id, title, subtitle, slug, description, picture", "menu_id = $menu->id", "order_no ASC"), 
            'contact_infos'     => $this->contactInfoRepository->getByCondition("id, title, subtitle, slug, description, icon", "menu_id = $menu->id", "order_no ASC"), 
            'services'          => $this->serviceRepository->getByCondition("id, title, subtitle, slug, description, icon, picture", "menu_id = $menu->id", "order_no ASC"), 
            'provider'          => $this->providerRepository->findByCondition("title", "disabled = 0"),
            'c_menu'            => $menu,
        ];

        return $data;
    }

    public function service_facilities()
    {
        $menu = $this->menuRepository->findByCondition("id, title, description, url", "url = 'fasilitas-pelayanan'");

        $data = [
            'sliders'           => $this->sliderRepository->getByCondition("id, title, subtitle, slug, description, picture", "menu_id = $menu->id", "order_no ASC"), 
            'contact_infos'     => $this->contactInfoRepository->getByCondition("id, title, subtitle, slug, description, icon", "menu_id = $menu->id", "order_no ASC"), 
            'services'          => $this->serviceRepository->getByCondition("id, title, subtitle, slug, description, icon, picture", "menu_id = $menu->id", "order_no ASC"), 
            'provider'          => $this->providerRepository->findByCondition("title", "disabled = 0"),
            'c_menu'            => $menu,
        ];

        return $data;
    }

    public function doctor_schedule()
    {
        $menu = $this->menuRepository->findByCondition("id, title, description, url", "url = 'jadwal-dokter'");

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
            ->add(Url::create('/jadwal-dokter')->setLastModificationDate(now())->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setPriority(0.8))
            ->add(Url::create('/fasilitas-pelayanan')->setLastModificationDate(now())->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setPriority(0.8))
            ->add(Url::create('/tentang')->setLastModificationDate(now())->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setPriority(0.8))
            ->add(Url::create('/kontak')->setLastModificationDate(now())->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setPriority(0.8));

        return $sitemap->toResponse(request());
    }
}