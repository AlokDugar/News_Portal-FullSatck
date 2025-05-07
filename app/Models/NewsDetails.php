<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class NewsDetails extends Model
{
    protected $fillable=[
        'id',
        'title',
        'image_path',
        'type_id',
        'author',
        'publisher',
        'state',
        'content'
    ];
    public function categories():BelongsToMany
    {
        return $this->belongsToMany(NewsCategory::class, 'news_category_news_details');
    }

    public function type():BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
}
