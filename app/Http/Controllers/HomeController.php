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

    public function sitemap()
    {
        return $this->homeService->sitemap();
    }
}
