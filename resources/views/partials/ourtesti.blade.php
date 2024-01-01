<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Testimonial</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item text-center">
                        <img class="img-fluid bg-light p-2 mx-auto mb-3" src="img/testimonial-1.jpg" style="width: 90px; height: 90px;">
                        <div class="testimonial-text text-center p-4">
                            <p>Saya sangat puas dengan pelayanan Solesplash! Sepatu-sepatu favorit saya yang terlihat kusam dan kotor sekarang bersih dan terawat dengan baik. Prosesnya mudah, cepat, dan hasilnya memuaskan. Terima kasih Solesplash!.</p>
                            <h5 class="mb-1">Sabrina Nabila</h5>
                            <span class="fst-italic">Pelanggan</span>
                        </div>
                    </div>
                    <div class="testimonial-item text-center">
                        <img class="img-fluid bg-light p-2 mx-auto mb-3" src="img/testimonial-2.jpg" style="width: 90px; height: 90px;">
                        <div class="testimonial-text text-center p-4">
                            <p>Solesplash memberikan solusi yang praktis untuk merawat sepatu-sepatu saya. Aplikasinya sangat user-friendly dan tim mereka sangat profesional. Hasilnya? Sepatu-sepatu saya seperti baru kembali!.</p>
                            <h5 class="mb-1">Tito Prasetyo</h5>
                            <span class="fst-italic">Pelanggan</span>
                        </div>
                    </div>
                    @foreach($reviews as $review)
                        <div class="testimonial-item text-center">
                            <img class="img-fluid bg-light p-2 mx-auto mb-3" src="{{ asset('img/profiles/' . $review->user->profile) }}" style="width: 90px; height: 90px;">
                            <div class="testimonial-text text-center p-4">
                                <p>{{ $review->komentar }}</p>
                                <h5 class="mb-1">{{ $review->pesanan->name }}</h5>
                                <span class="fst-italic">Pelanggan</span>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
</div>
    <!-- Testimonial End -->