<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',
        'status',
        'amount',
    ];
    const STATUS_PENDING = 'NOT PAID YET';
    const STATUS_PAID = 'PAID';
    const STATUS_FAILED = 'FAILED';

    // Relationship with User model if needed
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Campaign model if needed
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
    // File: /v:/tubes/tubes/app/Models/Campaign.php
    
    
    // Helper method to check if payment is paid
    public function isPaid()
    {
        return $this->status === self::STATUS_PAID;
    }
}