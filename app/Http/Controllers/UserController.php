<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use App\UserRole;
use App\Branch;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user_roles'] = UserRole::all();
        $data['branches'] = Branch::all();
        $data['users'] = User::paginate(10);
        return view('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['user_roles'] = UserRole::all();
        $data['branches'] = Branch::all();
        return view('user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required',
            'email'         => 'required',
            'user_role'     => 'required',
            'password'      => 'required',
            'branch_id'
        ]);

        $user = new User;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->user_role = $request['user_role'];
        $user->password = $request['password'];
        $user->branch_id = $request['branch_id'];
        $user->save();

        return redirect('/user')->with('success', 'User successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function showlogin()
    {
        return view('user.login');
    }

    public function showregister()
    {
        return view('user.register');
    }

    public function login(request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']]))
        {
            if(Session::has('oldUrl'))
            {
                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
                return redirect($oldUrl);
            }
            if(Auth::User()->is_admin == 1)
            {
                return redirect()->route('home');
            }
            return redirect()->route('home');
        }
        
        return back()->with('status', 'Wrong Credentials!');
    }
}
