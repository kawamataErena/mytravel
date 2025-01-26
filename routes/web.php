<?php

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
    return view('welcome');
});

use App\Http\Controllers\Admin\ShioriController;
Route::controller(ShioriController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('shiori/create', 'add')->middleware('auth');
    Route::get('shiori/create', 'add')->name('shiori.add');
    Route::post('shiori/create','create')->name('shiori.create');
    Route::get('shiori', 'index')->name('shiori.index');
    Route::get('shiori/edit','edit')->name('shiori.edit');
    Route::post('shiori/edit','update')->name('shiori.update');
    Route::get('shiori/delete','delete')->name('shiori.delete');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\Admin\HomeController as PublicHomeController;
Route::get('/',[PublicHomeController::class,'index'])->name('shiori.index');

use App\Http\Controllers\Admin\MemoController;
Route::controller(MemoController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('memo/create','add')->name('memo.add');
    Route::post('memo/create','create')->name('memo.create');
});
