<?php
/**
 * ClientManager
 *
 * @file AuthRoutes.php
 * @project ClientManager
 * @author Wayne Brummer
 */

/**
 * ClientManager
 *
 * @file AuthRoutes.php
 * @project ClientManager
 * @author Wayne Brummer
 */

/**
 * ClientManager
 *
 * @file AuthRoutes.php
 * @project ClientManager
 * @author Wayne Brummer
 */

/**
 * ClientManager
 *
 * @file AuthRoutes.php
 * @project ClientManager
 * @author Wayne Brummer
 */

    /**
     * Created by PhpStorm.
     * User: wayne
     * Date: 2018/03/22
     * Time: 09:49
     */

    namespace App\Services;


    use Route;

    class AuthRoutes
    {


        /**
         * Routes containing User Registration / Login And Password Reset.
         *
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
                    });

                });
            });
        }

    }