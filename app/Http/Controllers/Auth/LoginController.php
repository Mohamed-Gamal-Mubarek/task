<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo()
    {
        // CASE ADMIN
        if (Auth()->user()->role == 1) {
            return route('admin.dashboard');
        }
        // ./CASE ADMIN

        // CASE PROVIDER
        elseif (Auth()->user()->role == 2) {
            return route('provider.dashboard');
        }
        // CASE PROVIDER
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        # code...
        $input = $request->all();
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(array('email' => $input['email'], 'password' => $input['password']))) {

            if(auth()->user()->role == 1){
                return redirect()->route('admin.dashboard');
            }
            elseif(auth()->user()->role == 2 ){
                return redirect()->route('provider.dashboard');
            }

        }else{
            echo "something error in here";
        }
    }
}
