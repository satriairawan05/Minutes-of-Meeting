<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\MeetController;

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
});

Route::get('/main', function () {
    return view('layout.meet');
});

Route::get('/meet/list', [MeetController::class,'list']);

Route::get('/meet/add', function () {
    return view('meet.addmeet');
});

Route::resource('meet', MeetController::class);

// Route::get('/action', function () {
//     return view('action.dataaction');
// });

Route::resource('action', ActionController::class);

Route::get('/action', [ActionController::class, 'index']);
