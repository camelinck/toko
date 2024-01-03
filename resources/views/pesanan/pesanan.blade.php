@extends('layout.master')
@section('content')
<div style="display: flex; flex-direction: column; align-items: center; justify-content: center; margin: 0;">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <h1 style="margin-top: 40px; margin-bottom: 20px; font-weight: bold;">Pesanan Saya</h1>

    @if(count($pesanan) > 0)
    @foreach ($pesanan as $p)
    <div class="card w-75" style="margin-top: 16px; margin-right: 30px; margin-bottom: 20px; margin-left: 30px;">
        <div class="card-body">
            <h4 class="card-title" style="font-weight: bold;">Pesanan {{$p->created_at}}</h4>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Detail Pesanan</h5>
                    <ul class="list-group">
                        @foreach ($p->detail_pesanan as $detail)
                        <li class="list-group-item">
                            <strong>Produk:</strong> {{$detail->produk->nama}},
                            <strong>Jumlah:</strong> {{$detail->jumlah}},
                            <strong>Harga:</strong> Rp{{ number_format($detail->sub_total, 0, ',', '.') }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <p class="card-text mb-3">Total Pesanan : Rp{{ number_format($p->total_harga, 0, ',', '.') }}</p>
            @foreach ($p->voucher as $v)
            <p class="card-text mb-3">Kode Voucher : {{$v->kode_voucher}}</p>
            @endforeach
        </div>
    </div>
    @endforeach

    @else
    <p>Belum ada pesanan.</p>
    @endif
    <div style="margin-top: 16px;margin-bottom: 30px;"></div>
</div>
@endsection