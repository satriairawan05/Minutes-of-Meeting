<?php

use App\Http\Controllers\DepartemenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MeetController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\UserManagementController;

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
    return view('layout.dashboard');
})->name('dashboard');

Route::get('/meet/list', [MeetController::class, 'list'])->name('meet.data');
Route::resource('meet', MeetController::class);
Route::resource('issue', IssueController::class);
Route::resource('user',UserManagementController::class);
Route::resource('document',DocumentController::class);
Route::resource('departemen',DepartemenController::class);

Route::middleware(['guest'])->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('login', [LoginController::class, 'loginStore'])->name('login.store');
});

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

