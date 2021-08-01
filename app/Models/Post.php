<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'published_at'
    ];

    protected $fillable = ['title', 'slug', 'description', 'content', 'image', 'published_at', 'category_id', 'user_id'];

    /**
     * Delete post image from storage
     *
     * @return void
     */
    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     *
     * check if post has tag
     *
     * @return bool
     */
    public function hasTag($tagId)
    {
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }

    //? Get only the published posts from database
    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now());
    }

    public function scopeSearched($query)
    {
        //? Get the value of search
        $search = request()->query('search');



        if (!$search) {
            return $query->published();
        }

        return $query->published()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->orWhere('content', 'LIKE', "%{$search}%");
    }


}
