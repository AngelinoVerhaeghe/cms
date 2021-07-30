<?php

namespace App\Http\Controllers\Blog;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function show($slug)
    {
        $post = Post::with(['category', 'tags'])->where('slug', $slug)->first();
        return view('blog.show', compact('post'));
    }
}
