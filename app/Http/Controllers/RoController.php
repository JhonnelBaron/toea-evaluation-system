<?php

namespace App\Http\Controllers;

use App\Models\RoFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoController extends Controller
{
       public function index()
    {
               // Get files uploaded by the authenticated user
               $files = RoFile::where('uploader_id', Auth::id())->get();

               // Pass the files data to the view
               return view('ro.upload', ['files' => $files]);
    }
    
}
