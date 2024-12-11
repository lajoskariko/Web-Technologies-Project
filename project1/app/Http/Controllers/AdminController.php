<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function adminView()
    {
        return view('admin');
    }

    public function createView()
    {
        return view('create');
    }

    public function updateView()
    {
        return view('update');
    }

    public function deleteView()
    {
        return view('delete');
    }
}