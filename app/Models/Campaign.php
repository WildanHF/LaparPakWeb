<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'campaigns';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'name',
        'description',
        'goal',
    ];

    // Relasi ke tabel Donations
    public function donations()
    {
        return $this->hasMany(Donation::class, 'campaign_id');
    }
}
