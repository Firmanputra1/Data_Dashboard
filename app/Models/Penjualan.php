<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';

    protected $fillable = [
        'nama_produk',
        'tanggal_penjualan',
        'jumlah',
        'harga',
    ];

    protected $casts = [
        'tanggal_penjualan' => 'date',
        'jumlah' => 'integer',
        'harga' => 'decimal:2',
    ];
    
    protected $attributes = [
        'harga' => 0.00,
    ];
}
