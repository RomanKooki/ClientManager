<?php
/**
 * ClientManager
 *
 * @file PageController.php
 * @project ClientManager
 * @author Wayne Brummer
 */

/**
 * ClientManager
 *
 * @file PageController.php
 * @project ClientManager
 * @author Wayne Brummer
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     * Landing Page for an admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }
}