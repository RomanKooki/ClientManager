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
                    Route::get('/register', 'UserAuth\RegisterController@showRegistrationForm');
                    Route::post('/register', 'UserAuth\RegisterController@register');

                    //Login Section
                    Route::get('/login', 'UserAuth\LoginController@showLoginForm');
                    Route::post('/login', 'UserAuth\LoginController@login');
                    Route::get('logout', 'MemberAuth\AuthController@handleLogout');

                    Route::get('forgot', 'MemberAuth\AuthController@showForgot');
                    Route::get('reset/{guid}', 'MemberAuth\AuthController@showReset');
                });
            });
        }

        public static function AdminRoutes()
        {
            Route::get('admin/login','AdminAuth\AuthController@showLogin');
            Route::post('admin/login','AdminAuth\AuthController@handleLogin');
            Route::get('admin/logout','AdminAuth\AuthController@handleLogout');
        }

    }