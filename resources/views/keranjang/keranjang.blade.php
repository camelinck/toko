@extends('layout.master')

<title>bs4 cart - Bootdey.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    body {
        margin-top: 20px;
        background: #eee;
    }

    .ui-w-40 {
        width: 40px !important;
        height: auto;
    }

    .card {
        box-shadow: 0 1px 15px 1px rgba(52, 40, 104, .08);
    }

    .ui-product-color {
        display: inline-block;
        overflow: hidden;
        margin: .144em;
        width: .875rem;
        height: .875rem;
        border-radius: 10rem;
        -webkit-box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.15) inset;
        box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.15) inset;
        vertical-align: middle;
    }
</style>
</head>
@section('content')

<body>
    <div class="container px-3 my-5 clearfix">

        <div class="card">
            <div class="card-header">
                <h2>Keranjang kamu</h2>
            </div>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if(session('alert'))
            <div class="alert alert-danger">
                {{ session('alert') }}
            </div>
            @endif
            <div class="card-body">
                @if ($totalHarga < 2000000) <div class="alert alert-warning mt-3" role="alert">
                    Kurang Rp{{number_format(2000000 - $totalHarga, 0, ',', '.')}} lagi untuk mendapatkan voucher!
            </div>
            
            @endif
            @if ($totalHarga >= 2000000)
            <div class="alert alert-success mt-3" role="alert">
                Yey kamu bisa mendapatkan voucher untuk pembelian berikutnya!
            </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered m-0">
                    <thead>
                        <tr>

                            <th class="text-center py-3 px-4" style="min-width: 400px;">Nama Produk
                            </th>
                            <th class="text-right py-3 px-4" style="width: 100px;">Harga</th>
                            <th class="text-center py-3 px-4" style="width: 120px;">Jumlah</th>
                            <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                            <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#"
                                    class="shop-tooltip float-none text-light" title data-original-title="Clear cart"><i
                                        class="ino ion-md-trash"></i></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($keranjang as $k)
                        <tr>
                            <td class="p-4">
                                <div class="media align-items-center">
                                    <img src="{{ asset('storage/' . $k->produk->gambar) }}"
                                        class="d-block ui-w-40 ui-bordered mr-4" alt>
                                </div>
                                <div class="media-body">
                                    <a href="#" class="d-block text-dark">{{$k->produk->nama}}</a>
                                </div>
                            </td>
                            <td class="text-right font-weight-semibold align-middle p-4">{{ number_format($k->produk->harga, 0, ',', '.') }}</td>
                            <td class="text-right font-weight-semibold align-middle p-4">{{$k->jumlah}}</td>
                            <td class="text-right font-weight-semibold align-middle p-4">{{ number_format($k->sub_total, 0, ',', '.') }}</td>
                            <td class="text-center align-middle px-0">
                                <form action="{{ route('destroy') }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id_produk" value="{{ $k->id_produk }}">
                                    <button type="submit" class="btn btn-danger">x</button>
                                </form>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                <div class="mt-4">
                    <label class="text-muted font-weight-normal">Gunakan Voucher</label>
                    <input type="text" id="voucherCode" placeholder="Masukkan kode" class="form-control">
                    <small id="voucherStatus" class="text-danger"></small>
                </div>
                <div class="d-flex">
                    <div class="text-right mt-4 mr-5">
                        <label class="text-muted font-weight-normal m-0">Diskon Voucher</label>
                        <div class="text-large" id="discountAmount"><strong>Rp0</strong></div>
                    </div>
                    <div class="text-right mt-4">
                        <label class="text-muted font-weight-normal m-0">Total harga</label>
                        <div class="text-large" id="totalAmount"><strong>Rp{{$totalHarga}}</strong></div>
                    </div>
                </div>
            </div>
            <form action="{{ route('checkout') }}" method="post" id="checkoutForm">
                @csrf
                <div class="float-right">
                    <input type="hidden" name="voucher" id="voucherInput" value="">
                    <input type="hidden" name="totalHarga" id="totalAmountInput" value="{{$totalHarga}}">
                    <button type="submit" class="btn btn-lg btn-primary mt-2">Checkout</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
    $('#voucherCode').on('input', function () {
        var voucherCode = $(this).val();
        var totalHarga = {{$totalHarga}};

        $.ajax({
            url: '/checkvoucher',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                voucherCode: voucherCode
            },
            success: function (response) {
                if (response.status === 'success') {
                    // KONDISI 1: Voucher ditemukan
                    $('#voucherStatus').text('');
                    $('#discountAmount').html('<strong>Rp10000</strong>');
                    var discountedTotalAmount = totalHarga - 10000;
                    $('#totalAmount').html('<strong>Rp' + discountedTotalAmount + '</strong>');

                    // Set the value of the hidden input field
                    $('#voucherInput').val(voucherCode);
                    $('#totalAmountInput').val(discountedTotalAmount);
                } else {
                    // KONDISI 2: Voucher tidak ditemukan
                    $('#voucherStatus').text('Kode voucher tidak ditemukan');
                    $('#discountAmount').html('<strong>Rp0</strong>');
                    $('#totalAmount').html('<strong>Rp' + totalHarga + '</strong>');

                    $('#totalAmountInput').val(totalHarga);
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                console.error('AJAX Error: ' + status + ' - ' + error);
            }
        });
    });
});
</script>
@endsection