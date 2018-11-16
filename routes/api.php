<?php
/**
 * ClientManager.
 *
 * @file api.php
 * @project ClientManager
 *
 * @author Wayne Brummer
 */

/**
 * ClientManager.
 *
 * @file api.php
 * @project ClientManager
 *
 * @author Wayne Brummer
 */

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => '/v1', 'as' => 'admin.'], function () {
    Route::resource('companies', 'Api\CompaniesController', ['except' => ['create', 'edit']]);
});

Route::group(['prefix' => '/v1', 'as' => 'user.'], function () {
    Route::get('companies/link/{company_id}', 'Api\CompaniesController@link');
});
