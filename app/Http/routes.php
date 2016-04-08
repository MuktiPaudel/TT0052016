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



});

Route::group(['middleware' => 'web'], function () {
    Route::get('/', function () {

        if (Auth::check()) {
            return redirect('/dashboard');
        }
        return view('auth.login');
    });

    // Authentication Routes...
  $this->get('login', 'Auth\AuthController@showLoginForm');
  $this->post('login', 'Auth\AuthController@login');
  $this->get('logout', 'Auth\AuthController@logout');

Route::group(['middleware' => 'auth'], function () {

  // Registration Routes...
  $this->get('register', 'Auth\AuthController@showRegistrationForm');
  $this->post('register', 'Auth\AuthController@register');

  Route::get('amp_install','Teleamp_Controller@install');
  Route::get('amp_map_plan','Teleamp_Controller@mapplan');
  Route::post('save','Teleamp_Controller@save');
  Route::post('edit_amp_details','Teleamp_Controller@edit_amp_details');

  Route::get('dashboard','Teleamp_Controller@index');

  Route::get('amp_database','Teleamp_Controller@database');
  /** Route::get('amp_database','Teleamp_Controller@databasee'); */

  Route::get('amp_graphical','Teleamp_Controller@graphical');

  Route::get('/demo','Demo@index');

  Route::post('filters', 'Teleamp_Controller@filters');

  Route::post('get_amplifiers', 'Teleamp_Controller@list_amplifiers');

  Route::post('get_amp_groups', 'Teleamp_Controller@list_groups');

  Route::post('get_chartfilter', 'Teleamp_Controller@limit_filter');

});

  // Password Reset Routes...
  $this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
  $this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
  $this->post('password/reset', 'Auth\PasswordController@reset');

    Route::get('/dashboard', 'HomeController@index');
});
