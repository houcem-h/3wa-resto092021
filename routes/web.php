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

Route::middleware('auth')->group(function () {
    Route::resource('bookings', 'BookingController');

    Route::group([
        'middleware' => 'admin',
        'prefix' => 'admin',
        'namespace' => 'Admin'
    ], function () {
        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
        Route::resource('meals', 'MealController')->names(renameAdminRoutes('meals'));
        Route::resource('bookings', 'BookingController')->names(renameAdminRoutes('bookings'));
        Route::resource('orders', 'OrderController')->names(renameAdminRoutes('orders'));
    });
});


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
