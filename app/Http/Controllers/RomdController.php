<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RomdController extends Controller
{
    public function index()
    {
        return view('romd.dashboard');
    }
}
