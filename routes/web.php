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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'AppController@welcome');
Route::get('/about', 'AppController@about')->name('about');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('bookings', 'BookingController')->middleware('auth');

Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth', 'admin');
Route::resource('admin/meals', 'Admin\MealController')->names(renameAdminRoutes('meals'))->middleware('auth', 'admin');

function renameAdminRoutes($feature)
{
    return [
        'store' => 'admin.' . $feature . '.store',
        'index' => 'admin.' . $feature . '.index',
        'create' => 'admin.' . $feature . '.create',
        'destroy' => 'admin.' . $feature . '.destroy',
        'update' => 'admin.' . $feature . '.update',
        'show' => 'admin.' . $feature . '.show',
        'edit' => 'admin.' . $feature . '.edit',
    ];
}
