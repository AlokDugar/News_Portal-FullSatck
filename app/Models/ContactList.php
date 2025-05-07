<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactList extends Model
{
    protected $fillable=[
        'id',
        'name',
        'email',
        'phone',
        'subject',
        'message'
    ];
}
