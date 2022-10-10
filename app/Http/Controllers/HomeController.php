<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('home');
    }
    public function form_basic()
    {
        return view('form_basic');
    }
    public function form_advance()
    {
        return view('form_advance');
    }
    public function component_tool()
    {
        return view('component_tool');
    }
    public function component_widget()
    {
        return view('component_widget');
    }
}
