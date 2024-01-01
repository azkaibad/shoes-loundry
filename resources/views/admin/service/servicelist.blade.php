@extends('admin.layouts.main')
@section('container')
      <div class="container-fluid">
        <div class="table-wrapper ">
          <div class="table-title m-3">
            <div class="row">
              <div class="col-sm-10">
                  <h2>Jenis <b>Layanan</b></h2>
              </div>
              <div div class="col-sm-2">
          <a href="addservice" class="btn btn-success"><i class="ti ti-user-plus"></i>Tambah Layanan</a>					
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

          @if(session('Success'))
            <div class="alert alert-success alert-dismissible fade show fadeInUp" role="alert">
              {{ session('Success') }}
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
                  <th>ID</th>
                  <th>Nama Layanan</th>
                  <th>Deskripsi</th>
                  <th>Harga (Rp)</th>
                  <th>Gambar</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->service_name }}</td>
                        <td >{{ $service->description }}</td>
                        <td>{{ $service->harga }}</td>
                        <td><img src="{{  asset ('img/services/' . $service->gambar)}}" alt="Gambar" style="max-width: 100px; max-height: 100px;"></td>
                        {{-- <td>
                            <img src="{{ asset('img/' . $food->gambar_menu) }}" alt="Gambar Menu" style="max-width: 100px; max-height: 100px;">
                        </td> --}}
                        <td>
                          <div class="d-flex">
                            <a href="/servicelist/{{ $service->id }}/edit" class="btn btn-secondary" style="margin: 0 5px 0 0;">
                                <i class="ti ti-edit">Update</i>
                            </a>
                            <form action="{{ route('service.destroy', $service->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" aria-expanded="false" onclick="return confirm('Apakah kamu ingin menghapus layanan ini?')">
                                    <i class="ti ti-trash">Delete</i>
                                </button>
                            </form>
                        </div>
                        
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        
      </div>
      </div>
      </div>
@endsection
