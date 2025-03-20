<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'content',
        'image',
    ];


    public function comments()
    {
        return $this->hasMany(Comment::class, 'blog_id');
    }

    protected $appends = ['comments_count','comments'];

    public function getCommentsCountAttribute()
    {
        return $this->comments()->count();
    }

    public function getCommentsAttribute()
    {
        return $this->comments()->get()->map(function ($comment) {
            return [
                'id' => $comment->id,
                'user' => $comment->user->name,
                'comment' => $comment->comment,
            ];
        });
    }
}
