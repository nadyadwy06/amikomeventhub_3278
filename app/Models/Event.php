<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'category_id',
        'date',
        'description',
        'price',
        'stock',
        'location',
        'poster_path',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}