<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'alamat',
        'kode_pos', 
        'nama_pesanan', 
        'jumlah_pesanan',
        'jenis_pembayaran', 
        'tanggal', 
        'total_pesanan' 
    ];
}