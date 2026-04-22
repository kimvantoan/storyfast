<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = [
        'story_id', 'title', 'content', 'order_index', 'views', 'status', 'is_approved'
    ];

    public function story()
    {
        return $this->belongsTo(Story::class);
    }
}
