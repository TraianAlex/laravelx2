<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = ['title', 'body'];

    public function user()
    {
    	return $this->belongsTo(\App\User::class);
    }

    public function tags()
    {
    	return $this->belongsToMany(\App\Tag::class);
    }
}
