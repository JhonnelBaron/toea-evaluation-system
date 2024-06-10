<?php

namespace App\Http\Controllers;

use App\Models\RoFile;
use Illuminate\Http\Request;

class RoController extends Controller
{
       public function index()
    {
        $files = RoFile::all(); // Assuming you have a 'File' model representing your files

        // Pass the files data to the view
        return view('ro.upload', ['files' => $files]);
    }
}
