<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class NewsCategory extends Model
{
    protected $fillable=[
        'id',
        'name',
        'status',
        'url'
    ];
    public function news(): BelongsToMany
    {
        return $this->belongsToMany(NewsDetails::class, 'news_category_news_details');
    }

}
