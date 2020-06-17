<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;

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
    public function index(){
        $users = DB::select('select * from users');
        return view('home',['users'=>$users]);
    }

    public function showUsers(){

        $users = DB::table('users')->get();

        return View::make('users')->with('users', $users);

    }
}
?>