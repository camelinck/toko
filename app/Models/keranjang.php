<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keranjang extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_keranjang';
    protected $fillable=[
        'id_keranjang',
        'id_user',
        'id_produk',
        'jumlah',
        'sub_total',
    ];
    public function user()
    {
        return $this->belongsTo(user::class, 'id_user', 'id_user');
    }
    public function produk()
    {
        return $this->belongsTo(produk::class, 'id_produk', 'id_produk');
    }

    
}
