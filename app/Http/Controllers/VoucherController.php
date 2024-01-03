<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\voucher;
use Illuminate\Support\Facades\Auth;

class VoucherController extends Controller
{
    public function index()
    {
        $voucher = voucher::with('user')
            ->where('id_user', Auth::id())
            ->where('status',1)
            ->where('tanggal_kadaluarsa','>',now())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('voucher.voucher', ['voucher' => $voucher]);
    }
    public function checkVoucher(Request $request)
    {
        $voucherCode = $request->input('voucherCode');

        // Cek apakah voucher dengan kode tersebut ada
        $voucher = Voucher::where('kode_voucher', $voucherCode)
            ->where('id_user',Auth::id()) // Sesuaikan dengan cara Anda mendapatkan ID user
            ->where('status', 1)
            ->where('tanggal_kadaluarsa', '>', now())
            ->first();

        if ($voucher) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error']);
        }
    }
   
    
    
}
