<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = [
        'user_id', 'title', 'slug', 'author', 'description', 'cover_image', 'status', 'views',
        'rating_score', 'rating_count', 'chapter_count', 'comment_count', 'review_count',
        'is_approved', 'is_published', 'is_draft'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
