<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function homeView()
    {
        return view('home');
    }
}