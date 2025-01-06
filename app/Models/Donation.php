<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'donations';

    // Kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'campaign_id',
        'amount',
    ];

    // Relasi ke tabel Campaign (Assuming a Campaign model exists)
    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'campaign_id');
    }
}