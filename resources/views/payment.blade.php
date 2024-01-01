@extends('layouts.main')

@section('container')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Process</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Transaksi</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Projects Start -->
    <div class="container-xxl py-4">
      <div class="container">
          <div class="section-title text-center">
              <h1 class="display-5 mb-5">Transaksi</h1>
          </div>
          <div class="card border border-5 border-light  p-4 wow fadeInUp" style="padding: 30px" data-wow-delay="0.3s">
            <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
              <div class="col-md-6 text-center">
                <img class="img-fluid" src="{{  asset ('img/services/' . $pesanan->service->gambar)}}" alt="Gambar" style="width: 300px">
              </div>
              <div class="col-md-6 ">
                <h3 class="lh-base mb-2">Detail Pesanan</h3>
                <p class="text-primary fw-medium mb-2">KODE PESANAN : {{ $pesanan->kode_pesanan }}</p>
                <p class="text-dark fw-medium mb-2">Nama : {{ $pesanan->name }}</p>
                <p class="text-dark fw-medium mb-2">Alamat : {{ $pesanan->alamat }}</p>
                <p class="text-dark fw-medium mb-2">Pajak (10%) : {{ $pesanan->pajak }}</p>
                <p class="text-dark fw-medium mb-2">Ongkir : {{ $pesanan->biaya_pengiriman }}</p>
                <p class="text-dark fw-medium mb-5">Total Harga : Rp {{ $pesanan->total_harga }}</p>
  
                <!-- Tampilkan tombol untuk membuka halaman pembayaran Snap -->
                <button id="pay-button" class="btn btn-secondary">Bayar Sekarang<i class="fa fa-arrow-right ms-2"></i></button>
              </div>
            </div>
          </div>
      </div>
    </div>


    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
          // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
          // Also, use the embedId that you defined in the div above, here.
          window.snap.pay('{{$snapToken}}', {
            onSuccess: function (result) {
              /* You may add your own implementation here */
              // alert("payment success!");
              window.location.href= '/process/pengambilan' 
              console.log(result);
            },
            onPending: function (result) {
              /* You may add your own implementation here */
              alert("waiting your payment!"); console.log(result);
            },
            onError: function (result) {
              /* You may add your own implementation here */
              alert("payment failed!"); console.log(result);
            },
            onClose: function () {
              /* You may add your own implementation here */
              alert('you closed the popup without finishing the payment');
            }
          });
        });
      </script>


@endsection
