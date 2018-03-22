<?php
/**
 * ClientManager
 *
 * @file UserService.php
 * @project ClientManager
 * @author Wayne Brummer
 */

    /**
     * ClientManager
     *
     * @file UserService.php
     * @project ClientManager
     * @author Wayne Brummer
     */

    namespace App\Services\Admin;


    use App\Services\Search;
    use App\User;
    use Auth;

    class UserService
    {

        /**
         * List the current users
         *
         * @return mixed
         */
        public function listRecords($request)
        {
            return (new User)
                ->where(function ($query) use ($request) {
                    if ($request->has('query')) {
                        Search::buildQuery($query, $request->get('query', ''), [
                            'users.id',
                            'users.name',
//                            'users.last_name',
                            'users.id_number',
                            'users.email',
                            'users.contact',
                            'users.address',
                        ]);
                    }
                })
                ->orderBy('created_at', 'desc')
//                ->paginate($request->limit);
                ->paginate(15);
        }

        /**
         * Does the full indert into User table.
         *
         * @param $request
         */
        public function insertDB($request)
        {
            User::create($request->all());
        }

        public function getRecord($id = 0)
        {

            // get record from db
//            $record_db = DB::table('admin')
//                ->where('id', '=', $id)
//                ->first();
//
//            // get record from db
//            $record = !empty($record_db)
//                ? $record_db
//                : Admin::getFields('admin');
//
//            return $record;

        }


        /**
         * Allows Admin ot login as user.
         *
         * @param int $id
         * @return \Illuminate\Http\RedirectResponse
         */
        public function login($id = 0)
        {

            Auth::guard('user')->loginUsingId($id);

            return redirect()->to('user');

        }

        public function getSummary($user)
        {

            if($user) {

                return view('admin.user-summary', $user);

            } else {

                return 'No user found!';

            }
        }
    }