<?php
/**
 * ClientManager.
 *
 * @file web.php
 * @project ClientManager
 *
 * @author Wayne Brummer
 */

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

\App\Services\AuthRoutes::UserRoutes();
\App\Services\AuthRoutes::AdminRoutes();

Route::get('/home', 'HomeController@index')->name('home');
