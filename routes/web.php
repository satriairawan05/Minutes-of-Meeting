<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layout.meet');
})->name('dashboard');

Route::get('/main', function () {
    return view('layout.meet');
});

Route::get('/meet/list', [App\Http\Controllers\MeetController::class, 'list'])->name('issue');

Route::get('/meet/add', function () {
    return view('meet.addmeet');
});

Route::resource('meet', \App\Http\Controllers\MeetController::class);

Route::resource('issue',\App\Http\Controllers\MeetDetailController::class);
