<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = ['title', 'slug', 'author', 'description', 'cover_image', 'status', 'views'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
