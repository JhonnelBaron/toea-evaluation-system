<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\RoFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoController extends Controller
{
       public function index($regionId)
    {           
        $region = Region::findOrFail($regionId);
               // Get files uploaded by the authenticated user
        $files = RoFile::where('uploader_id', Auth::id())
        ->where('region_id', $regionId)
        ->get();

               // Pass the files data to the view
               return view('ro.test-upload', ['files' => $files, 'region' => $region]);
    }

    public function showFolders()
    {
        $regions = Region::all();
        return view('ro.region', compact('regions'));
    }
    
}
