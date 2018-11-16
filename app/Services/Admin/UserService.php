<?php
/**
 * ClientManager
 *
 * @project ClientManager
 * @author Wayne Brummer <wayne@bru-tech.co.za>
 * @category User Auths
 * @license WayneBrummer BruTech
 */

namespace App\Services\Admin;

use App\Services\FileService;
use App\Services\Search;
use App\User;
use App\UserCompany;
use Auth;

class UserService
{

    /**
     * List the current users
     *
     * @param $request
     * @param User $user
     * @return mixed
     */
    public function listRecords($request, User $user)
    {
        return $user->where(function ($query) use ($request) {
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
        $input = $request->all();

        $data = [
          'name' => $input['name'],
          'address' => $input['address'],
          'id_number' => $input['id_number'],
          'contact' => $input['contact'],
          'age' => $input['age'],
          'is_active' => (isset($input['is_active'])) ? 1 : 0,
          'email' => $input['email'],
          'updated_at' => date('Y-m-d H:i:s'),
        ];

        if ($request->has('image_url')) {
            $data['image_url'] = FileService::uploadFile($request, 'image_url', 'users');
        }

        (new User)->where('id', $id)->update($data);

        $this->completeCompanyLinking($request, $id);
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

    /**
     * @param $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function getSummary($user)
    {
        if ($user) {
            return view('admin.user-summary', $user);
        } else {
            return 'No user found!';
        }
    }

    /**
     * Updated the user and does the linking
     *
     * @param $id
     * @param $request
     */
    public function updateDB($id, $request)
    {
        $input = $request->all();

        $data = [
          'name' => $input['name'],
          'address' => $input['address'],
          'id_number' => $input['id_number'],
          'contact' => $input['contact'],
          'age' => $input['age'],
          'is_active' => (isset($input['is_active'])) ? 1 : 0,
          'email' => $input['email'],
          'updated_at' => date('Y-m-d H:i:s'),
        ];

        if ($request->has('image_url')) {
            $data['image_url'] = FileService::uploadFile($request, 'image_url', 'users');
        }

        (new User)->where('id', $id)->update($data);

        $this->completeCompanyLinking($request, $id);
    }

    /**
     * Does the linking between user and the company
     *
     * @param $request
     * @param $id
     */
    private function completeCompanyLinking($request, $id)
    {
        if ($request->has('company_list')) {
            $this->removeLinking($id);

            if (is_array($request->get('company_list'))) {
                foreach ($request->get('company_list') as $item) {
                    $links = (new UserCompany);
                    $links->user_id = $id;
                    $links->company_id = $item;
                    $links->save();
                }
            }
        }
    }

    /**
     * Removes the links between companies and users.
     *
     * @param $userId
     */
    private function removeLinking($userId)
    {
        try {
            (new UserCompany)
              ->where('user_id', $userId)
              ->delete();
        } catch (\Exception $e) {
        }
    }
}
