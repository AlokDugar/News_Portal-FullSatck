<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AdvertisementType extends Model
{
    protected $fillable=[
        'id',
        'type',
    ];
    public function advertisements():HasMany
    {
        return $this->hasMany(Advertisement::class, 'type_id');
    }
}
