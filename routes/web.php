<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\AdminController;
use App\http\Controllers\ClientController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware' => ['isAdmin','auth', 'PreventBackHistory']], function () {
	// Route::resource('user', 'UserController', ['except' => ['show']]);
	// Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	// Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	// Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
	Route::resource('user', 'AdminController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	
});
Route::group(['prefix'=>'user','middleware' => ['isClient','auth', 'PreventBackHistory']], function () {
	Route::get('index', [ClientController::class, 'index'])->name('client.index');
	Route::get('profile', [ClientController::class, 'profile'])->name('client.profile');
	Route::get('settings', [ClientController::class, 'settings'])->name('client.settings');
});
