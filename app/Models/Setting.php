<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['website_name', 'site_logo','dashboard_logo','favicon'];
}
