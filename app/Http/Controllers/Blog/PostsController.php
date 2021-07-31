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
        $relatedPosts = Post::where('category_id', $post->category->id)->where('slug', '!=', $slug)->take(4)->get();
        return view('blog.show', compact('post', 'relatedPosts'));
    }

    public function showBlogsOnCategory(Category $category)
    {

        $categories = Category::all();
        $tags = Tag::all();
        return view('blog.category', compact('categories', 'tags'))
            ->with('category', $category)
            ->with('posts', $category->posts()->searched()->paginate(8));
    }

    public function showBlogsOnTag(Tag $tag)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('blog.tag', compact('categories', 'tags'))
        ->with('tag', $tag)
        ->with('posts', $tag->posts()->searched()->paginate(8));
    }
}
