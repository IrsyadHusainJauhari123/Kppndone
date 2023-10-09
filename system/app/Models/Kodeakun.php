<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kodeakun extends Model
{
    protected $table = 'tb_kodeakun';
    protected $primaryKey = 'kode_akun';
    protected $fillable = ['kode_akun', 'deskripsi'];
    public $incrementing = false;
}
