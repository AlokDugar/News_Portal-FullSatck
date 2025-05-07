<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoGallery extends Model
{
    protected $fillable=[
        'id',
        'title',
        'url',
        'status'
    ];
}
