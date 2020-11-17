<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreatePost extends Model
{
    protected $fillable = [
        "title", "user_id", "description"
    ];
}
