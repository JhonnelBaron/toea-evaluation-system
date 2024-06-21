<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Models\RoFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class RoFileController extends Controller
{
    public function store(Request $request, $regionId)
    {
        $region = Region::findOrFail($regionId);
        $request->validate([
            'file' => 'required|file|mimes:pdf|max:2048',
        ]);
        $user = Auth::user();
        $uploadedFile = $request->file('file'); 

        $executiveOffice = $user->executive_office;
        $regionName = $region->region_name;
        $storageDirectory = "uploads/$executiveOffice/$regionName";

        $fileName = $uploadedFile->getClientOriginalName();
        $path = Storage::disk('public')->putFileAs($storageDirectory, $uploadedFile, $fileName);
        $fileUrl = Storage::url($path);

        $roFile = new RoFile;
        $roFile->uploader_id = $user->id;
        $roFile->region_id = $region->id;
        $roFile->file_name = $request->input('title');
        $roFile->file_path = $fileUrl;
        $roFile->save(); 

        return back()->with('success', 'File uploaded successfully!');
    }
}
