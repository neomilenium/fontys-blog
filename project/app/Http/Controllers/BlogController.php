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
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use PDF;

class BlogController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $id = Auth::id();
        $role = DB::table('users')->where('id', $id)->pluck('role');
        $isAdmin = Str::contains($role, 'admin');

        if ($isAdmin) {
            $blogs = DB::table('blogs')->orderBy('created_at', 'desc')->get();
        } else {
            $blogs = DB::table('blogs')->where('user_id', '=', $id)->orderBy('created_at', 'desc')->get();
        }
       

     

        return View::make('blog', compact('isAdmin', 'blogs', 'id'));
    }

    public function newBlog()
    {
        $id = Auth::id();
        $user = DB::table('users')->where('id', $id)->first();

        $role = DB::table('users')->where('id', $id)->pluck('role');
        $isAdmin = Str::contains($role, 'admin');

        return View::make('newBlog', compact('isAdmin', 'user'));
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

            $img = Image::make($request->file('blogPicture')->getRealPath());
            /* insert watermark at bottom-right corner with 10px offset */
            $watermark = Image::make(public_path('storage/watermark.png'));
            $watermark->resize(50, 50);
            $img->insert($watermark, 'bottom-right', 5, 5);

            $img->save('storage/blogs/' . $id . '/' . $timestamp . '.png');
        }

        $blog->user_id = $id;
        $blog->user_name = $name;
        $blog->title = $title;
        $blog->text = $text;

        $blog->save();

        $blogs = DB::table('blogs')->where('user_id', '=', $id)->orderBy('created_at', 'desc')->get();

        $role = DB::table('users')->where('id', $id)->pluck('role');
        $isAdmin = Str::contains($role, 'admin');

        return View::make('blog', compact('isAdmin', 'blogs', 'id'));
    }

    public function showBlog($blog_id)
    {
        $blog = DB::table('blogs')->where('id', '=', $blog_id)->first();

        $id = Auth::id();
        $role = DB::table('users')->where('id', $id)->pluck('role');
        $isAdmin = Str::contains($role, 'admin');

        return View::make('blogDetail', compact('isAdmin', 'blog', 'id'));
    }

    public function exportPdf($blog_id)
    {
        $blog = DB::table('blogs')->where('id', '=', $blog_id)->first();
    

        $data = [
            'name' => $blog->user_name,
            'created_at' => $blog->created_at,
            'title' => $blog->title,
            'text' => $blog->text,
            'id' => $blog->user_id

        ];

        $pdf = PDF::loadView('blogAsPdf', $data);

        return $pdf->download('blog.pdf');
    }

    public function showPdf($blog_id)
    {
        $blog = DB::table('blogs')->where('id', '=', $blog_id)->first();

        $id = Auth::id();
        $role = DB::table('users')->where('id', $id)->pluck('role');
        $isAdmin = Str::contains($role, 'admin');

        return View::make('blogAsPdf', compact('isAdmin', 'blog'));
    }
}
