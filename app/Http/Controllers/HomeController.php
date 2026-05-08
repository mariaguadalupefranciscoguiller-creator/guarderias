<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        $centros = Centro::all();
        return view('home', compact('centros'));
    }
}