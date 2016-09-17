<?php
namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function accommodation()
    {
        return view('home.accommodation');
    }

    public function manege()
    {
        return view('home.manege');
    }

    public function about()
    {
        return view('home.about');
    }
}
