@extends('frontend.inc.main')
@section('title')
    <title>ROOMS | Bela Hotel
</title>
@endsection

@section('content')
    <section class="swiper-image-content">
        @include('frontend.sectionindex.swiper')
    </section>

    <!-- check avilability form-->
    <section class="form" id="form">
        @include('frontend.sectionindex.form')
    </section>

    <!-- Rooms -->
    <section class="kamar-index py-5" id="kamar-index">
        @include('frontend.sectionindex.kamar')
    </section>

    <!--  Facilities-->
    {{-- <section class="facility-index py-5" id="facility-index">
   @include('frontend.sectionindex.facility')
 </section> --}}

    <!-- Testimonials -->
   <section class="testimonials py-5 bg-dark">
    <div class="container">
        <h2 class="text-center mb-5 text-white">What our guests say about us</h2>
        <div class="row">
            <!-- First Testimonial -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 bg-transparent text-white">
                    <div class="card-body">
                        <div class="guest-info mb-3 d-flex align-items-center">
                            <i class="fas fa-user-circle fa-2x me-3"></i>
                            <div>
                                <h6 class="mb-0 text-warning">Susan M</h6>
                                <small class="text-light">Mar 21, 2025 · Couples</small>
                            </div>
                        </div>
                        <h5 class="card-title mt-3 text-success">Barcelo Fes Medina - Urban hotel in Fez</h5>
                        <p class="card-text">Fabulous! Huge comfortable bed and clean room, lots of facilities. But for me what makes a good hotel into a great hotel is the people who...</p>
                    </div>
                </div>
            </div>
            
            <!-- Second Testimonial -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 bg-transparent text-white">
                    <div class="card-body">
                        <div class="guest-info mb-3 d-flex align-items-center">
                            <i class="fas fa-user-circle fa-2x me-3"></i>
                            <div>
                                <h6 class="mb-0 text-warning">Gail0174</h6>
                                <small class="text-light">Mar 10, 2025 · Business</small>
                            </div>
                        </div>
                        <h5 class="card-title mt-3 text-success">Top Hotel</h5>
                        <p class="card-text">Super Hotel, silent, good professional staff. Overall super hotel. The staff helped us with everything. The food was good and the place of the hotel is good. I would...</p>
                    </div>
                </div>
            </div>
            
            <!-- Third Testimonial -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 bg-transparent text-white">
                    <div class="card-body">
                        <div class="guest-info mb-3 d-flex align-items-center">
                            <i class="fas fa-user-circle fa-2x me-3"></i>
                            <div>
                                <h6 class="mb-0 text-warning">Jilhasankw</h6>
                                <small class="text-light">Jan 27, 2025 · Family</small>
                            </div>
                        </div>
                        <h5 class="card-title mt-3 text-success">Pampering stay</h5>
                        <p class="card-text">Good hotel with fine facilities and location. Staff was very friendly, especially mdam najlaa from room service staff she was very helpful and got... us whatever we needed. I wish...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Ajoutez ceci dans le <head> de votre HTML si ce n'est pas déjà fait -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @include('frontend.inc.auth_modal')


    <!-- Contact -->
    <section class="contact-index py-5" id="contact-index">
        @include('frontend.sectionindex.contact')
    </section>
@endsection
