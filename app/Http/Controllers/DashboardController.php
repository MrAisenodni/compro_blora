<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->url = '';
    }
    
    public function index()
    {
        $data = [
            'c_menu'       => $this->url,
        ];

        return view('index', $data);
    }
}
