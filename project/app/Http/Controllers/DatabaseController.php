<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Support\Str;

class DatabaseController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        if (Auth::check()) {
            return redirect('/home');
        }
        return view('/start');
    }


    public function getUserHome()
    {
        $id = Auth::id();
        $user = DB::table('users')->where('id', $id)->first();

        $role = DB::table('users')->where('id', $id)->pluck('role');
        $isAdmin = Str::contains($role, 'admin');
       
        return View::make('home', compact('isAdmin', 'user'));
    }

    public function getUserProfile($id)
    {

        $user = DB::table('users')->where('id', $id)->first();
        $blogs = DB::table('blogs')->where('user_id', '=', $id)->orderBy('created_at', 'desc')->get();
        
        $url = "http://localhost:8000/storage/profilePicture.png";
        $exists = Storage::disk('public')->exists('profilePicture.png');
        if ($exists) {
            $pictureUploaded = true;
            $url = "http://localhost:8000/storage/$id/profilePicture.png";
        }

        $user_id = Auth::id();
        $role = DB::table('users')->where('id', $user_id)->pluck('role');
        $isAdmin = Str::contains($role, 'admin');
       
        return View::make('profile', compact('isAdmin', 'user', 'blogs', 'id', ));

    }

    public function getUserProfileToEdit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        $url = "http://localhost:8000/storage/profilePicture.png";
        $exists = Storage::disk('public')->exists('profilePicture.png');
        if ($exists) {
            $pictureUploaded = true;
            $url = "http://localhost:8000/storage/$id/profilePicture.png";
        }

        $user_id = Auth::id();
        $role = DB::table('users')->where('id', $user_id)->pluck('role');
        $isAdmin = Str::contains($role, 'admin');
       
        return View::make('profileEdit', compact('isAdmin', 'user', 'id'));

    }

    public function save(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        if ($request->hasFile('profilePicture')) {
            $request->file('profilePicture')->storeAs('public/'.$id, 'profilePicture.png');
        }
       
        DB::table('users')->where('id', $id)->update(['name' => $name]);
        $user = DB::table('users')->where('id', $id)->first();
        $blogs = DB::table('blogs')->where('user_id', '=', $id)->orderBy('created_at', 'desc')->get();

        $user_id = Auth::id();
        $role = DB::table('users')->where('id', $user_id)->pluck('role');
        $isAdmin = Str::contains($role, 'admin');
       
        return View::make('profile', compact('isAdmin', 'user', 'blogs', 'id', 'name'));

    }

    public function logout(Request $request)
    {
        $id = Auth::id();
        $request->session()->flush();
        $user = DB::table('users')->where('id', $id)->limit(1);
        $user->update(['remember_token' => null]);
        return redirect('/');
    }

}

