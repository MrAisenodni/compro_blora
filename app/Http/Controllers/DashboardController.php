<?php

namespace App\Http\Controllers;

use App\Services\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService     = $dashboardService;
    }
    
    public function index()
    {
        $data = $this->dashboardService->index();
        // dd($data['templates'][0]->content);

        return view('index', $data);
    }
}
