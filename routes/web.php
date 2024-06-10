<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EoController;
use App\Http\Controllers\Files\RoFileController;
use App\Http\Controllers\RoController;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::get('/executive-office-dashboard', function () {
        return view('executive.dashboard');
    });

    Route::get('/regional-operations-management-division', function () {
        return view('romd.dashboard');
    });

    Route::get('/regional-office', function (){
        return view('ro.dashboard');
    });
    
});

Route::get('/region/{uploaderId}', [EoController::class, 'showRegionFiles'])->name('region.files');

//LOGOUT
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login')->middleware(RedirectIfAuthenticated::class);
Route::post('/', [LoginController::class, 'login'])->middleware(RedirectIfAuthenticated::class);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/galing-probinsya/small', function () {
    return view('gp-small');
})->name('gp-small');


Route::get('/galing-probinsya/large', function () {
    return view('gp-large');
})->name('gp-large');

Route::get('/galing-probinsya/medium', function () {
    return view('gp-medium');
})->name('gp-medium');

Route::get('/bit/ptc', function () {
    return view('bit-ptc');
})->name('bit-ptc');

Route::get('/bit/tas', function () {
    return view('bit-tas');
})->name('bit-tas');


Route::get('/bit/sp-evaluation', function () {
    return view('sp-evaluation');
})->name('sp-evaluation');

Route::get('/bit/sample', function () {
    return view('sample');
})->name('sample');

Route::get('/annexba', function () {
    return view('annexba');
})->name('annexba');


//ROUTE FOR EVALUATIONS
//GALING PROBINSYA: SMALL
Route::get('/gpsp-evaluation', function () {
    return view('/gpsp-evaluation');
})->name('/gpsp-evaluation');


Route::get('/upload-file', [RoController::class, 'index'])->name('upload.file');
Route::post('/upload-file', [RoFileController::class, 'store'])->name('upload.file');