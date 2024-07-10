<?php

use App\Http\Controllers\AsEvaluationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BroEvaluationController;
use App\Http\Controllers\EoController;
use App\Http\Controllers\Files\RoFileController;
use App\Http\Controllers\GpContoller;
use App\Http\Controllers\RoController;
use App\Http\Controllers\RomdController;
use App\Http\Controllers\Secretariat\CoEvaluationController;
use App\Http\Controllers\Secretariat\FmsEvaluationController;
use App\Http\Controllers\Secretariat\IctoEvaluationController;
use App\Http\Controllers\Secretariat\LdEvaluationController;
use App\Http\Controllers\Secretariat\NitesdEvaluationController;
use App\Http\Controllers\Secretariat\PiadEvaluationController;
use App\Http\Controllers\Secretariat\PloEvaluationController;
use App\Http\Controllers\Secretariat\PoEvaluationController;
use App\Http\Controllers\Secretariat\RomoEvaluationController;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::get('/executive-office-dashboard', function () {
        return view('executive.eodashboard');
    });
    Route::get('/evaluation-page', [BroEvaluationController::class, 'index'])->name('evaluation-list');

    // Route::get('/regional-operations-management-division', function () {
    //     return view('romd.dashboard');
    // });
    Route::get('/regional-operations-management-division', [RomdController::class, 'fetchBROSubmission'])->name('romd.progress');
    Route::get('/home', [RomdController::class, 'home'])->name('home');
    Route::get('/galing-probinsya', [GpContoller::class, 'getGalingProbinsyaUsers']);
    
});

Route::get('/region/{uploaderId}', [EoController::class, 'showRegionFiles'])->name('region.files');

//LOGOUT
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login')->middleware(RedirectIfAuthenticated::class);
Route::post('/', [LoginController::class, 'login'])->middleware(RedirectIfAuthenticated::class);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/romd/ranking', [RomdController::class, 'ranking'])->name('romd.ranking');

Route::get('/galing-probinsya/small', function () {
    return view('gp-small');
})->name('gp-small');

// Route::get('/home', function () {
//     return view('romd.home');
// })->name('home');







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
// Route::get('/as-evaluation', function () {
//     return view('executive.as-evaluate');
// })->name('/as-evaluation');

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








//Galing Probinsya Admin 

Route::get('/gpadmin-a', function () {
    return view('romd.bestti-gp-pillars.gpadmin-a');
})->name('/gpadmin-a');

Route::get('/gpadmin-b', function () {
    return view('romd.bestti-gp-pillars.gpadmin-b');
})->name('/gpadmin-b');

Route::get('/gpadmin-c', function () {
    return view('romd.bestti-gp-pillars.gpadmin-c');
})->name('/gpadmin-c');

Route::get('/gpadmin-d', function () {
    return view('romd.bestti-gp-pillars.gpadmin-d');
})->name('/gpadmin-d');

Route::get('/gpadmin-e', function () {
    return view('romd.bestti-gp-pillars.gpadmin-e');
})->name('/gpadmin-e');










//Best TRAINING INSTITUTION ADMIN STC/RTC TAS
Route::get('/besttiadmin-rtcstctas-a', function () {
    return view('romd.bestti-gp-pillars.besttiadmin-rtcstctas-a');
})->name('/besttiadmin-rtcstctas-a');

Route::get('/besttiadmin-rtcstctas-b', function () {
    return view('romd.bestti-gp-pillars.besttiadmin-rtcstctas-b');
})->name('/besttiadmin-rtcstctas-b');

Route::get('/besttiadmin-rtcstctas-c', function () {
    return view('romd.bestti-gp-pillars.besttiadmin-rtcstctas-c');
})->name('/besttiadmin-rtcstctas-c');

Route::get('/besttiadmin-rtcstctas-d', function () {
    return view('romd.bestti-gp-pillars.besttiadmin-rtcstctas-d');
})->name('/besttiadmin-rtcstctas-d');

Route::get('/besttiadmin-rtcstctas-e', function () {
    return view('romd.bestti-gp-pillars.besttiadmin-rtcstctas-e');
})->name('/besttiadmin-rtcstctas-e');



//Best TRAINING INSTITUTION ADMIN PTC
Route::get('/besttiadmin-ptc-a', function () {
    return view('romd.bestti-gp-pillars.besttiadmin-ptc-a');
})->name('/besttiadmin-ptc-a');

Route::get('/besttiadmin-ptc-b', function () {
    return view('romd.bestti-gp-pillars.besttiadmin-ptc-b');
})->name('/besttiadmin-ptc-b');

Route::get('/besttiadmin-ptc-c', function () {
    return view('romd.bestti-gp-pillars.besttiadmin-ptc-c');
})->name('/besttiadmin-ptc-c');

Route::get('/besttiadmin-ptc-d', function () {
    return view('romd.bestti-gp-pillars.besttiadmin-ptc-d');
})->name('/besttiadmin-ptc-d');

Route::get('/besttiadmin-ptc-e', function () {
    return view('romd.bestti-gp-pillars.besttiadmin-ptc-e');
})->name('/besttiadmin-ptc-e');






// Route::get('/eo-evaluation', function () {
//     return view('executive.evaluate');
// })->name('eo.evaluate');

// Route::get('/evaluation-page', [BroEvaluationController::class, 'index'])->name('evaluation-list');
Route::post('/saveRemarks', [BroEvaluationController::class, 'saveRemarks'])->name('save.remarks');
Route::get('/secretariat-evaluation/{id}', [BroEvaluationController::class, 'evaluationIndex'])->name('evaluation');
Route::post('/save-evaluation', [AsEvaluationController::class, 'store'])->name('save_evaluation');

Route::post('/submit-evaluation-co', [CoEvaluationController::class, 'coSubmit'])->name('co_evaluation');
Route::post('/submit-evaluation-ld', [LdEvaluationController::class, 'ldSubmit'])->name('ld_evaluation');
Route::post('/submit-evaluation-fms', [FmsEvaluationController::class, 'fmsSubmit'])->name('fms_evaluation');
Route::post('/submit-evaluation-nitesd', [NitesdEvaluationController::class, 'nitesdSubmit'])->name('nitesd_evaluation');
Route::post('/submit-evaluation-piad', [PiadEvaluationController::class, 'piadSubmit'])->name('piad_evaluation');
Route::post('/submit-evaluation-po', [PoEvaluationController::class, 'poSubmit'])->name('po_evaluation');
Route::post('/submit-evaluation-plo', [PloEvaluationController::class, 'ploSubmit'])->name('plo_evaluation');
Route::post('/submit-evaluation-romo', [RomoEvaluationController::class, 'romoSubmit'])->name('romo_evaluation');
Route::post('/submit-evaluation-icto', [IctoEvaluationController::class, 'ictoSubmit'])->name('icto_evaluation');

Route::get('/upload-file/{region}', [RoController::class, 'index'])->name('fetch-upload.file');
Route::get('/region-folders', [RoController::class, 'showFolders'])->name('region.folders');
Route::post('/upload-file/{region}', [RoFileController::class, 'store'])->name('upload.file');