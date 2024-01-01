@extends('admin.layouts.main')
@section('container')
<div class="container-fluid ">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title fw-semibold mb-4">Tambah Jenis Bahan Sepatu</h5>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="wow fadeInUp" data-wow-delay="0.2s">
                                <form action="/listsepatu" method="post">
                                @csrf
                                    <div class="row g-3">
                                        <div class="col-md-8 col-sm-8">
                                            <div class="form-floating">
                                                <input type="text" class="form-control @error('sepatu_name') is-invalid @enderror" name="sepatu_name" placeholder="Sepatu name" required value="{{ old('sepatu_name') }}">
                                                @error('sepatu_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <label for="sepatu_name">Nama Bahan Sepatu</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <button class="btn btn-primary w-100 py-3" type="submit">Input Data</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        <div class="table-wrapper ">
          <div class="table-title m-3">
            <div class="row">
              <div class="col-sm-10">
                  <h2>Jenis <b>Bahan Sepatu</b></h2>
              </div>				
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
                  <th>Nama Bahan Sepatu</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($sepatus as $sepatu)
                    <tr>
                        <td>{{ $sepatu->id }}</td>
                        <td>{{ $sepatu->sepatu_name }}</td>
                        <td>
                        <div class="d-flex">
                            <!-- <a href="/listsepatu/{{ $sepatu->id }}/edit" class="btn btn-secondary" style="margin: 0 5px 0 0;">
                                <i class="ti ti-edit">Update</i>
                            </a> -->
                            <button type="button" class="btn btn-secondary mx-2" data-bs-toggle="modal" data-bs-target="#updateModal{{ $sepatu->id }}">
                                Update
                            </button>
                            <form action="{{ route('sepatu.destroy', $sepatu->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" aria-expanded="false" onclick="return confirm('Apakah kamu ingin menghapus jenis sepatu ini?')">
                                    <i class="ti ti-trash">Delete</i>
                                </button>
                            </form>
                        </div>
                        
                        </td>
                    </tr>

                    <!-- Modal Bootstrap untuk formulir pembaruan status -->
                    <div class="modal fade" id="updateModal{{ $sepatu->id }}" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel{{ $sepatu->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateModalLabel{{ $sepatu->id }}">Update Jenis Bahan Sepatu</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('sepatu.update', $sepatu->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="sepatu_name" placeholder="Name" required value="{{ $sepatu->sepatu_name }}">
                                            <label for="name">Nama Bahan Sepatu</label>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary w-100 py-3" type="submit">Update</button>
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

    
  </div>

@endsection