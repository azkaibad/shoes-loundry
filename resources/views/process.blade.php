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
                    <li class="breadcrumb-item text-white active" aria-current="page">Process</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Projects Start -->
    <div class="container-xxl py-4">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Process</h1>
            </div>
            <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-md-12 col-sm-4 text-center">
                    <div class="nav nav-pills nav-justified mb-3" >
                        <a class="nav-item nav-link {{ ($status === "tunggu_bayar" ) ? 'active' : '' }}" href="{{ route('process.index', ['status' => 'tunggu_bayar']) }}">Belum Bayar</a>
                        <a class="nav-item nav-link {{ ($status === "pengambilan" ) ? 'active' : '' }}" href="{{ route('process.index', ['status' => 'pengambilan']) }}">Di Jemput</a>
                        <a class="nav-item nav-link {{ ($status === "proses" ) ? 'active' : '' }}" href="{{ route('process.index', ['status' => 'proses']) }}">Proses</a>
                        <a class="nav-item nav-link {{ ($status === "pengiriman" ) ? 'active' : '' }}" href="{{ route('process.index', ['status' => 'pengiriman']) }}">Di Antar</a>
                        <a class="nav-item nav-link {{ ($status === "selesai" ) ? 'active' : '' }}" href="{{ route('process.index', ['status' => 'selesai']) }}">Selesai</a>
                    </div>
                </div>
            </div>


            @foreach($user->pesanan as $pesanan)
                @if ($pesanan->status === $status)   
            <div class="card mt-3 wow fadeInUp" data-wow-delay="0.3s">
                <div class="card-header">
                    <div class="row g-0">
                        <div class="col-md-10">
                            {{ $pesanan->kode_pesanan }}
                        </div>
                        <div class="col-md-2 align-items-end">
                            status {{ $pesanan->status }}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-0">
                        <div class="col-md-1">
                          <img src="{{  asset ('img/services/' . $pesanan->service->gambar)}}" class="img-fluid rounded-start" alt="..." style="width: 120px; height: 120px">
                        </div>
                        <div class="col-md-9">
                          <div class="card-body">
                            <h5 class="card-title">Service : {{ $pesanan->service->service_name }}</h5>
                            <p class="card-text">Alamat : {{ $pesanan->alamat }}</p>
                            
                            <p class="card-text">No telepon : {{ $pesanan->no_telp }}</p>
                            
                          </div>
                        </div>
                        <div class="col-md-2">
                            <p class="card-text ">Total : Rp. {{ $pesanan->total_harga }}</p>
                            <p class="card-text">Tgl Pick-up : {{ $pesanan->pick_up_date}}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    @if ($status === 'tunggu_bayar')
                    <div class="d-flex text-end">
                        <a href="{{ route('payment', ['kode_pesanan' => $pesanan->kode_pesanan]) }}" class="btn btn-primary mx-2">Bayar</a>
                        <form action="{{ route('destroy', ['kode_pesanan' => $pesanan->kode_pesanan]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" aria-expanded="false" onclick="return confirm('Apakah kamu ingin membatalkan pesanan ini?')">Batalkan</button>
                        </form>
                    </div>  
                    @else
                        <a href="{{ route('invoice', ['kode_pesanan' => $pesanan->kode_pesanan]) }}" class="btn btn-primary">Invoice</a>
                        @if ($status === 'selesai')
                            @if (!$pesanan->review)
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#reviewModal{{ $pesanan->id }}">
                                    Beri Nilai
                                </button>
                            @else
                                <button class="btn btn-primary disabled"> Sudah di Nilai </button>
                                <!-- Tampilkan pesan atau tombol lain jika ulasan sudah ada -->
                            @endif
                        @endif
                    @endif
                </div>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="reviewModal{{ $pesanan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Beri Nilai</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form untuk mengumpulkan nilai ulasan dan komentar -->
                            <form action="{{ route('review.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="pesanan_id" value="{{ $pesanan->id }}">
                                <div class="mb-3">
                                    <label for="rating" class="form-label">Rating:</label>
                                    <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" required>
                                </div>
                                <div class="mb-3">
                                    <label for="komentar" class="form-label">Komentar:</label>
                                    <textarea class="form-control" id="komentar" name="komentar" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
              @endif
              @endforeach

        </div>
    </div>



@endsection