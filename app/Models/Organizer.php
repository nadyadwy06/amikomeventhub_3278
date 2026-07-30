<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'slug', 'description', 'status'];

    public function user() { return $this->belongsTo(User::class); }
    public function events() { return $this->hasMany(Event::class); }
    public function reviews() { return $this->hasManyThrough(Review::class, Event::class); }
    public function averageRating() { return round($this->reviews()->avg('rating'), 1) ?: 0; }
}
