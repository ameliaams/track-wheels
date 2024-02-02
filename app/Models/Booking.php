<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'jenis_kendaraan',
        'tanggal',
        'sopir',
        'persetujuan',
    ];

    protected $casts = [
        'persetujuan' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
