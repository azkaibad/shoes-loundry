@extends('admin.layouts.main')
@section('container')
<div class="container-fluid">
        <div class="table-wrapper ">
          <div class="table-title m-3">
            <div class="row">
              <div class="col-sm-10">
                  <h2>Pesanan <b>Selesai</b></h2>
              </div>
              <div div class="col-sm-2">				
        </div>
      </div>
    </div>
      <div class="row">
          <div class="table-responsive">
            <table class="table table-striped table-hover">
            @if($completedPesanan->isEmpty())
            <p>No completed orders.</p>
            @else
              <thead>
                <tr>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>No. Telp</th>
                  <th>Service</th>
                  <th>Sepatu</th>
                  <th>Harga</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach($completedPesanan as $pesanan)
                    <tr>
                        <td>{{ $pesanan->kode_pesanan }}</td>
                        <td>{{ $pesanan->name }}</td>
                        <td>{{ $pesanan->alamat }}</td>
                        <td>{{ $pesanan->no_telp }}</td>
                        <td>{{ $pesanan->service->service_name}}</td>
                        <td>{{ $pesanan->sepatu->sepatu_name}}</td>
                        <td>{{ $pesanan->service->harga}}</td>
                        <td>{{ $pesanan->status }}</td>
                    </tr>
                @endforeach
            </tbody>
            @endif
            </table>
          </div>
        </div>
        
      </div>
      </div>
      </div>

@endsection