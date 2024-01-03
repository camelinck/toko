<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voucher extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_voucher';
  
    protected $fillable=[
        'id_voucher',
        'id_user',
        'id_pesanan',
        'kode_voucher',
        'tanggal_kadaluarsa',
        'status',

    ];
    public function user()
    {
        return $this->belongsTo(user::class, 'id_user', 'id_user');
    }
    public function pesanan()
    {
        return $this->belongsTo(pesanan::class, 'id_pesanan', 'id_pesanan');
    }
}
