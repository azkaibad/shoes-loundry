@extends('admin.layouts.main')
@section('container')
      <div class="container-fluid">
        <div class="table-wrapper ">
          <div class="table-title m-3">
            <div class="row">
              <div class="col-sm-10">
                  <h2>Data <b>Pesanan</b></h2>
              </div>
              <div div class="col-sm-2">
          <a href="addpesanan" class="btn btn-success"><i class="ti ti-user-plus"></i> Tambah Pesanan</a>					
        </div>
      </div>
    </div>
      <div class="row">
        <div class="col-md-12">
          @if(session('deleteSuccess'))
            <div class="alert alert-success alert-dismissible fade show fadeInUp" role="alert">
              {{ session('deleteSuccess') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          @if(session('PsnSuccess'))
            <div class="alert alert-success alert-dismissible fade show fadeInUp" role="alert">
              {{ session('PsnSuccess') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          @if(session('deleteError'))
            <div class="alert alert-danger alert-dismissible fade show fadeInUp" role="alert">
              {{ session('deleteError') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>No. Telp</th>
                  <th>Service</th>
                  <th>Bahan</th>
                  <th>Pajak</th>
                  <th>Ongkir</th>
                  <th>Total Harga</th>
                  <th>Pick Up</th>
                  <th>Delivery</th>
                  <th>Status</th>
                  <th>Status Update</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($pesanans as $pesanan)
                  @if($pesanan->status !== 'selesai')
                    <tr>
                        <td>{{ $pesanan->kode_pesanan }}</td>
                        <td>{{ $pesanan->name }}</td>
                        <td>{{ $pesanan->alamat }}</td>
                        <td>{{ $pesanan->no_telp }}</td>
                        <td>{{ $pesanan->service->service_name}}</td>
                        <td>{{ $pesanan->sepatu->sepatu_name}}</td>
                        <td>{{ $pesanan->pajak}}</td>
                        <td>{{ $pesanan->biaya_pengiriman}}</td>
                        <td>{{ $pesanan->total_harga}}</td>
                        <td>{{ $pesanan->pick_up_date }}</td>
                        <td>{{ $pesanan->delivery_date }}</td>
                        <td>{{ $pesanan->status }}</td>
                        <td>
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#updateModal{{ $pesanan->id }}">
                                Update Status
                            </button>
                        </td>
                        <td>
                            <form action="{{ route('pesanan.destroy', $pesanan->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" aria-expanded="false" onclick="return confirm('Apakah kamu ingin menghapus pesanan ini?')">
                                    <i class="ti ti-trash">Delete</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                  
                  @endif
                    <!-- Modal Bootstrap untuk formulir pembaruan status -->
                    <div class="modal fade" id="updateModal{{ $pesanan->id }}" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel{{ $pesanan->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateModalLabel{{ $pesanan->id }}">Update Status Pesanan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('pesanan.updateStatus', $pesanan->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <label for="status">Update Status:</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="pengambilan">Pengambilan</option>
                                            <option value="proses">Proses</option>
                                            <option value="pengiriman">Pengiriman</option>
                                            <option value="selesai">Selesai</option>
                                        </select>
                                        <div class="modal-footer">
                                          <button type="submit" class="btn btn-primary">Update Status</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Masukkan modal di sini -->
                @endforeach
            </tbody>
            </table>
          </div>
        </div>
        
      </div>
      </div>
      </div>

    


@endsection
