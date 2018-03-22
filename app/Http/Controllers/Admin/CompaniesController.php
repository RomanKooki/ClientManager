<?php
/**
 * ClientManager
 *
 * @file CompaniesController.php
 * @project ClientManager
 * @author Wayne Brummer
 */

/**
 * ClientManager
 *
 * @file CompanyController.php
 * @project ClientManager
 * @author Wayne Brummer
 */


    namespace App\Http\Controllers\Admin;

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
         * @return \Illuminate\Http\Response
         */
        public function index(Request $request)
        {
            $records = (new CompanyService)->listRecords($request);

            return view('admin/company', [
                'title' => 'Company Manager',
                'records' => $records,
                'query' => $request->get('query', ''),
            ])->with('i', (request()->input('page', 1) - 1) * 5);

        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            //
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            //
        }

        /**
         * Display the specified resource.
         *
         * @param  \App\User $user
         * @return \Illuminate\Http\Response
         */
        public function show(User $user)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\User $user
         * @return \Illuminate\Http\Response
         */
        public function edit(User $user)
        {
            //
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
