<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;

class IndexController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index', ['themes' => Theme::all()]);
    }
}
