<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_pesanan extends Model
{
    
    use HasFactory;
    protected $primaryKey = 'id_detail';
  
    protected $fillable=[
        'id_detail',
        'id_pesanan',
        'id_produk',
        'jumlah',
        'sub_total',
    ];
    public function pesanan()
    {
        return $this->belongsTo(pesanan::class, 'id_pesanan', 'id_pesanan');
    }
    public function produk()
    {
        return $this->belongsTo(produk::class, 'id_produk', 'id_produk');
    }
}
