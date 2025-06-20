@extends('frontend.inc.main')
@section('title')
    <title>Bela Hotel | ABOUT US</title>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="about-hero bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 text-center">
                    <h1 class="display-4 fw-bold text-primary">About Bela Hotel</h1>
                    <p class="lead text-muted">Delivering unforgettable hospitality experiences since 2022</p>
                </div>
            </div>
        </div>
    </section>

   

    <!-- About Content Section -->
    <section class="about-content py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="about-gallery">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <img src="/nyoba/images/carousel/1.png" class="img-fluid rounded shadow" alt="Hotel Lobby">
                            </div>
                            <div class="col-md-6">
                                <img src="/nyoba/images/carousel/2.png" class="img-fluid rounded shadow" alt="Hotel Room">
                            </div>
                            <div class="col-md-12">
                                <img src="/nyoba/images/carousel/3.png" class="img-fluid rounded shadow" alt="Hotel Facilities">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="ps-lg-4">
                        <h2 class="fw-bold mb-4 text-primary">Our Story</h2>
                        <p class="lead">Bela Hotel Company was established in 2022, starting from a modest hotel building with just a few rooms.</p>
                        
                        <p>Today, we've grown into a premier accommodation provider with over 20 comfortable rooms and complete facilities to meet all our guests' needs.</p>
                        
                        <div class="features mt-4">
                            <div class="d-flex mb-3">
                                <div class="me-3 text-primary">
                                    <i class="fas fa-swimming-pool fa-2x"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold">Private Swimming Pool</h5>
                                    <p class="mb-0">Enjoy our exclusive pool reserved for hotel guests</p>
                                </div>
                            </div>
                            
                            <div class="d-flex mb-3">
                                <div class="me-3 text-primary">
                                    <i class="fas fa-wifi fa-2x"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold">Free High-Speed WiFi</h5>
                                    <p class="mb-0">Stay connected with our high-speed internet access</p>
                                </div>
                            </div>
                            
                            <div class="d-flex mb-3">
                                <div class="me-3 text-primary">
                                    <i class="fas fa-utensils fa-2x"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold">Delicious Dining</h5>
                                    <p class="mb-0">Start your day with our complimentary breakfast</p>
                                </div>
                            </div>

                            <div class="d-flex">
                                <div class="me-3 text-primary">
                                    <i class="fas fa-smoking-ban fa-2x"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold">Dedicated Smoking Area</h5>
                                    <p class="mb-0">Specially designed space for smoking guests</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="mission-section py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="fw-bold mb-4 text-primary">Our Commitment</h2>
                    <p class="lead">We are dedicated to providing exceptional hospitality through personalized service, premium amenities, and uncompromising comfort.</p>
                    <p>Our team continuously strives to exceed expectations and create memorable experiences for every guest who stays with us at Bela Hotel.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section (Optional) -->
    <section class="team-section py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center mb-5">
                    <h2 class="fw-bold text-primary">Meet Our Team</h2>
                    <p class="lead">The passionate professionals behind your exceptional stay</p>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                <!-- Team members can be added here -->
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .about-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('/nyoba/images/carousel/1.png');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
        }
        
        .stats-card {
            transition: all 0.3s ease;
            background: white;
        }
        
        .stats-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .features i {
            min-width: 30px;
        }

        .mission-section {
            background: url('/nyoba/images/about/mission-bg.jpg');
            background-size: cover;
            background-attachment: fixed;
            position: relative;
            color: white;
        }

        .mission-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 139, 0.8);
        }

        .mission-section .container {
            position: relative;
            z-index: 1;
        }
    </style>
@endpush