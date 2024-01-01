@extends('admin.layouts.main')
@section('container')
<div class="container-fluid ">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title fw-semibold mb-4">Tambah Layanan</h5>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="wow fadeInUp" data-wow-delay="0.2s">
                                <form action="/servicelist" method="post" enctype="multipart/form-data">
                                @csrf
                                    <div class="row g-3">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control @error('description') is-invalid @enderror" name="service_name" placeholder="Service name" required value="{{ old('service_name') }}">
                                                @error('service_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <label for="service_name">Nama Layanan</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Deskripsi" required value="{{ old('description') }}">
                                                @error('description')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <label for="description">Deskripsi</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-floating">
                                                <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" placeholder="Harga" required value="{{ old('harga') }}">
                                                @error('harga')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <label for="harga">Harga</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                                <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" >
                                                @error('gambar')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100 py-3" type="submit">Input Data</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

    </div>
  </div>

@endsection