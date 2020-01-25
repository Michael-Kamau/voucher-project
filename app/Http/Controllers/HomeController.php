<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Role;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        $role=Role::find(Auth::user()->roles());

//        dd('welcome');

        return redirect('/user');

        if(Auth::user()->roles('user')){


        }else{
            return view('user');
        }

    }


    public function user()
    {
        return view('vueMain');
    }
}
