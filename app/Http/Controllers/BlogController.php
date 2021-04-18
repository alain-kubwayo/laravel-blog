<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function __constructor(){
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }
    public function index(){
        // $blogs = Blog::get();
        $blogs = Blog::with('user', 'likes')->paginate(20);
        return view('blogs.index', compact('blogs'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'body'=>'required'
        ]);

        $request->user()->blogs()->create($request->only('body'));

        return back();
    }

    public function destroy(Blog $blog){
        // authorize this action
        $this->authorize('delete', $blog);
        $blog->delete();
        return back();
    }

    public function show(Blog $blog){
        return view('blogs.show', compact('blog'));
    }


}
