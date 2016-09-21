<?php
namespace App\Http\Controllers;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('messages.index');
    }
}
