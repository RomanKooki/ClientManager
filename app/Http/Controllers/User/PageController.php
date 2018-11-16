<?php
/**
 * ClientManager.
 *
 * @file PageController.php
 * @project ClientManager
 *
 * @author Wayne Brummer
 */

/**
 * ClientManager.
 *
 * @file PageController.php
 * @project ClientManager
 *
 * @author Wayne Brummer
 */

/**
 * ClientManager.
 *
 * @file PageController.php
 * @project ClientManager
 *
 * @author Wayne Brummer
 */

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('user');
    }

    /**
     * Show the application dashboard.
     * Landing Page for an user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records['companies'] = (new User())->companies()->get();

        return view('user.home', \compact('record'));
    }
}
