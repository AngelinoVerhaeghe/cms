<?php

namespace App\Http\Controllers\Blog;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class PostsController extends Controller
{
    public function show($slug)
    {
        $post = Post::with(['category', 'tags'])->where('slug', $slug)->first();
        return view('blog.show', compact('post'));
    }

    public function showBlogsOnCategory(Category $category)
    {
        $search = request()->query('search');

        if ($search){
            $posts = $category->posts()->where('title', 'LIKE', "%{$search}%")->paginate(8);
        } else {
            $posts = $category->posts()->paginate(8);
        }

        $categories = Category::all();
        $tags = Tag::all();
        return view('blog.category', compact('categories', 'tags'))
            ->with('category', $category)
            ->with('posts', $posts);
    }

    public function showBlogsOnTag(Tag $tag)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('blog.tag', compact('categories', 'tags'))
        ->with('tag', $tag)
        ->with('posts', $tag->posts()->paginate(8));
    }
}
