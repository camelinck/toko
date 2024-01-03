<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    protected $fillable=[
        'id_produk',
        'nama',
        'harga',
    ];

    public function keranjang()
    {
        return $this->hasMany(Keranjang::class, 'id_produk');
    }
    public function detail_pesanan()
    {
        return $this->hasMany(detail_pesanan::class, 'id_produk');
    }


}
