<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use Auth;
use Illuminate\Support\Str;

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

        $id = Auth::id();
        $role = DB::table('users')->where('id', $id)->pluck('role');
        $isAdmin = Str::contains($role, 'admin');
        $users = DB::table('users')->get();

        return View::make('users', compact('isAdmin', 'users'));

    }
}
?>