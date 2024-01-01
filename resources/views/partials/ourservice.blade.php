<div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Our Services</h1>
            </div>
            <div class="row g-5">
            @foreach($services as $service)
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                            <a href="{{ route('service.detail', ['id' => $service->id]) }} ">
                                <img class="img-fluid" src="{{  asset ('img/services/' . $service->gambar)}}" alt="Gambar">
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>