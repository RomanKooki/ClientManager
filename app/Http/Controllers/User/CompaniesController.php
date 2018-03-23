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
         * @return \Illuminate\Http\Response
         */
        public function index(Request $request)
        {

            $records = (new Company)->get();

            return view('user.companies.index', [
                'title' => 'Company Manager',
                'records' => $records,
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
         * Controller point for removeing the link between the user and the company.
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
