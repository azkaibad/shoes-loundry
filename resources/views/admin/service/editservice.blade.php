@extends('admin.layouts.main')

@section('container')
<div class="container-fluid">
  <div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title fw-semibold mb-4">Update Layanan</h5>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <form action="{{ route('service.update', $service->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="service_name" placeholder="Service Name" required value="{{ $service->service_name }}">
                                    <label for="name">Nama Layanan</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="description" placeholder="Description" required value="{{ $service->description }}">
                                    <label for="name">Nama Layanan</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="harga" placeholder="Harga" required value="{{ $service->harga }}">
                                    <label for="harga">Harga</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                    <input type="file" class="form-control " name="gambar" required  value="{{ $service->gambar }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Update</button>
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