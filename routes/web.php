<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ActionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\MeetController;
use App\Http\Controllers\Admin\MeetDetailController;

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
    return view('admin.layout.meet');
})->name('dashboard');

Auth::routes();
Route::get('/dashboard', [HomeController::class, 'index']);

Route::get('/meet/list', [MeetController::class,'list'])->name('meet.list');

Route::get('/meet/add', function () {
    return view('admin.meet.addmeet');
});

Route::resource('meet', MeetController::class);

Route::resource('issue', MeetDetailController::class);

// Taroh Route untuk Admin disini
Route::group(['middleware' => ['role:super-admin']],function () {
    // Taroh Route::resoruce atau Route yang satuan disini

});
