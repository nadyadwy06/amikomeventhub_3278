<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Event extends Model
{
    //
    protected $fillable = [
    'organizer_id',
    'category_id', 
    'title',
    'description',
    'date',
    'location',
    'price',
    'stock',
    'poster_path'
    ];
    
    protected $casts = [ 
        'date' => 'datetime', 
        ]; 
    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function transactions() {
    return $this->hasMany(Transaction::class);
    }
    public function reviews() { return $this->hasMany(Review::class); }
    public function averageRating() { return round($this->reviews()->avg('rating'), 1) ?: 0; }
    public function organizer() { return $this->belongsTo(Organizer::class); }

    public function ticketTiers()
    {
        return $this->hasMany(TicketTier::class);
    }

    // Mengambil Tier yang sedang aktif saat ini
    public function getActiveTierAttribute()
    {
        $now = now();
        return $this->ticketTiers()
            ->where('start_date', '<=', $now)
            ->where('end_date', '>=', $now)
            ->where('quota', '>', 0)
            ->orderBy('price', 'asc')
            ->first();
    }
}
