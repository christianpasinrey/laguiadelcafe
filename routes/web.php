<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
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

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/admin',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin',[LoginController::class,'login'])->name('admin.login');

Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/dashboard',function(){
    $admin = Admin::find(auth()->id());
    return view('admin', compact('admin'));
})->middleware('auth:admin')->name('admin.dashboard');

Route::group(['middleware' => 'auth:admin'], function () {
    Route::resource('admins', '\App\Http\Controllers\AdminController');
    Route::resource('posts', '\App\Http\Controllers\PostController');
    Route::resource('post-categories', '\App\Http\Controllers\PostCategoryController');
    Route::resource('comments', '\App\Http\Controllers\CommentController');
});
