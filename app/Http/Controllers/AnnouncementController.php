<?php
namespace App\Http\Controllers;

class AnnouncementController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('announcements.index');
    }
}
