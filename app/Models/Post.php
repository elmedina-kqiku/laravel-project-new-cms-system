<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        //EACH POST IS GOING TO HAVE A USER
        return $this->belongsTo(User::class);

    }

    //ONLY USE THIS WHEN YOU WANT TO MODIFY THE DATA BEFORE GETS TO THE DATA BASE
//    public function setPostImageAttribute($value)
//    {
//        $this->attributes['post_image'] = asset($value);
//    }

    public function getPostImageAttribute($value)
    {
        return asset($value);
    }


}
