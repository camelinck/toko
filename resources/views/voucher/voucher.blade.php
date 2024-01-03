@extends('layout.master')
@section('content')
<div style="text-align: center;">
    <h1 style="margin-top: 40px; margin-bottom: 20px; font-weight: bold;">Voucher Aktif Saya</h1>
</div>
<div style="display: flex; flex-wrap: wrap; justify-content: center; margin: 0;">

    @if(count($voucher) > 0)
    @foreach ($voucher as $key => $v)
    <div class="card w-25" style="margin: 10px;">
        <div class="card-body">
            <h4 class="card-title" style="font-weight: bold;">Kode Voucher {{$v->kode_voucher}}</h4>
            <p class="card-text mb-1">Berlaku sampai : {{$v->tanggal_kadaluarsa}}</p>
        </div>
    </div>

    @if(($key + 1) % 4 == 0)
</div>
<div style="display: flex; flex-wrap: wrap; justify-content: center; margin: 0;">
    @endif
    @endforeach
    @else
    <p>Belum ada voucher.</p>
    @endif

</div>
    <div style="margin-top: 16px; margin-bottom: 40px;"></div>

@endsection