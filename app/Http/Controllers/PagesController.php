<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        //? Take 4 from the latest created blog post and show them on homepage
        $recentPosts = Post::with(['category'])->latest('created_at', 'DESC')->take(4)->get();
        return view('index', compact('recentPosts'));
    }

    public function blogs()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $blogs = Post::all();
        return view('blogs', compact('blogs', 'categories', 'tags'));
    }
}
