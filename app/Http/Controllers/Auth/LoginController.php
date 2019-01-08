<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    // public function login()
    // {
    //     $this->validate($request, [
    //         $this->username() => 'required|string',
    //         'password' => 'nullable|string',
    //     ]);
    //
    //     // database user is trying without password
    //     $credentials = ['email' => $request->input('email')];
    //     $validator = Validator::make($credentials, [
    //         'email'    => 'required|email|exists:users,email',
    //     ]);
    //
    //     $result = $this->attemptLogin($request);
    //     if ($result instanceof RedirectResponse) {
    //         return $result;
    //     } elseif ($result === true) {
    //         return $this->sendLoginResponse($request);
    //     }
    //
    //     return $this->sendFailedLoginResponse($request);
    //
    // }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return bool|\Illuminate\Contracts\Auth\Authenticatable|\Illuminate\Http\Response
     */
    public function doLogin(Request $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        $validator = Validator::make($credentials, [
            'email'    => 'email',
            'password' => 'required'
        ]);
        if ($validator->passes()) {
            if (Auth::attempt($credentials)) {
                return redirect()->route('werknemers.index');
            } else {
                return redirect()->route('login');
            }
        } else {
            return redirect()->route('login')->with('msg', 'Invalid credentials');
        }
        return false;
    }

    /**
     * Attempt to log the user into application using username as an email.
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    protected function attemptLoginEmail(Request $request)
    {
        return $this->guard()->attempt(
            ['email' => $request->input('email'), 'password' => $request->input('password')],
            $request->filled('remember'));
    }

    public function showLoginForm()
    {
        return view('login');
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
     protected function redirectTo(){
         $role = 'admin';//Auth::user()->role->name;

         switch ($role) {
        case 'admin':
                return '/';
            break;
        case 'Employee':
                return '/projects';
            break;
        // default:
                // return route('login');
            // break;
        }
    }

    public function doLogout()
    {
        Auth::logout();// redirect the user to the login screen
        return redirect()->route('login'); // log the user out of our application
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }
}
