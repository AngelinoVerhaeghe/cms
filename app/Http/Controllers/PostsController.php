<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;

class PostsController extends Controller
{

    //? Constructor for applying middelware to routes with ->only([])

    public function __construct()
    {
        //? VerifyCategoriesCount is a middleware that we created,
        //? so user cant 'create' or 'store' posts without any categories in database yet!
        //? The create post button wont work and redirect user back to the create category page.
        //? Where to create a category.
        $this->middleware('VerifyCategoriesCount')->only(['create', 'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        // Upload image to storage
        $image = $request->image->store('posts');

        // Create the post
        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'description' => $request->description,
            'content' => $request->content,
            'image' => $image,
            'published_at' => $request->published_at,
            'category_id' => $request->category_id
        ]);

        // Set the post tags
        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }

        // Flash message with successfull
        session()->flash('success', 'Post created successfully.');

        // Redirect user
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //? Just return create blade with value of $post->id, so we dont need to make a separate edit.blade.php page.
        return view('admin.posts.create')->with('post', $post)->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only(['title', 'description', 'content', 'published_at']);

        // Check if new image
        if ($request->hasFile('image')) {

            // Upload it
            $image = $request->image->store('posts');
            // Delete old one
            $post->deleteImage();
;
            $data['image'] = $image;

        }

        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }

        // Update attributes
        $data['slug'] = Str::slug($request->title, '-');
        $post->update($data);

        // Flash message
        session()->flash('success', 'Post updated successfully.');

        // Redirect user
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //? Get post where the id is the id, give first record if not show a 404
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        if ($post->trashed()) {

            //? Delete the image also in the storage folder after deleting it from DB -> function in Post model
            $post->deleteImage();
            $post->forceDelete();

        } else {

             $post->delete();
             session()->flash('success', 'Post has been moved to trashed posts.');
        }

        // Flash message with successfull
        session()->flash('success', 'Post deleted successfully.');

        // Redirect user
        return redirect(route('posts.index'));

    }

    /**
     * Display a list of all trashed posts
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Restore a trashed post back to the posts list
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {

        //? Get post where the id is the id, give first record if not show a 404
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        $post->restore();

        session()->flash('success', 'Post restored successfully.');

        return redirect()->back();

    }


}
