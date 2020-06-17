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

        return View::make('home')->with('user', $user);
    }

    public function getUserProfile()
    {
        $id = Auth::id();
        $user = DB::table('users')->where('id', $id)->first();
        $blogs = DB::table('blogs')->where('user_id', '=', $id)->orderBy('created_at', 'desc')->get();
        
        $url = "http://localhost:8000/storage/profilePicture.png";
        $exists = Storage::disk('public')->exists('profilePicture.png');
        if ($exists) {
            $pictureUploaded = true;
            $url = "http://localhost:8000/storage/$id/profilePicture.png";
        }

        $data = [
            'user'  => $user,
            'blogs' => $blogs,
            'url' => $url,
        ];

        return View::make('profile')->with($data);
    }

    public function getUserProfileToEdit()
    {
        $id = Auth::id();
        $user = DB::table('users')->where('id', $id)->first();

        $url = "http://localhost:8000/storage/profilePicture.png";
        $exists = Storage::disk('public')->exists('profilePicture.png');
        if ($exists) {
            $pictureUploaded = true;
            $url = "http://localhost:8000/storage/$id/profilePicture.png";
        }

        $data = [
            'user'  => $user,
            'url' => $url,
        ];


        return View::make('profileEdit')->with($data);
    }

    public function save(Request $request)
    {
        $id = Auth::id();
        $name = $request->name;
        if ($request->hasFile('profilePicture')) {
            $request->file('profilePicture')->storeAs('/public/'.$id, 'profilePicture.png');
        }
       
        DB::table('users')->where('id', $id)->update(['name' => $name]);
        $user = DB::table('users')->where('id', $id)->first();
        $blogs = DB::table('blogs')->where('user_id', '=', $id)->orderBy('created_at', 'desc')->get();

        $url = "http://localhost:8000/storage/profilePicture.png";
        $exists = Storage::disk('public')->exists('profilePicture.png');
        if ($exists) {
            $pictureUploaded = true;
            $url = "http://localhost:8000/storage/$id/profilePicture.png";
        }

        $data = [
            'user'  => $user,
            'blogs' => $blogs,
            'url' => $url,
        ];

        return View::make('profile')->with($data);
    }

    public function logout(Request $request)
    {
        $id = Auth::id();
        $request->session()->flush();
        $user = DB::table('users')->where('id', $id)->limit(1);
        $user->update(['remember_token' => null]);
        return redirect('/');
    }

    public function showUsers(){

        $users = DB::table('users')->get();

        return View::make('users')->with('users', $users);

    }

}

