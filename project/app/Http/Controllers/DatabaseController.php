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
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\FilesystemManager;

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
        
        $url = "http://localhost:8000/storage/profilePicture.png";
        $exists = Storage::disk('public')->exists('/storage/' . $id . '/profilePicture.jpg');
        if ($exists) {
            $pictureUploaded = true;
            $url = "http://localhost:8000/storage/'.$id.'/profilePicture.png";
        }

        $data = [
            'user'  => $user,
            'url' => $url,
        ];

        return View::make('profile')->with($data);
    }

    public function getUserProfileToEdit()
    {
        $id = Auth::id();
        $user = DB::table('users')->where('id', $id)->first();

        $url = "http://localhost:8000/storage/profilePicture.png";
        $exists = Storage::disk('public')->exists('/storage/' . $id . '/profilePicture.jpg');
        if ($exists) {
            $pictureUploaded = true;
            $url = "http://localhost:8000/storage/'.$id.'/profilePicture.png";
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
        $imageName = $name . '.jpg';
        $request->file('profilePicture')->storeAs($id, 'profilePicture.jpg');


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
