@extends('layouts.main')

@section('container')


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Profile</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Profile</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container">
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="{{ auth()->user()->profile ? asset('img/profiles/' . auth()->user()->profile) : 'https://bootdey.com/img/Content/avatar/avatar7.png' }}" alt="Profile" class="rounded-circle" width="150">
                <div class="mt-3">
                  <h4>{{ auth()->user()->name }}</h4>
                  <p>{{ auth()->user()->role->role_name }}</p>
                  <p class="text-secondary">{{ auth()->user()->alamat }}</p>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                @if(session('Success'))
                  <div class="alert alert-success alert-dismissible fade show fadeInUp" role="alert">
                    {{ session('Success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

                @if(session('Error'))
                  <div class="alert alert-warning alert-dismissible fade show fadeInUp" role="alert">
                    {{ session('Error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                <div class="col-sm-3">
                  <h6 class="mb-0">Full Name</h6>
                </div>
                
                <div class="col-sm-9 text-secondary">
                    {{ auth()->user()->name }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    {{ auth()->user()->email }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Phone</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    {{ auth()->user()->no_telp }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Address</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    {{ auth()->user()->alamat }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-12">
                  <button type="button" class="btn btn-secondary mx-2" data-bs-toggle="modal" data-bs-target="#updateModal">
                      Edit
                  </button>
                </div>
                <!-- Modal Bootstrap untuk formulir pembaruan status -->
                <!-- Modal Bootstrap untuk formulir pembaruan status -->
                <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="updateModalLabel">Update Profile</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <form action="{{ route('profile.update', auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  @method('PUT')
                                  <div class="form-floating">
                                      <input type="text" class="form-control" name="name" placeholder="Name" required value="{{ auth()->user()->name }}">
                                      <label for="name">Name</label>
                                  </div>
                                  <div class="form-floating">
                                    <input type="text" class="form-control" name="alamat" placeholder="Alamat" required value="{{ auth()->user()->alamat }}">
                                    <label for="alamat">Alamat</label>
                                  </div>
                                  <div class="form-floating">
                                    <input type="tel" class="form-control" name="no_telp" placeholder="No. Telp" required value="{{ auth()->user()->no_telp }}">
                                    <label for="no_telp">Nomor HP</label>
                                  </div>
                                  <div class="form-floating">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required value="{{ auth()->user()->email }}">
                                    <label for="email">Email</label>
                                  </div>
                                  <div class="form-floating">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                    <label for="password">Password</label>
                                  </div>
                                  <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                    <input type="file" class="form-control " name="profile" required  value="{{ auth()->user()->profile }}">
                                  </div>
                                  <!-- ... (other form fields) ... -->
                                  <div class="modal-footer">
                                      <button class="btn btn-primary w-100 py-3" type="submit">Update</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              </div>
            </div>
          </div>
            
            </div>
          </div>



        </div>
      </div>
    </div>

@endsection