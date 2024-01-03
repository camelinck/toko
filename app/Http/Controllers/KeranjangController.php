<?php 

namespace App\Http\Controllers;

use App\Models\keranjang;
use App\Models\pesanan;
use App\Models\voucher;
use App\Models\detail_pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjang = keranjang::with('produk')->where('id_user', Auth::id())->get();
        $totalHarga = $keranjang->sum('sub_total');
        return view('keranjang.keranjang', ['keranjang' => $keranjang, 'totalHarga' => $totalHarga]);
    }
   
    public function destroy(Request $request)
    {
        $id_user = auth()->user()->id_user;
        $id_produk = $request->id_produk;

        Keranjang::where('id_user', $id_user)->where('id_produk', $id_produk)->delete();

        return redirect()->route('keranjang')->with('success', 'Item berhasil dihapus');
    }

    public function checkout(Request $request)
    {
        $keranjang = keranjang::where('id_user', Auth::id())->get();
        $totalHargaReal = $keranjang->sum('sub_total');
        $totalHarga = $request->totalHarga;

        if ($totalHarga <= 0) {
            return redirect()->route('keranjang')->with('alert', 'Tidak ada Barang di Keranjang');
        }

        $id_user = auth()->user()->id_user;

        $pesanan = pesanan::create([
            'id_user' => $id_user,
            'total_harga' => $totalHarga,
        ]);

        $id_pesanan = $pesanan->id_pesanan;
        $cartItems = Keranjang::where('id_user', $id_user)->get();

        foreach ($cartItems as $item) {
            detail_pesanan::create([
                'id_pesanan' => $id_pesanan,
                'id_produk' => $item->id_produk,
                'jumlah' => $item->jumlah,
                'sub_total' => $item->sub_total,
            ]);
        }
        if ($totalHargaReal >= 2000000) {

            $voucher_code = 'V' . Str::random(5);

            voucher::create([
                'id_user' => $id_user,
                'kode_voucher' => $voucher_code,
                'id_pesanan' => $id_pesanan,
                'tanggal_kadaluarsa' => now()->addMonths(3),
                'status' => true,
            ]);
        }
        $voucherCode = $request->voucher;

    if ($voucherCode) {
        $voucher = Voucher::where('kode_voucher', $voucherCode)
            ->where('id_user', Auth::id())
            ->where('status', 1) 
            ->first();
        if ($voucher) {
                // Voucher found, update its status to 0
                $voucher->update(['status' => 0]);
        }
    }
        keranjang::where('id_user', Auth::id())->delete();
        return redirect()->route('pesanan')->with('success', 'Berhasil membuat pesanan');
    }

}
