<?php

namespace guestbook\Http\Controllers;

use Illuminate\Http\Request;

use guestbook\Http\Requests;
use guestbook\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }
}

