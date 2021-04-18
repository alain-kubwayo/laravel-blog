<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserBlogController extends Controller
{
    public function index(User $user){
        $blogs = $user->blogs()->with(['user', 'likes'])->paginate(20);
        return view('users.blogs.index', compact('user', 'blogs'));
    }
}
