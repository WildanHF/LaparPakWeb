<?php

// app/Models/Profile.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak mengikuti konvensi penamaan Laravel
    protected $table = 'edit_profile';

    // Tentukan kolom yang boleh diisi
    protected $fillable = [
        'user_id',
        'phone_number',
        'profile_picture',
        'gender',
        'birth_date',
    ];

    // Tambahkan relasi ke tabel Users jika diperlukan
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}