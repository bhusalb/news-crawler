<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'url',
        'image',
        'intro',
        'source',
        'category_id'
    ];

    public $appends = ['image_link'];

    public function getImageLinkAttribute()
    {
        return map_storage_path_to_link($this->image);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
