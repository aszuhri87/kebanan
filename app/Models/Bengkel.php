<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Bengkel extends Model
{
    use HasApiTokens;
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nama_bengkel',
        'nama_pemilik',
        'alamat',
        'nomor_hp',
        'longitude',
        'latitude',
        'foto_bengkel',
        'terima_tubles',
        'terima_non_tubles',
        'terima_panggilan',
        'terima_mobil',
        'terima_motor',
        'terima_kendaraan_berat',
    ];

    protected $casts = [
        'terima_tubles' => 'boolean',
        'terima_non_tubles' => 'boolean',
        'terima_panggilan' => 'boolean',
        'terima_mobil' => 'boolean',
        'terima_motor' => 'boolean',
        'terima_kendaraan_berat' => 'boolean',
    ];

    protected $dates = ['deleted_at'];
}
