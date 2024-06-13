<?php

namespace App\Http\Controllers;

use App\Services\HomeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(HomeService $homeService)
    {
        $this->homeService     = $homeService;
    }
    
    public function index()
    {
        $data = $this->homeService->index();

        return view('index', $data);
    }

    public function store(Request $request)
    {
        abort(503);
    }

    public function about()
    {
        $data = $this->homeService->about();

        return view('about', $data);
    }

    public function contact()
    {
        $data = $this->homeService->contact();

        return view('contact', $data);
    }

    public function service_facilities()
    {
        $data = $this->homeService->service_facilities();

        return view('service_facilities', $data);
    }

    public function doctor_schedule()
    {
        $data = $this->homeService->doctor_schedule();

        return view('doctor_schedule', $data);
    }

    public function sitemap()
    {
        return $this->homeService->sitemap();
    }
}
