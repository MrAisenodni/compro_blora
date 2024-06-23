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

    public function store(Request $request, $slug)
    {
        $data = $this->homeService->store($request, $slug);

        return back()->withInput();
    }

    public function page($slug)
    {
        $data = $this->homeService->page($slug);

        return view($data['c_menu']->route, $data);
    }

    public function sitemap()
    {
        return $this->homeService->sitemap();
    }
}
