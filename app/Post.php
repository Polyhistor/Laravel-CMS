<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{

    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo('App\User');
    }


    // mutator, the convention is camelcase
    // public function setPostImageAttribute($value)
    // {
    //     $this->attributes['post_image'] = asset($value);
    // }

    // accessor
    public function getPostImageAttribute($value)
    {
        return asset('/storage/' . $value);
    }
}
