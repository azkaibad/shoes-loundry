<!-- Quote Start -->
<div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
    <div class="container quote px-lg-0">
        <div class="row g-0 mx-lg-0">
            <div class="col-lg-6 ps-lg-0" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="img/carousel-3.jpg" style="object-fit: cover;" alt="">
                </div>
            </div>
            <div class="col-lg-6 quote-text py-5 wow fadeIn" data-wow-delay="0.5s">
                <div class="p-lg-5 pe-lg-0">
                    <div class="section-title text-start">
                        <h1 class="display-5 mb-4">Order Form</h1>
                    </div>
                    <p class="mb-4 pb-2">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo erat amet</p>
                    <form action="/order" method="post">
                        @csrf
                        @if(session()->has('PsnSuccess'))
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                {{ session('PsnSuccess') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                         @endif
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" name="name" class="form-control border-0 @error('name') is-invalid @enderror" id="name"placeholder="Name" required value="{{ Auth::user()->name }}" style="height: 55px;">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="tel" name="no_telp" class="form-control border-0 @error('no_telp') is-invalid @enderror" id="no_telp" placeholder=" No. Telp" required value="{{ Auth::user()->no_telp }}" style="height: 55px;">
                                @error('no_telp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-12">
                                <input type="text" name="alamat" class="form-control border-0 @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" required value="{{ Auth::user()->alamat }}" style="height: 55px;">
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-6 col-sm-6">
                                <select class="form-select border-0 @error('service_id') is-invalid @enderror" name="service_id" required >
                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                            {{ $service->service_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 col-sm-6">
                                <select class="form-select border-0 @error('sepatu_id') is-invalid @enderror" name="sepatu_id" required >
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
                                <button class="btn btn-primary w-100 py-3" type="submit">Order</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>