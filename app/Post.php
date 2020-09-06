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

    // accessor
    public function getPostImageAttribute($value)
    {
        return asset('/storage/' . $value);
    }
}
