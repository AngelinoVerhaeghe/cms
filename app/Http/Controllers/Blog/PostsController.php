<?php

namespace App\Http\Controllers\Blog;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Reply;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PostsController extends Controller
{
    public function show($slug)
    {
        $post = Post::with(['category', 'tags', 'user', 'comments'])->where('slug', $slug)->first();
        $relatedPosts = Post::where('category_id', $post->category->id)->where('slug', '!=', $slug)->take(4)->get();
        $comments = Comment::all();
        $replies = Reply::where('comment_id', $post->id)->get();
        return view('blog.show', compact('post', 'relatedPosts', 'replies'));
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
