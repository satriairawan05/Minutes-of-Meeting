<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ActionController;
use App\Http\Controllers\HomeController;

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
});



Auth::routes();

Route::resource('action', ActionController::class);

Route::get('/dashboard', [HomeController::class, 'index']);

// Taroh Route untuk Admin disini
Route::group(['middleware' => ['role:super-admin']],function () {
    // Taroh Route::resoruce atau Route yang satuan disini

});
