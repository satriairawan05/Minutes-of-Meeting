<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeetController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\ResumeController;
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

Route::middleware(['guest'])->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'loginStore'])->name('login.store');
});

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/', function () {
        return view('layout.dashboard');
    })->name('dashboard');

    Route::resource('user',UserManagementController::class);
    Route::resource('departemen',DepartemenController::class);

    Route::resource('meet', MeetController::class);
    Route::resource('issue', IssueController::class);
    Route::resource('document',DocumentController::class);

    Route::get('resume/{meet}',[ResumeController::class, 'resume'])->name('resume.meet');
    Route::get('resume/{meet}/create',[ResumeController::class, 'create'])->name('resume.meet.create');
    Route::post('resume/{meet}',[ResumeController::class, 'store'])->name('resume.meet.store');
    Route::get('resume/{issue}/edit',[ResumeController::class, 'edit'])->name('resume.issue.edit');
    Route::put('resume/{issue}',[ResumeController::class, 'update'])->name('resume.issue.update');
    Route::delete('resume/{issue}',[ResumeController::class, 'destroy'])->name('resume.issue.delete');

    // Store data Issue ke Document
    Route::get('issue/{issue}/doc', [DocumentController::class, 'showForm'])->name('issueDoc.form');

    // Update data Issue ke Document yang sudah ada
    Route::get('issue/{issue}/doc/{doc}/edit',[DocumentController::class, 'editForm'])->name('issue.document.edit');
    Route::put('issue/{issue}/doc',[DocumentController::class, 'updateForm'])->name('issueDoc.update');

    Route::resource('group', GroupController::class);
    Route::get('user/setting/create',[SettingController::class,'create'])->name('setting.create');

    Route::get('preference', function(){
        return view('pref.index');
    })->name('preference');
});

