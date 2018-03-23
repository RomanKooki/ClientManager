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
 * @file CompaniesController.php
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
         * @return \Illuminate\Http\Response
         */
        public function index()
        {

            return view('admin.companies.index', [
                'title' => 'Company Manager',
            ])->with('i', (request()->input('page', 1) - 1) * 5);

        }
    }
