<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoController extends Controller
{
       public function index()
    {
        return view('ro.upload');
    }
}
