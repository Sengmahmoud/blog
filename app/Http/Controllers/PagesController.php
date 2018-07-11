<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{


    public function posts()
    {
        $posts=Post::all();
        $cats=Category::all();
       return view('Content.posts',compact('posts','cats'));
    }
    public function post($id)
    {
        $post=Post::find($id);
        $cats=Category::all();
        return view('Content.post',compact('post','cats'));
    }
    public function store (Request $request)
    {
        $this->validate(request(),[
            'title'=>'required',
            'body'=>'required',
            'url'=>'image|mimes:jpg,jpeg,png,gif|max:2048'
            ]);
        $img_name=time().'.'.$request->url->getClientOriginalExtension();
        $post=new Post();
        $post->title=$request->title;
        $post->body=$request->body;
        $post->url=$img_name;
        $post->save();

        $request->url->move(public_path('upload'),$img_name);

        return redirect('/posts');

    }

    public function category($name)
    {
        $category=DB::table('categories')->where('name',$name)->value('id');
        $posts=DB::table('posts')->where('cat_id',$category)->get();
        $cats=Category::all();
        return view('Content.category',compact('posts','cats'));
    }
}
