<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama_pasien',
        'tempat_lahir',
        'tanggal_lahir',
        'gender',
        'email',
        'alamat',
        'unit_kerja',
    ];
}

