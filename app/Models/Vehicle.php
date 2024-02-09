<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'kendaraan';
    protected $primaryKey = 'kendaraan_id';

    protected $fillable = [
        'plat_nomor',
        'jenis_kendaraan',
        'konsumsi_bbm',
        'jadwal_servis',
        'riwayat_pemakaian',
    ];
}
