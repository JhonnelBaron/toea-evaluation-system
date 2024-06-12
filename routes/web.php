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
        return view('executive.eodashboard');
    });

    Route::get('/regional-operations-management-division', function () {
        return view('romd.dashboard');
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
Route::get('/gpsp-evaluation-a', function () {
    return view('/gpsp-evaluation-a');
})->name('/gpsp-evaluation-a');

Route::get('/gpsp-evaluation-b', function () {
    return view('/gpsp-evaluation-b');
})->name('/gpsp-evaluation-b');

Route::get('/gpsp-evaluation-c', function () {
    return view('/gpsp-evaluation-c');
})->name('/gpsp-evaluation-c');

Route::get('/gpsp-evaluation-d', function () {
    return view('/gpsp-evaluation-d');
})->name('/gpsp-evaluation-d');

Route::get('/gpsp-evaluation-e', function () {
    return view('/gpsp-evaluation-e');
})->name('/gpsp-evaluation-e');



//GALING PROBINSYA: MEDUIM

Route::get('/gpmp-evaluation-a', function () {
    return view('/gpmp-evaluation-a');
})->name('/gpmp-evaluation-a');

Route::get('/gpmp-evaluation-b', function () {
    return view('/gpmp-evaluation-b');
})->name('/gpmp-evaluation-b');

Route::get('/gpmp-evaluation-c', function () {
    return view('/gpmp-evaluation-c');
})->name('/gpmp-evaluation-c');

Route::get('/gpmp-evaluation-d', function () {
    return view('/gpmp-evaluation-d');
})->name('/gpmp-evaluation-d');

Route::get('/gpmp-evaluation-e', function () {
    return view('/gpmp-evaluation-e');
})->name('/gpmp-evaluation-e');


//GALING PROBINSYA: LARGE

Route::get('/gplp-evaluation-a', function () {
    return view('/gplp-evaluation-a');
})->name('/gplp-evaluation-a');

Route::get('/gplp-evaluation-b', function () {
    return view('/gplp-evaluation-b');
})->name('/gplp-evaluation-b');

Route::get('/gplp-evaluation-c', function () {
    return view('/gplp-evaluation-c');
})->name('/gplp-evaluation-c');

Route::get('/gplp-evaluation-d', function () {
    return view('/gplp-evaluation-d');
})->name('/gplp-evaluation-d');

Route::get('/gplp-evaluation-e', function () {
    return view('/gplp-evaluation-e');
})->name('/gplp-evaluation-e');


//BRO SUBMISSION LIST

Route::get('/bro-evaluation-a', function () {
    return view('/bro-evaluation-a');
})->name('/bro-evaluation-a');

Route::get('/bro-evaluation-b', function () {
    return view('/bro-evaluation-b');
})->name('/bro-evaluation-b');

Route::get('/bro-evaluation-c', function () {
    return view('/bro-evaluation-c');
})->name('/bro-evaluation-c');

Route::get('/bro-evaluation-d', function () {
    return view('/bro-evaluation-d');
})->name('/bro-evaluation-d');

Route::get('/bro-evaluation-e', function () {
    return view('/bro-evaluation-e');
})->name('/bro-evaluation-e');



//EXECUTIVE ECALUATIONS
Route::get('/as-evaluation', function () {
    return view('executive.as-evaluate');
})->name('/as-evaluation');

Route::get('/ld-evaluation', function () {
    return view('executive.ld-evaluate');
})->name('/ld-evaluation');

Route::get('/co-evaluation', function () {
    return view('executive.co-evaluate');
})->name('/co-evaluation');

Route::get('/fms-evaluation', function () {
    return view('executive.fms-evaluate');
})->name('/fms-evaluation');

Route::get('/nitesd-evaluation', function () {
    return view('executive.nitesd-evaluate');
})->name('/nitesd-evaluation');

Route::get('/piad-evaluation', function () {
    return view('executive.piad-evaluate');
})->name('/piad-evaluation');

Route::get('/po-evaluation', function () {
    return view('executive.po-evaluate');
})->name('/po-evaluation');

Route::get('/plo-evaluation', function () {
    return view('executive.plo-evaluate');
})->name('/plo-evaluation');





Route::get('/eo-evaluation', function () {
    return view('executive.evaluate');
})->name('eo.evaluate');

Route::get('/upload-file', [RoController::class, 'index'])->name('upload.file');
Route::post('/upload-file', [RoFileController::class, 'store'])->name('upload.file');