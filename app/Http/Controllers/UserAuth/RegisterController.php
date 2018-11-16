<?php
/**
 * ClientManager.
 *
 * @file RegisterController.php
 * @project ClientManager
 *
 * @author Wayne Brummer <wayne@bru-tech.co.za>
 *
 * @category User Auths
 *
 * @license Wayne Brummer BruTech
 */

namespace App\Http\Controllers\UserAuth;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Request;

class RegisterController extends Controller
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/user/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param Request $request
     *
     * @throws \Illuminate\Validation\ValidationException
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request)->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
          ?: redirect($this->redirectPath());
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.user.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param $request
     *
     * @throws \Illuminate\Validation\ValidationException
     *
     * @return array
     */
    protected function validator($request)
    {
        return $this->validate($request, [
            'name'      => 'required|string|max:255',
            'address'   => 'required|string|max:255',
            'age'       => 'required|string|max:255',
            'contact'   => 'required|string|max:255',
            'id_number' => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'      => $data['name'],
            'address'   => $data['address'],
            'age'       => $data['age'],
            'contact'   => $data['contact'],
            'id_number' => $data['id_number'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
        ]);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
