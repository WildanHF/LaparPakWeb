<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'goal_amount',
        'current_amount', // Ensure this attribute is fillable
    ];

    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_INACTIVE = 'INACTIVE';
    const STATUS_COMPLETED = 'COMPLETED';

    // Relationship with Payment model
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    // Helper method to check if campaign is active
    public function isActive()
    {
        return $this->status === self::STATUS_ACTIVE;
    }
}