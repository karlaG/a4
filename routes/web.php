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

/**
* Log viewer
* (only accessible locally)
*/
if(config('app.env') == 'local') {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}

Route::group(['middleware' => ['web']], function () {
  Route::auth();
  Route::get('/', 'HomeController@main');
  Route::get('/home', 'HomeController@index');
  Route::post('/task', 'TaskController@create');
  Route::get('/edit/{id}', 'TaskController@edit');
  Route::post('/save', 'TaskController@saveEdit');
  Route::post('/delete', 'TaskController@destroy');
});
