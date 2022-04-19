<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\AdminController;
use App\http\Controllers\ClientController;
use App\http\Controllers\ManageAdmin;
use App\http\Controllers\ManageClient;
use App\http\Controllers\CategoryController;
use App\http\Controllers\ProductController;
use App\http\Controllers\FrontController;
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
	// Route::put('/register', 'ManageClient@store');

	Route::post('/registeradmin', [ManageAdmin::class, 'store'])->name('admin.registeradmin');
	Route::get('/register', [ManageClient::class, 'create'])->name('admin.register');
	Route::post('/updateadmin/{id}', [ManageAdmin::class, 'update'])->name('admin.updateadmin');
	Route::get('/admins', [ManageAdmin::class, 'index'])->name('admin.admins');
	Route::get('/{id}/delete', [ManageClient::class, 'destroy']);
	Route::get('/{id}/deleteadmin', [ManageAdmin::class, 'destroy']);
	Route::get('/{id}/edit', [ManageAdmin::class, 'edit']);

	
});
Route::group(['prefix'=>'client','middleware' => ['isClient','auth', 'PreventBackHistory']], function () {
	Route::get('dashboard', [ClientController::class, 'index'])->name('client.dashboard');
	Route::get('profile', [ClientController::class, 'profile'])->name('client.profile');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::get('products', [ProductController::class, 'create'])->name('client.products');
	Route::post('/addproducts', [ProductController::class, 'store'])->name('client.addproducts');

	Route::get('/{id}/edit', [ProductController::class, 'edit']);
	Route::post('/updateproduct/{id}', [ProductController::class, 'update'])->name('client.updateproduct');
	Route::get('/{id}/deleteproduct', [ProductController::class, 'destroy']);
	
	Route::get('category', [CategoryController::class, 'create'])->name('client.category');
	Route::post('/addcategory', [CategoryController::class, 'store'])->name('client.addcategory');
	Route::get('/{id}/editcategory', [CategoryController::class, 'edit']);
	Route::post('/updatecategory/{id}', [CategoryController::class, 'update'])->name('client.updatecategory');
	
	Route::get('displayproducts', [ProductController::class, 'index'])->name('client.displayproducts');
	Route::get('/displaycategory', [CategoryController::class, 'index'])->name('client.displaycategory');
	Route::get('/index', [FrontController::class, 'index'])->name('client.index');
});
