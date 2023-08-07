<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        if(request('user')){
            $user = User::firstWhere('username', request('user'));
            $title = ' by ' . $user->name;
        }

        return view("blog", [
            "title" => "Seputar Demangharjo" . $title,
            "active" => "blog",
            "post" => Post::latest()->filter(request(['search', 'category', 'user']))->paginate(10)->withQueryString()
        ]);
    }

    public function show(Post $postingan){
        return view('post', [
            "title" => "Single Post",
            "active" => "blog",
            "post" => $postingan
        ]);
    }
}
