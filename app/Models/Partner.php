<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    // Pastikan fillable mencakup nama kolom yang baru saja Anda buat
    protected $fillable = ['name', 'logo', 'type'];
}