<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kodeba extends Model
{
    protected $table = 'tb_kodeba';
    protected $primaryKey = 'kode_ba';
    protected $fillable = ['kode_ba', 'deskripsi'];
    public $incrementing = false;
}
