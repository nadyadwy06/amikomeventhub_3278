<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Event;
use App\Models\User;

class Transaction extends Model
{
    protected $fillable = [
        'event_id', 
        'user_id', // Tambahkan ini jika transaksi milik user
        'order_id', 
        'customer_name', 
        'customer_email', 
        'customer_phone', 
        'total_price', 
        'status',
        'snap_token'
    ];

    // RELASI KE EVENT
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    // RELASI KE USER (Pisah fungsinya!)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}