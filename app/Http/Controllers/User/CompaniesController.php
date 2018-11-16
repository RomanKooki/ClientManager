<?php
/**
 * ClientManager
 *
 * @file CompaniesController.php
 * @project ClientManager
 * @author Wayne Brummer <wayne@bru-tech.co.za>
 * @category UserAuths
 * @license WayneBrummer BruTech
 */

namespace App\Http\Controllers\User;

use App\Company;
use App\Http\Controllers\Controller;
use App\Services\Admin\UserService;
use App\User;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @param Request $request
   * @param Company $company
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request, Company $company)
  {
    return view('user.companies.index', [
      'title' => 'Company Manager',
      'records' => $company,
      'query' => $request->get('query'),
    ])->with('i', (request()->input('page', 1) - 1) * 5);
  }

  /**
   * Controller point for creating a link with user
   *
   * @return void
   */
  public function createLink()
  {
    redirect()
      ->to('/user/home')
      ->with('success', 'Company has been successfully linked.');
  }

  /**
   * Controller point for removing the link between the user and the company.
   *
   * @return void
   */
  public function removeLink()
  {
    redirect()
      ->to('/user/home')
      ->with('success', 'Company has been successfully linked.');
  }
}
