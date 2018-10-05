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
    return view('welcome');
});

Route::group(['prefix' => 'admision'], function () {
    Voyager::routes();

    Route::get('/excel', 'Voyager\EstudiantesController@export')->name('excel');
    Route::get('download', 'Voyager\PasantiasController@export')->name('download');

    Route::get('room', function () {
        // Matches The "/admin/room" URL
        return view('test');
    })->middleware('admin.user');

});



/* Route::namespace('Admin')->group(function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    Route::group(['middleware' => 'admin.user'], function () {
        Route::get('room', function () {
            // Matches The "/admin/room" URL
            return view('test');
        });
    });
});
*/