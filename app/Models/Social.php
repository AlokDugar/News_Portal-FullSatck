<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = ['facebook', 'instagram', 'linkedin', 'twitter','youtube'];
    protected $hidden= ['created_at','updated_at'];
}
