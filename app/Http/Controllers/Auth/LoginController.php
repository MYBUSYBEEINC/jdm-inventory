<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Session;
use App\User;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => 1])){
            $user = User::where('id', Auth::id())->first();
            session()->put('user_role', $user->user_role);
            session()->put('name', $user->name);

            $log_arr = [
                "user_name" => $user->first_name,
                "user_office" => $user->branch->branch_id,
                "activity"  => 'logged in.',
            ];
            \ActivityLog::add($log_arr);

            return redirect('/');
        } else {
            session()->flash('error', 'Invalid login credentials! or User has been Deactivated!');
            return redirect('/login');
        }
    }
}
