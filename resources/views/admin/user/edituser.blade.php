@extends('admin.layouts.main')

@section('container')
<div class="container-fluid">
  <div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title fw-semibold mb-4">Update Pelanggan</h5>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name" placeholder="Name" required value="{{ $user->name }}">
                                    <label for="name">Name</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="alamat" placeholder="Alamat" required value="{{ $user->alamat }}">
                                    <label for="alamat">Alamat</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="tel" class="form-control" name="no_telp" placeholder="No. Telp" required value="{{ $user->no_telp }}">
                                    <label for="no_telp">Nomor HP</label>
                                </div>
                            </div>
                            {{-- <div class="col-md-12">
                                <div class="form-floating">
                                    <select class="form-select" name="role_id" required>
                                        <option value="1" {{ $user->role_id === 1 ? 'selected' : '' }}>Admin</option>
                                        <option value="2" {{ $user->role_id === 2 ? 'selected' : '' }}>Member</option>
                                    </select>
                                    <label for="role_id">Role</label>
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required value="{{ $user->email }}">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                    <label for="password">Password</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Update Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

@endsection