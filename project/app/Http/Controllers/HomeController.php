<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use Auth;
use PDF;
use Illuminate\Support\Str;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\User;


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
        $users = DB::select('select * from users');

        $id = Auth::id();
        $role = DB::table('users')->where('id', $id)->pluck('role');
        $isAdmin = Str::contains($role, 'admin');

        return View::make('home', compact('isAdmin', 'users'));
    }

    public function showUsers()
    {

        $users = DB::table('users')->get();

        $id = Auth::id();
        $role = DB::table('users')->where('id', $id)->pluck('role');
        $isAdmin = Str::contains($role, 'admin');

        return View::make('users', compact('isAdmin', 'users'));
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function deleteUser ($id){
        $user = User::find($id);    
        $user->delete();

        $users = DB::table('users')->get();

        $id = Auth::id();
        $role = DB::table('users')->where('id', $id)->pluck('role');
        $isAdmin = Str::contains($role, 'admin');

        return View::make('users', compact('isAdmin', 'users'));
    }

    
}
