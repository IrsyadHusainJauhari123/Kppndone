<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagu extends Model
{
    protected $table = 'tb_pagu';
    protected $fillable = ['kode_ba', 'kode_akun', 'kode_kab', 'pagu', 'tahun'];
}
