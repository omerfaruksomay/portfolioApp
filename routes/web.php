<?php

use App\Http\Controllers\Back\AuthController;
use App\Http\Controllers\Back\Dashboard;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\front\HomePageController;



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

/*
|--------------------------------------------------------------------------
| Back Routes
|--------------------------------------------------------------------------
*/

Route::prefix('/admin')->middleware('isLogin')->group(function (){
    Route::get('/giris',[AuthController::class,'login'])->name('admin.login');
    Route::post('/giris',[AuthController::class,'loginPost'])->name('admin.login.post');
});

/////-------/////
Route::prefix('/admin')->middleware('isAdmin')->group(function (){
    Route::get('/panel',[Dashboard::class,'index'])->name('admin.dashboard');
    Route::resource('/projeler','App\Http\Controllers\Back\ProjectController');
    Route::get('/cikis',[AuthController::class,'logout'])->name('admin.logout');
});




/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/
Route::get('/',[HomePageController::class,'index'])->name('homepage');
Route::post('/',[HomePageController::class,'postMessage'])->name('message.post');
Route::get('project/{id}',[HomePageController::class,'showProjects'])->name('projects.show');








