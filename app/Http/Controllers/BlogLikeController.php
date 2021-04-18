<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Mail;
use App\Mail\BlogLiked;

class BlogLikeController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function store(Request $request, Blog $blog){
        if($blog->likedBy($request->user())){
            return response(null,409);
        }
        $blog->likes()->create([
            'user_id'=>$request->user()->id,
        ]);

        if(!$blog->likes()->onlyTrashed()->where('user_id', $request->user()->id)->count()){
            Mail::to($blog->user)->send(new BlogLiked(auth()->user(), $blog));
        }

        return back();
    }

    public function destroy(Request $request, Blog $blog){
        $request->user()->likes()->where('blog_id', $blog->id)->delete();
        return back();
    }
}
