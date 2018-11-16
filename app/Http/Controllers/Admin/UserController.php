<?php
/**
 * ClientManager.
 *
 * @file UserController.php
 * @project ClientManager
 *
 * @author Wayne Brummer
 */

/**
 * ClientManager.
 *
 * @file UserController.php
 * @project ClientManager
 *
 * @author Wayne Brummer <wayne@bru-tech.co.za>
 *
 * @category User Auths
 *
 * @license WayneBrummer BruTech
 */

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserPost;
use App\Http\Requests\UpdateUserPost;
use App\Services\Admin\UserCompanyService;
use App\Services\Admin\UserService;
use App\Services\Lookup;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $records = (new UserService())->listRecords($request);

        return view('admin.users.index', [
            'title'   => 'Administrator Manager',
            'records' => $records,
            'query'   => $request->get('query', ''),
        ])->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param User $user
     *
     * @return Response
     */
    public function create(User $user)
    {
        $company       = (new Lookup())->getLookup((new Company()), Lookup::COMPANY);
        $linkedCompany = (new UserCompanyService())->listLinkedCompanies();

        return view('admin.users.create', \compact('company', 'user', 'linkedCompany'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUserPost $request
     *
     * @return Response
     */
    public function store(CreateUserPost $request)
    {
        (new UserService())->insertDB($request);

        return redirect()->route('admin.users.index')
            ->with('success', 'Participant created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $user
     * @param Request   $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|Response|string
     */
    public function show(User $user, Request $request)
    {
        return (new UserService())->getSummary($user, $request->get('show', ''));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $company       = (new Lookup())->getLookup((new Company()), Lookup::COMPANY);
        $user          = (new User())->find($id);
        $linkedCompany = (new UserCompanyService())->listLinkedCompanies($id);

        return view('admin.users.edit', \compact('company', 'user', 'linkedCompany'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @param UpdateUserPost $request
     *
     * @return Response
     */
    public function update($id, UpdateUserPost $request)
    {
        (new UserService())->updateDB($id, $request);

        return redirect()->route('admin.users.index')
            ->with('success', 'User successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $user
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        $user->companies()->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User successfully deleted.');
    }
}
