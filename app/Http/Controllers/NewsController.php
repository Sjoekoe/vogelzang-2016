<?php
namespace App\Http\Controllers;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('news.index');
    }
}
