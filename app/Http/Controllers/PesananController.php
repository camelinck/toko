<?php

namespace App\Http\Controllers;

use App\Models\detail_pesanan;
use App\Models\produk;
use Illuminate\Http\Request;
use App\Models\pesanan;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = pesanan::with(['detail_pesanan','voucher','detail_pesanan.produk'])
        ->where('id_user', Auth::id())
        ->orderBy('created_at', 'desc')
        ->get();
        return view('pesanan.pesanan', ['pesanan' => $pesanan]);
    }
}
