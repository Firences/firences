<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;
    protected $fillable = [
        'penyewa',
        'merek',
        'model',
        'plat',
        'harga',
        'status',
        'tglpinjam',
        'tglkembali'
    ];
}
