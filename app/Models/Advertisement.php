<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Advertisement extends Model
{
    protected $fillable=[
        'id',
        'type_id',
        'details',
        'status',
        'url'
    ];
    public function advertisementType():BelongsTo
    {
        return $this->belongsTo(AdvertisementType::class, 'type_id');
    }
}
