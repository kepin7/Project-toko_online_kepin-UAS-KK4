<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal',
        'nomer_pembayaran',
        'nomer_pesanan',
        'id_produk',
        'total_pesanan',
        'bayar',
        'kembalian'
    ];
}
