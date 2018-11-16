<?php
/**
 * ClientManager.
 *
 * @category PHP
 *
 * @author Wayne Brummer <wayne@bru-tech.co.za>
 * @file CompaniesContraller.php
 * @project ClientManager
 *
 * @license WayneBrummer BruTech
 */

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Http\Controllers\Controller;

/**
 * CompaniesController
 * Best possible solutions.
 */
class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return $this|\Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        if (request()->wantsJson()) {
            return Company::all();
        }

        return view('admin.companies.index', [
            'title' => 'Company Manager',
        ])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

//    /**
//     * Display a edit page of the resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function edit()
//    {
//        return view('admin.companies.edit', [
//            'title' => 'Company Edit',
//        ]);
//    }
}
