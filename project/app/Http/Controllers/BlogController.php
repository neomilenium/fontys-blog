<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $id = Auth::id();
        $blogs = DB::table('blogs')->where('user_id', '=', $id)->orderBy('created_at', 'desc')->get(); 

        return View::make('blog')->with('blogs', $blogs);
    }

    public function newBlog()
    {
        $id = Auth::id();
        $user = DB::table('users')->where('id', $id)->first();

        return View::make('newBlog')->with('user', $user);
    }

    public function create(Request $request)
    {
        $blog = new Blog;

        $id = Auth::id();
        $user = DB::table('users')->where('id', $id)->first();
        $name = $user->name;

        $title = $request->title;
        $text = $request->text;

        if ($request->hasFile('blogPicture')) {
            $timestamp = now();
            $request->file('blogPicture')->storeAs('/public/blogs/' . $id, $timestamp . '.png');
            $url = "http://localhost:8000/storage/blogs/$id/$timestamp.png";
            $blog->img_url = $url;
        }

        $blog->user_id = $id;
        $blog->user_name = $name;
        $blog->title = $title;
        $blog->text = $text;

        $blog->save();
 
        $blogs = DB::table('blogs')->where('user_id', '=', $id) ->orderBy('created_at', 'desc') ->get(); 
    
        return View::make('blog')->with('blogs', $blogs);
    }


}
