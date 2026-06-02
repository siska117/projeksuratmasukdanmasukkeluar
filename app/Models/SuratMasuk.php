<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected $fillable = [
        'no_surat', 'tanggal_surat', 'tanggal_terima',
        'asal_surat', 'perihal', 'sifat', 'keterangan', 'file_surat'
    ];
}