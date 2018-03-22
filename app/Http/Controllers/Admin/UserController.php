<?php
/**
 * ClientManager
 *
 * @file UserController.php
 * @project ClientManager
 * @author Wayne Brummer
 */

    /**
     * ClientManager
     *
     * @file UserProfileController.php
     * @project ClientManager
     * @author Wayne Brummer
     */

    namespace App\Http\Controllers\Admin;

    use App\Company;
    use App\Http\Controllers\Controller;
    use App\Services\Admin\UserService;
    use App\Services\Lookup;
    use App\User;
    use Illuminate\Http\Request;

    class UserController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @param Request $request
         * @return \Illuminate\Http\Response
         */
        public function index(Request $request)
        {
            $records = (new UserService)->listRecords($request);

            return view('admin.users.index', [
                'title' => 'Administrator Manager',
                'records' => $records,
                'query' => $request->get('query', ''),
            ])->with('i', (request()->input('page', 1) - 1) * 5);

        }

        /**
         * Show the form for creating a new resource.
         *
         * @param User $user
         * @return \Illuminate\Http\Response
         */
        public function create(User $user)
        {
            $company = (new Lookup)->getLookup((new Company) , Lookup::COMPANY);
            return view('admin.users.create', compact('company' , 'user') );
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {

            (new UserService)->insertDB($request);

            return redirect()->route('admin.participant.index')
                ->with('success', 'Participant created successfully');
        }

        /**
         * Display the specified resource.
         *
         * @param  \App\User $user
         * @param Request $request
         * @return \Illuminate\Http\Response
         */
        public function show(User $user, Request $request)
        {
            return (new UserService)->getSummary($user, $request->get('show', ''));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\User $users
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $company = (new Lookup)->getLookup((new Company) , Lookup::COMPANY);
            $user = User::find($id);
            return view('admin.users.edit', compact('company' , 'user') );
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @param  \App\User $user
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, User $user)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\User $user
         * @return \Illuminate\Http\Response
         */
        public function destroy(User $user)
        {
            //
        }
    }
