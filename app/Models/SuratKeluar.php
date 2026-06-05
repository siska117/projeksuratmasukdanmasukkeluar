<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $fillable = [
        'no_surat',
        'tanggal_surat',
        'tujuan_surat',
        'perihal',
        'sifat',
        'keterangan',
        'file_surat'
    ];

    protected $casts = [
        'tanggal_surat' => 'date',
    ];
}