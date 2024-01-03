@extends('layout.master')
@section('content')
 <div class="glasses">
         <div class="container">
            <div class="row">
               <div class="col-md-10 offset-md-1">
               @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                  <div class="titlepage">
                     <h2>Yuk pilih Sofa Kamu!</h2>
                     <p>Dapatkan Diskon Rp10.000 untuk Transaksi Selanjutnya Setiap Pembelian Rp2.000.000!
                     </p>
                  </div>
               </div>
            </div>
         </div>
         <div class="container-fluid">
           
         @php
    $counter = 0;
@endphp

@foreach ($produk as $p)
    @if ($counter % 4 == 0)
        <div class="row">
    @endif

    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
        <div class="glasses_box">  
            <figure style="height: 200px; overflow: hidden; ">
                <img src="{{ asset('storage/' . $p->gambar) }}" alt="#" style="object-fit: cover; width: 100%; height: 100%;">
            </figure>
            <h3><span class="blu">Rp</span>{{ number_format($p->harga, 0, ',', '.') }}</h3>
            <p>{{$p->nama}}</p>
            <form action="{{route('addproduk')}}" method="post">
                @csrf
                <input type="hidden" name="id_produk" value="{{ $p->id_produk }}">
                <input type="hidden" name="harga" value="{{ $p->harga }}">
                <button type="submit" class="btn btn-primary">Masukkan ke keranjang</button>
            </form>
        </div>
    </div>

    @php
        $counter++;
    @endphp

    @if ($counter % 4 == 0)
        </div>
    @endif
@endforeach
         </div>
      </div>
      <!-- end Our  Glasses section -->
   @endsection