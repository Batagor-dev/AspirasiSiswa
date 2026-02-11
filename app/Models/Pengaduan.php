<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Pengaduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'judul',
        'isi',
        'status',
        'foto',
        'jawaban',
    ];

    /**
     * Relasi ke User (yang membuat pengaduan)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
