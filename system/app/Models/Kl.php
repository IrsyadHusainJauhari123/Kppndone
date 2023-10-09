<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kl extends Model
{
    protected $table = 'tb_kl';
    protected $fillable = ['kode_ba', 'kode_akun', 'kode_kab', 'blokir', 'kontrak', 'realisasi', 'bulan', 'tahun'];
}
