<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;

//LOGOUT
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Define routes based on executive_office column value
Route::get('/administrative-service', function () {
    return view('executive.administrative');
})->middleware('auth');

Route::get('/legal-division', function () {
    return view('legal-division');
})->middleware('auth');

Route::get('/certification-office', function () {
    return view('certification-office');
})->middleware('auth');

Route::get('/financial-and-management-service', function () {
    return view('financial-and-management-service');
})->middleware('auth');

Route::get('/national-institute-for-technical-education-and-skills-development', function () {
    return view('national-institute-for-technical-education-and-skills-development');
})->middleware('auth');

Route::get('/public-information-and-assistance-division', function () {
    return view('public-information-and-assistance-division');
})->middleware('auth');

Route::get('/planning-office', function () {
    return view('planning-office');
})->middleware('auth');

Route::get('/partnership-and-linkages-office', function () {
    return view('partnership-and-linkages-office');
})->middleware('auth');

Route::get('/regional-operations-management-office', function () {
    return view('regional-operations-management-office');
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

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
<<<<<<< HEAD
=======

Route::get('/bit/sp-evaluation', function () {
    return view('sp-evaluation');
})->name('sp-evaluation');

Route::get('/bit/sample', function () {
    return view('sample');
})->name('sample');

Route::get('/annexba', function () {
    return view('annexba');
})->name('annexba');
>>>>>>> f490fa89f725bd1459a83389065921b8887991a7
