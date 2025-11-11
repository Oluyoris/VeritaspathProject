<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Work;

class HomeController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        $works = Work::latest()->take(6)->get(); // Fetch the latest 6 jobs
        return view('home', compact('settings', 'works'));
    }

    public function about()
    {
        $settings = Setting::first();
        return view('about', compact('settings'));
    }

    public function contact()
    {
        $settings = Setting::first();
        return view('contact', compact('settings'));
    }
}