<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodDonation extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'food_donations';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'food_name',
        'food_description',
        'donor_name',
        'phone_number',
        'city',
        'subdistrict',
        'address',
    ];
}