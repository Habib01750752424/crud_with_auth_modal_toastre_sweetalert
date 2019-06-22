<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;
use DB;

class PostController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        'title' => 'required|unique:posts|min:8|max:100',
            'description' => 'required',
            'tag' => 'required',
            'author' => 'required|min:4|max:50',
        ]);

        $post = new Post;

        $post->title        = $request->title;
        $post->author       = $request->author;
        $post->tag          = $request->tag;
        $post->description  = $request->description;

        $post->save();

        if ($post->save()) {
            $notification = array(
                'message' => 'Post Added Successfully', 
                'alert-type' => 'success'
            );

            // Toastr::success('Post Successfully Added', 'Success', ["positionClass" => "toast-top-right"]);
            return Redirect()->back()->with($notification);
        } else {
            return Redirect()->back();
        }
        
    }

    public function AllPost()
    {
        // $users = App\Post::all(); nor
        $posts = Post::all();

        // echo "<pre>";
        // print_r($posts);
        // exit();
        return view('all_post')->with('post', $posts);
    }


    public function Delete($id)
    {
        $post = Post::find($id);
        $delete = $post->delete();

        if ($delete) {
            $notification = array(
                'message' => 'Post Deleted Successfully', 
                'alert-type' => 'warning'
            );

            // Toastr::success('Post Successfully Added', 'Success', ["positionClass" => "toast-top-right"]);
            return Redirect()->route('home')->with($notification);
        } else {
            return Redirect()->back();
        }
        //return "delete";
    }

    public function Edit($id)
    {
        $post = Post::find($id);
        return view('edit',compact('post'));
    }

    public function Update(Request $request,$id)
    {
        $this->validate($request, [
        'title' => 'required|unique:posts|min:8|max:100',
            'description' => 'required',
            'tag' => 'required',
            'author' => 'required|min:4|max:50',
        ]);

        $post = Post::find($id);

        $post->title        = $request->title;
        $post->author       = $request->author;
        $post->tag          = $request->tag;
        $post->description  = $request->description;

        $update = $post->save();

        if ($update) {
            $notification = array(
                'message' => 'Post Updated Successfully', 
                'alert-type' => 'success'
            );

            // Toastr::success('Post Successfully Added', 'Success', ["positionClass" => "toast-top-right"]);
            return Redirect()->route('home')->with($notification);
        } else {
            return Redirect()->back();
        }
    }

    public function Detail($id)
    {
        $post = Post::find($id);
         // echo "<pre>";
         // print_r($post);
         // exit();
        return view('detail',compact('post'));
    }

    public function News()
    {
        return view('news_add');
    }

    public function InsertNews(Request $request)
    {
            $this->validate($request, [
            'title' => 'required|unique:posts|min:8|max:100',
            'details' => 'required',
            // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image' => 'required',
            'author' => 'required|min:4|max:50',
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['details'] = $request->details;
        $data['author'] = $request->author;

        $image = $request->image;  
        if($image)
        {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/post/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if($success) {
                $data['image'] = $image_url;
                $news = DB::table('newss')->insert($data);
                if($news) {
                    $notification = array(
                    'message' => 'News Added Successfully', 
                    'alert-type' => 'info'
                    );
                    return Redirect()->route('news.add')->with($notification);
                }
            } else {
                return Redirect()->back();
            }
        } else {
            return Redirect()->back();
        }
    }

    public function AllNews()
    {
        $news = DB::table('newss')->get();
        return view('all_news')->with('news', $news);
    }
}

