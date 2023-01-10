<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeRekening extends Model
{
    use HasFactory;

    protected $table = 'rekening';
    protected $fillable = [
        'kabupaten/kota',
        'nisn',
        'nama',
        'jenjang',
        'kode_rekening',
        'keterangan'
    ];
}