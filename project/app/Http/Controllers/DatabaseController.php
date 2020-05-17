<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use View;

class DatabaseController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
    }


    public function getUserHome()
    {
        $id = Auth::id();
        $user = DB::table('users')->where('id', $id)->first();

        return View::make('home')->with('user', $user);
    }

    public function getUserProfile()
    {
        $id = Auth::id();
        $user = DB::table('users')->where('id', $id)->first();

        return View::make('profile')->with('user', $user);
    }

    public function getUserProfileToEdit()
    {
        $id = Auth::id();
        $user = DB::table('users')->where('id', $id)->first();

        return View::make('profileEdit')->with('user', $user);
    }

    public function save(Request $request)
    {
        $id = Auth::id();
        $name = $request->name;
        DB::table('users')->where('id', $id)->update(['name' => $name]);
        $user = DB::table('users')->where('id', $id)->first();

        return View::make('profile')->with('user', $user);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
