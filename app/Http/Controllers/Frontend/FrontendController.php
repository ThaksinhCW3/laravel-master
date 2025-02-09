<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function home() {
        return view('page.frontend.home');
    }

    public function about() {
        return view('page.frontend.about');
    }

    public function contact() {
        return view('page.frontend.contact');
    }

    public function blogs() {
        return view('page.frontend.blogs');
    }
}


