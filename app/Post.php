<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function like($user = null)
    {
        $user = $user ?: auth()->user();

        return $this->likes()->attach($user);
    }

    public function likes()
    {
        return $this->morphToMany(User::class, 'likable')->withTimestamps();
    }
}
