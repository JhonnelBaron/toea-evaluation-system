<?php

namespace App\Http\Controllers;

use App\Models\ExecutiveOfficeAccount;
use App\Models\RoFile;
use Illuminate\Http\Request;

class EoController extends Controller
{
    public function showRegionFiles($uploaderId)
    {
        $uploader = ExecutiveOfficeAccount::findOrFail($uploaderId);
        $files = RoFile::where('uploader_id', $uploaderId)->get();
        return view('executive.region-files', compact('files', 'uploader'));
    }
}
