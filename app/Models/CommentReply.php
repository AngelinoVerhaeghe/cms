<?php

namespace App\Models;

use App\Models\User;
use App\Models\PostComment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommentReply extends Model
{
    use HasFactory;

    protected $fillable = ['comment_id', 'user_id', 'reply', 'is_active'];

    public function comment()
    {
        return $this->belongsTo(PostComment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
