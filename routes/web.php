<?php

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
   return redirect(route('dashboard'));
});

Auth::routes();

Route::get('/home', function() {
	return redirect(route('dashboard'));
})->name('home');

Route::prefix('admin')->middleware('auth')->group(function() {
	Route::get('/', 'DashboardController@index')->name('dashboard');

	Route::post('users/bulkdel', 'UserController@bulkdel')->name('users.bulkdelete');
	Route::resource('users', 'UserController', [
		'names' => [
			'index' => 'users'
		]
	]);

	Route::get('settings', 'SettingController@show')->name('settings');
	Route::post('settings', 'SettingController@save')->name('settings.update');
});

Route::get('logout', function() {
	auth()->logout();
	return redirect(route('login'));
})->name('logout');