<?php

use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\CurrencyController;

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



Route::redirect('/', '/usd');
Route::get('/login', function () {
    return view('auth.login');
});



Auth::routes();
Route::get('/usd', 'HomeController@index')->name('product');
Route::get('/{code}', 'HomeController@show');
// Route::get('/product', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::post('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');


Route::prefix('admin')->group(function(){
Route::get('/register', 'Auth\AdminRegisterController@showRegistrationForm')->name('admin.register');
Route::get('/currency', 'CurrencyController@index')->name('admin.currency');
Route::get('/product', 'ProductController@create')->name('admin.product');
Route::get('/product/list', 'ProductController@index')->name('admin.product.list');
Route::post('/add', 'ProductController@store')->name('admin.add.product');
Route::get('/status', 'CurrencyController@update')->name('admin.currency.update');
// Route::get('users', [CurrencyController::class, 'index'])->name('users.index');
Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register');
Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

// Services 

Route::get('/add/service', 'ServiceController@index')->name('admin.add.service');
Route::post('/store/service', 'ServiceController@store')->name('admin.store.service');

Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');

Route::get('/markasread',function(){
	$_admin = Auth::guard('admin')->user();
	$_admin->unreadNotifications->markAsRead();
});

    Route::get('/user/profile/{user_id}', 'HomeController@profile')->name('admin.user.profile');

});
