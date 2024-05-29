<?php

namespace App\Services;

use App\Repositories\Managements\ContactInfo\ContactInfoRepositoryInterface;
use App\Repositories\Managements\Slider\SliderRepositoryInterface;
use App\Repositories\Settings\Menu\MenuRepositoryInterface;

class HomeService
{
    public function __construct(SliderRepositoryInterface $sliderRepository, MenuRepositoryInterface $menuRepository, ContactInfoRepositoryInterface $contactInfoRepository)
    {
        $this->sliderRepository         = $sliderRepository;
        $this->contactInfoRepository    = $contactInfoRepository;
        $this->menuRepository           = $menuRepository;
    }

    public function index()
    {
        $menu = $this->menuRepository->findByCondition("id, url", "url = ''");

        $data = [
            'sliders'           => $this->sliderRepository->getByCondition("title, description, picture", "menu_id = $menu->id", "order_no ASC"), 
            'contact_infos'     => $this->contactInfoRepository->getByCondition("title, description, icon", "menu_id = $menu->id", "order_no ASC"), 
            'c_menu'            => $menu->url,
        ];

        return $data;
    }

    public function about()
    {
        $menu = $this->menuRepository->findByCondition("id, url", "url = ''");

        $data = [
            'sliders'           => $this->sliderRepository->getByCondition("title, description, picture", "menu_id = $menu->id", "order_no ASC"), 
            'contact_infos'     => $this->contactInfoRepository->getByCondition("title, description, icon", "menu_id = $menu->id", "order_no ASC"), 
            'c_menu'            => $menu->url,
        ];

        return $data;
    }
}