<?php

namespace App\Http\Controllers;
use App\Models\produk;
use App\Models\keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function index(){
        $produk = produk::all();
        return view('produk.produk', ['produk'=>$produk]);
    }
    public function addproduk(Request $request)
    {
        $id_produk = $request->id_produk;
        $harga = $request->harga;
        $id_user = auth()->user()->id_user;

        $existingKeranjang = Keranjang::where('id_user', $id_user)
                            ->where('id_produk', $id_produk)
                            ->first();

        if ($existingKeranjang) {
           
            $existingKeranjang->update([
                'jumlah' => $existingKeranjang->jumlah + 1,
                'sub_total' => $existingKeranjang->sub_total + $harga,
            ]);
        } else {
            $cart = new Keranjang;
            $cart->id_user = $id_user;
            $cart->id_produk = $id_produk;
            $cart->jumlah = 1;
            $cart->sub_total = $harga; 
            $cart->save();
        }

        // Redirect back or to a specific page
        return redirect()->back()->with('success', 'Produk masuk ke keranjang');
    }
}
