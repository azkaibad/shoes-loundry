@extends('admin.layouts.main')
@section('container')
<div class="container-fluid ">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title fw-semibold mb-4">Tambah Pesanan</h5>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="wow fadeInUp" data-wow-delay="0.2s">
                                <form action="/pesananlist" method="post" >
                                @csrf
                                    <div class="row g-3">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Pesanan Name" required value="{{ old('name') }}">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <label for="name">Nama</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Alamat" required value="{{ old('alamat') }}">
                                                @error('alamat')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <label for="alamat">Alamat</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" placeholder="No. Telp" required value="{{ old('no_telp') }}">
                                                @error('no_telp')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <label for="no_telp">No. Telp</label>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                                <select class="form-select  @error('service_id') is-invalid @enderror" name="service_id" required >
                                                    @foreach($services as $service)
                                                        <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                                            {{ $service->service_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                                <select class="form-select  @error('sepatu_id') is-invalid @enderror" name="sepatu_id" required >
                                                    @foreach($sepatus as $sepatu)
                                                        <option value="{{ $sepatu->id }}" {{ old('sepatu_id') == $sepatu->id ? 'selected' : '' }}>
                                                            {{ $sepatu->sepatu_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <label for="pick_up_date">Pengambilan</label>
                                            <input type="date" name="pick_up_date" class="form-control border-0" id="pick_up_date" required value="{{ old('pick_up_date') }}" style="height: 55px;">                           
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <label for="delivery_date">Pengiriman</label>
                                            <input type="date" name="delivery_date" class="form-control border-0" id="delivery_date" required value="{{ old('delivery_date') }}" style="height: 55px;">
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