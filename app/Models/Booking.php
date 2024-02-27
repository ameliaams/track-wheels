<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';
    protected $primaryKey = 'booking_id';

    protected $fillable = [
        'nama',
        'jenis_kendaraan',
        'tanggal',
        'sopir',
        'persetujuan',
        'status',
    ];

    protected $casts = [
        'persetujuan' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $validator = validator($model->attributes, [
                'status' => ['required', Rule::in(['Pending', 'Accepted', 'Rejected'])],
            ]);

            if ($validator->fails()) {
                throw new \Illuminate\Validation\ValidationException($validator);
            }
        });
    }
}
