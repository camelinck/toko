<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pesanan';
    protected $fillable=[
        'id_pesanan',
        'id_user',
        'total_harga',
    ];

    public function user()
    {
        return $this->belongsTo(user::class, 'id_user', 'id_user');
    }
    public function detail_pesanan()
    {
        return $this->hasMany(detail_pesanan::class, 'id_pesanan');
    }
    public function voucher()
    {
        return $this->hasMany(voucher::class, 'id_pesanan');
    }
}
