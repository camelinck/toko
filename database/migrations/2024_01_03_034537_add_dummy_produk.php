<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\produk;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $p1= new produk();
        $p1->nama = 'Sofa 3L';
        $p1->harga = '2100000';
        $p1->gambar = md5('gambar');
        $p1->save();

        $p2= new produk();
        $p2->nama = 'Sofa Santai';
        $p2->harga = '1600000';
        $p2->gambar = md5('gambar1');
        $p2->save();

        $p3= new produk();
        $p3->nama = 'Sofa Lipat';
        $p3->harga = '2500000';
        $p3->gambar = md5('gambar2');
        $p3->save();

        $p4= new produk();
        $p4->nama = 'Sofa 123';
        $p4->harga = '3100000';
        $p4->gambar = md5('gambar3');
        $p4->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
