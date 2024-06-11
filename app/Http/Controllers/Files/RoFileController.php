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
