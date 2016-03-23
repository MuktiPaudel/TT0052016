<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard','Teleamp_Controller@index');

Route::get('amp_database','Teleamp_Controller@database');
/** Route::get('amp_database','Teleamp_Controller@databasee'); */

Route::get('amp_graphical','Teleamp_Controller@graphical');

Route::get('ampmap_plan','Teleamp_Controller@mapplan');

Route::get('/demo','Demo@index');

Route::post('filters', 'Teleamp_Controller@filters');

Route::post('get_amplifiers', 'Teleamp_Controller@list_amplifiers');

Route::post('get_amp_groups', 'Teleamp_Controller@list_groups');

Route::post('get_chartfilter', 'Teleamp_Controller@limit_filter');


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

  Route::get('amp_install','Teleamp_Controller@install');
  Route::post('save','Teleamp_Controller@save');


});
