@extends('admin.layouts.main')
@section('container')
      <div class="container-fluid">
        <div class="table-wrapper ">
          <div class="table-title m-3">
            <div class="row">
              <div class="col-sm-10">
                  <h2>Data <b>Pelanggan</b></h2>
              </div>
              <div div class="col-sm-2">
          <a href="adduser" class="btn btn-success"><i class="ti ti-user-plus"></i> Add Pelanggan</a>					
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

          @if(session('dtrSuccess'))
            <div class="alert alert-success alert-dismissible fade show fadeInUp" role="alert">
              {{ session('dtrSuccess') }}
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
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Email</th>
                  <th>No. Telp</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                  @if($user->role_id === 1)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->alamat }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->no_telp }}</td>
                        <td>
                          <div class="d-flex">
                            <a href="/userlist/{{ $user->id }}/edit" class="btn btn-secondary" style="margin: 0 5px 0 0;">
                                <i class="ti ti-edit">Update</i>
                            </a>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" aria-expanded="false" onclick="return confirm('Apakah kamu ingin menghapus user ini?')">
                                    <i class="ti ti-trash">Delete</i>
                                </button>
                            </form>
                        </div>
                        
                        </td>
                    </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        
      </div>
      </div>
      </div>
@endsection
