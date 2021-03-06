<?php
/**
 * ClientManager.
 *
 * @file AuthRoutes.php
 * @project ClientManager
 *
 * @author Wayne Brummer
 */

/**
 * ClientManager.
 *
 * @file AuthRoutes.php
 * @project ClientManager
 *
 * @author Wayne Brummer
 */

namespace App\Services;

use Route;

class AuthRoutes
{
    /**
     * Routes containing User Registration / Login And Password Reset.
     */
    public static function UserRoutes()
    {
        Route::group(['prefix' => 'user'], function () {
            Route::name('user.')->group(function () {
                //Register section
                Route::get('/register', 'UserAuth\RegisterController@showRegistrationForm')
                    ->name('register');
                Route::post('/register', 'UserAuth\RegisterController@register')
                    ->name('register');

                //Login Section
                Route::get('/login', 'UserAuth\LoginController@showLoginForm')
                    ->name('login');
                Route::post('/login', 'UserAuth\LoginController@login')
                    ->name('login');
                Route::post('logout', 'UserAuth\LoginController@handleLogout')
                    ->name('logout');

                Route::get('forgot', 'UserAuth\ForgotPasswordController@showForgot')
                    ->name('password.request');
                //                    Route::get('reset/{guid}', 'UserAuth\ResetPasswordController@showReset');

                Route::middleware('user')->group(function () {
                    Route::get('home', 'User\PageController@index')
                        ->name('home');

                    Route::get('companies', 'User\CompaniesController@index')
                        ->name('companies.index');
                    Route::get('companies/link/{company_id}', 'User\CompaniesController@removeLink')
                        ->name('user_company.remove');
                    Route::get('companies/remove/{company_id}', 'User\CompaniesController@createLink')
                        ->name('user_company.create');
                });
            });
        });
    }

    public static function AdminRoutes()
    {
        Route::group(['prefix' => 'admin'], function () {
            Route::name('admin.')->group(function () {
                //Login Section
                Route::get('/login', 'AdminAuth\LoginController@showLoginForm')
                    ->name('login');
                Route::post('/login', 'AdminAuth\LoginController@login')
                    ->name('login');
                Route::post('logout', 'AdminAuth\LoginController@handleLogout')
                    ->name('logout');

                Route::middleware('admin')->group(function () {
                    Route::get('home', 'Admin\PageController@index')
                        ->name('home');

                    Route::resource('users', 'Admin\UserController');

                    Route::post('users', 'Admin\UserController@index')->name('users.index');
                    Route::get('companies', 'Admin\CompaniesController@index')->name('companies.index');
//                    Route::get('companies/edit', 'Admin\CompaniesController@edit')->name('companies.edit');
                });
            });
        });
    }
}
