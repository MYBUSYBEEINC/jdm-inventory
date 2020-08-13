<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use User;
use App\Product;
use App\Order;
use Illuminate\Support\Carbon;

class MainController extends Controller
{
    function index()
    {
        return view('login');
    }

    function checklogin(Request $request)
    {
        $this->validate($request,[
            'email'         =>      'required|email',
            'password'      =>      'required|alphaNum|min:3',
        ]);

        $user_data = array(
            'email'         => $request->get('email'),
            'password'      => $request->get('password'),
        );

        if(Auth::attempt($user_data))
        {
            return redirect('dashboard');
        }
        else
        {
            return back()->with('error', 'Wrong Login Details');
        }
    }

    function successlogin()
    {
        $data['time'] = Carbon::now();
        $month = Carbon::now();
        $today = Carbon::now();
        $yesterday = Carbon::yesterday();
        $month->month;
        $today->day;
        $yesterday->day;

        
        $var1 = Order::where('status', '=', '1')->whereDay('created_at', '=', $today)->sum('total');
        $var2 = Order::where('status', '=', '1')->whereDay('created_at', '=', $yesterday)->sum('total');
        $percent1 = $var1 - $var2;
        $percent2 = $percent1 / $var2;
        $data['percent'] = $percent2 * 100;

        $data['jan'] = Order::whereMonth('created_at', '=', '01')->where('status', '=', '4')->sum('total');
        $data['feb'] = Order::whereMonth('created_at', '=', '02')->where('status', '=', '4')->sum('total');
        $data['mar'] = Order::whereMonth('created_at', '=', '03')->where('status', '=', '4')->sum('total');
        $data['apr'] = Order::whereMonth('created_at', '=', '04')->where('status', '=', '4')->sum('total');
        $data['may'] = Order::whereMonth('created_at', '=', '05')->where('status', '=', '4')->sum('total');
        $data['jun'] = Order::whereMonth('created_at', '=', '06')->where('status', '=', '4')->sum('total');
        $data['jul'] = Order::whereMonth('created_at', '=', '07')->where('status', '=', '4')->sum('total');
        $data['aug'] = Order::whereMonth('created_at', '=', '08')->where('status', '=', '4')->sum('total');
        $data['sep'] = Order::whereMonth('created_at', '=', '09')->where('status', '=', '4')->sum('total');
        $data['oct'] = Order::whereMonth('created_at', '=', '10')->where('status', '=', '4')->sum('total');
        $data['nov'] = Order::whereMonth('created_at', '=', '11')->where('status', '=', '4')->sum('total');
        $data['dec'] = Order::whereMonth('created_at', '=', '12')->where('status', '=', '4')->sum('total');
        $data['income'] = Order::where('status', '=', '4')->whereMonth('created_at', '=', $month)->sum('total');
        $data['today'] = Order::where('status', '=', '4')->whereDay('created_at', '=', $today)->sum('total');
        $data['yesterday'] = Order::where('status', '=', '4')->whereDay('created_at', '=', $yesterday)->sum('total');
        $data['nostock'] = Product::where('quantity', '=', '0')->count();
        $data['stock'] = Product::max('quantity');
        $data['quantity'] = Product::where('quantity', '<', '10')->count();
        $data['products'] = Product::count();
        return view('dashboard', $data);
    }

    function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
