<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('vendor.bizland.index');
});

Auth::routes();



Route::middleware(['auth'])->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/home', 'index')->name('home');
        Route::get('/form_basic', 'form_basic')->name('form_basic');
        Route::get('/form_advance', 'form_advance')->name('form_advance');
        Route::get('/component_tool', 'component_tool')->name('component_tool');
        Route::get('/component_widget', 'component_widget')->name('component_widget');
    });
});

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);
});
