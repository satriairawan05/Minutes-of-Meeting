<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeetController;
use App\Http\Controllers\DailyController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\TrackerController;
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
    Route::get('issue/approved/create',[IssueController::class, 'approvedForm'])->name('issue.form_approved');
    Route::put('issue/{issue/approved',[IssueController::class, 'approved'])->name('issue.approved');
    Route::get('issue/{issue}/document',[IssueController::class, 'documentIssue'])->name('issue.document');
    Route::resource('archive', ArchiveController::class)->except(['create']);
    Route::post('archive/{meet}',[ArchiveController::class, 'store'])->name('archive.meet.store');

    Route::get('resume/{meet}',[ResumeController::class, 'resume'])->name('resume.meet');
    Route::get('resume/{meet}/create',[ResumeController::class, 'create'])->name('resume.meet.create');
    Route::post('resume/{meet}',[ResumeController::class, 'store'])->name('resume.meet.store');
    Route::get('resume/{issue}/edit',[ResumeController::class, 'edit'])->name('resume.issue.edit');
    Route::put('resume/{issue}',[ResumeController::class, 'update'])->name('resume.issue.update');
    Route::delete('resume/{issue}',[ResumeController::class, 'destroy'])->name('resume.issue.delete');

    Route::resource('daily',DailyController::class);
    Route::get('daily/{daily}/approval',[DailyController::class, 'approved'])->name('daily.approval');
    Route::post('daily/approved',[DailyController::class, 'requestApproved'])->name('daily.approved');
    Route::get('daily/{daily}/document',[DailyController::class, 'document'])->name('daily.document');

    Route::resource('group', GroupController::class);
    Route::resource('tracker', TrackerController::class);

    Route::get('preference', function(){
        return view('pref.index');
    })->name('preference');

    // experiment
    Route::get('/sidebar', function(){
        $access = "Read";

        $pages = Illuminate\Support\Facades\DB::table('users')->leftJoin('group_pages', 'users.group_id', '=', 'group_pages.group_id')
        ->leftJoin('groups', 'users.group_id', '=', 'groups.group_id')
        ->leftJoin('pages', 'group_pages.page_id', '=', 'pages.page_id')
        ->whereColumn('users.group_id', '=', 'groups.group_id')
        ->where('group_pages.access', '=', 1)
        ->where('pages.action', '=', $access)
        ->groupBy('pages.page_name', 'groups.group_name')
        ->orderBy('groups.group_name')
        // ->selectRaw(['group_name', 'page_name', 'action', 'access'])
        // ->pluck(['group_name', 'page_name', 'action', 'access'])
        ->select(['group_name', 'page_name', 'action', 'access'])
        ->get();

        return response()->json([
            'title' => 'Pages data',
            'data' => $pages
        ]);
    });
});
