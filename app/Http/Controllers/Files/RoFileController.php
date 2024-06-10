<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use App\Models\RoFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class RoFileController extends Controller
{
    //     public function store(Request $request)
    // {    
    //     $user = Auth::user();
    //     $region = $user->name; 
    //     $request->validate([
    //         'file' => 'required|mimes:pdf,doc,docx,xls,xlsx|max:2048',
    //     ]);
    //     $title = $request->input('title');

    //     $file = $request->file('file')->store('BRO/Regions/'. $region );
    //     // $fileName = $file->getClientOriginalName();
      
    //     $url = Storage::url($file);
    //     // $directory = "BRO/REGIONS/{$region}";

    //     // $filePath = $file->store($directory);
    //     // $fileUrl = URL::to('/') . Storage::url($filePath);
    //     RoFile::create([
    //         'title' => $title,
    //         'file_path' => $url,
    //         'uploader_id' => $user->id,
    //     ]);

    //     return redirect()->back()->with('success', 'File uploaded successfully.');
    // }
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:2048', // Adjust validation rules as needed
        ]);
        $user = Auth::user();
        // $title = $request->input('title');

        $fileName = time().'.'.$request->file->getClientOriginalExtension();
        $path = Storage::disk('public')->put('uploads', $request->file);
        $fileUrl = Storage::url($path);
        // Optional: You can store the path in a database here
        $roFile = new RoFile;
        $roFile->uploader_id = $user->id;
        $roFile->file_name = $fileName;
        $roFile->file_path = $fileUrl;
        $roFile->save(); 

        return back()->with('success', 'File uploaded successfully!');
    }
}
