<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kodekab extends Model
{
    protected $table = 'tb_kodekab';
    protected $primaryKey = 'kode_kab';
    protected $fillable = ['kode_kab', 'deskripsi'];
    public $incrementing = false;
}
