<?php

namespace App\Services;

use App\Repositories\Masters\Template\TemplateRepositoryInterface;

class DashboardService
{
    public function __construct(TemplateRepositoryInterface $templateRepository)
    {
        $this->templateRepository   = $templateRepository;
    }

    public function index()
    {
        $data = [
            'templates'     => $this->templateRepository->getAll(), 
            'c_menu'        => '',
        ];

        return $data;
    }
}