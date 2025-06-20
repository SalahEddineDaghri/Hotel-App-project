@extends('frontend.inc.main')
@section('title')
    <title>Luxury Rooms & Suites | Bela Hotel</title>
@endsection

@section('content')
    <!-- Main Content -->
    <div class="container my-5">
        <div class="row">
            <!-- Filters Sidebar -->
            <div class="col-lg-3 mb-5 mb-lg-0">
                <div class="" style="top: 20px;">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="bi bi-funnel me-2"></i> Refine Your Search</h5>
                        </div>
                        <div class="card-body">
                            <form action="/rooms" method="GET">
                                @csrf
                                <div class="mb-4">
                                    <h6 class="fw-bold mb-3 text-uppercase small text-muted">Date Range</h6>
                                    <div class="mb-3">
                                        <label class="form-label">Check-in Date</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-white"><i
                                                    class="bi bi-calendar-check"></i></span>
                                            <input type="date" name="from" class="form-control"
                                                min="{{ date('Y-m-d') }}" value="{{ $request->from ?? date('Y-m-d') }}">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Check-out Date</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-white"><i class="bi bi-calendar-x"></i></span>
                                            <input type="date" name="to" class="form-control"
                                                min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                                value="{{ $request->to ?? date('Y-m-d', strtotime('+1 day')) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <h6 class="fw-bold mb-3 text-uppercase small text-muted">Guests</h6>
                                    <div class="mb-3">
                                        <label class="form-label">Adults</label>
                                        <select class="form-select" name="adults">
                                            @for ($i = 1; $i <= 6; $i++)
                                                <option value="{{ $i }}"
                                                    {{ ($request->adults ?? 2) == $i ? 'selected' : '' }}>
                                                    {{ $i }} Adult{{ $i > 1 ? 's' : '' }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Children</label>
                                        <select class="form-select" name="children">
                                            @for ($i = 0; $i <= 4; $i++)
                                                <option value="{{ $i }}"
                                                    {{ ($request->children ?? 0) == $i ? 'selected' : '' }}>
                                                    {{ $i }} Child{{ $i != 1 ? 'ren' : '' }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>

                                {{-- <div class="mb-4">
                                    <h6 class="fw-bold mb-3 text-uppercase small text-muted">Price Range</h6>
                                    <div class="range-slider mb-2">
                                        <input type="range" class="form-range" min="0" max="10000000"
                                            step="500000" id="priceRange" value="{{ $request->max_price ?? 10000000 }}">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <small>MAD 0</small>
                                        <small>MAD <span id="priceRangeValue">10,000,000</span>+</small>
                                    </div>
                                    <input type="hidden" name="max_price" id="maxPrice"
                                        value="{{ $request->max_price ?? 10000000 }}">
                                </div> --}}

                                <div class="mb-4">
                                    <h6 class="fw-bold mb-3 text-uppercase small text-muted">Room Types</h6>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="type-deluxe">
                                        <label class="form-check-label" for="type-deluxe">Deluxe Room</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="type-executive">
                                        <label class="form-check-label" for="type-executive">Executive Suite</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="type-presidential">
                                        <label class="form-check-label" for="type-presidential">Presidential Suite</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="type-family">
                                        <label class="form-check-label" for="type-family">Family Room</label>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <h6 class="fw-bold mb-3 text-uppercase small text-muted">Amenities</h6>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="amenity-wifi">
                                        <label class="form-check-label" for="amenity-wifi">Free WiFi</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="amenity-pool">
                                        <label class="form-check-label" for="amenity-pool">Pool View</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="amenity-balcony">
                                        <label class="form-check-label" for="amenity-balcony">Private Balcony</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="amenity-breakfast">
                                        <label class="form-check-label" for="amenity-breakfast">Breakfast Included</label>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 mt-2">
                                    <i class="bi bi-funnel me-2"></i> Apply Filters
                                </button>
                                <a href="/rooms" class="btn btn-outline-dark w-100 mt-2">Reset All</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rooms Listing -->
            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="fw-bold mb-0">Our Rooms & Suites</h2>
                        <p class="text-muted mb-0">{{ $roomsCount }} luxurious options available</p>
                    </div>
                    <div class="d-flex">
                        <div class="dropdown me-2">
                            <button class="btn btn-outline-dark dropdown-toggle" type="button" id="sortDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-sort-down me-2"></i>Sort
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                                <li>
                                    <h6 class="dropdown-header">Sort Options</h6>
                                </li>
                                <li><a class="dropdown-item" href="?sort=recommended">Recommended</a></li>
                                <li><a class="dropdown-item" href="?sort=price_low">Price: Low to High</a></li>
                                <li><a class="dropdown-item" href="?sort=price_high">Price: High to Low</a></li>
                                <li><a class="dropdown-item" href="?sort=capacity">Capacity</a></li>
                                <li><a class="dropdown-item" href="?sort=rating">Guest Rating</a></li>
                            </ul>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-outline-dark active"><i
                                    class="bi bi-grid"></i></button>
                            <button type="button" class="btn btn-outline-dark"><i class="bi bi-list-ul"></i></button>
                        </div>
                    </div>
                </div>

             

                @foreach ($rooms as $r)

                    <div class="card mb-4 border-0 shadow-hover room-card">
                        <div class="row g-0">
                            <!-- Room Gallery -->
                            <div class="col-md-4">
                                <div class="room-gallery position-relative h-100">
                                    @if ($r->images->count() > 0)
                                        {{-- <img src="{{asset('storage/' . $r->images->first()->image)}}"
                                            class="img-fluid rounded-start h-100 w-100" style="object-fit: cover;"
                                            alt="Room Image"> --}}
                                        {{-- {{dd($r->images->first()->image)}} --}}
                                        <img src="/storage/{{ $r->images->first()->image }}"
                                            class="img-fluid rounded-start h-100 w-100" style="object-fit: cover;"
                                            alt="Room Image">

                                        {{-- {{ dd($r->images->first()->image) }} --}}
                                    @else
                                        <img src="/img/kamar 1.jpg" class="img-fluid rounded-start h-100 w-100"
                                            style="object-fit: cover;" alt="Room Image">
                                    @endif
                                    {{-- <div class="position-absolute top-0 end-0 m-3">
                                        <button class="btn btn-sm btn-light rounded-circle shadow-sm wishlist-btn">
                                            <i class="bi bi-heart"></i>
                                        </button>
                                    </div> --}}
                                    <div class="position-absolute bottom-0 start-0 m-3">
                                        <span class="badge bg-dark text-white">
                                            <i class="bi bi-images me-1"></i> {{ $r->images->count() }} Photos
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Room Details -->
                            <div class="col-md-5">
                                <div class="card-body h-100 d-flex flex-column">
                                    <div class="mb-2">
                                        <span class="badge bg-primary-light text-primary">{{ $r->type->name }}</span>
                                        @if ($r->is_featured)
                                            <span class="badge bg-warning text-dark ms-2">Featured</span>
                                        @endif
                                        @if ($r->discount)
                                            <span class="badge bg-danger text-white ms-2">Special Offer</span>
                                        @endif
                                    </div>
                                    <h3 class="card-title mb-2">{{ $r->type->name }} #{{ $r->no }}</h3>
                                    <div class="room-meta mb-3">
                                        <span class="me-3"><i class="bi bi-people me-1"></i> {{ $r->capacity }}
                                            Guests</span>
                                        <span class="me-3"><i class="bi bi-arrows-angle-expand me-1"></i>
                                            {{ $r->size }} m²</span>
                                        <span><i class="bi bi-star-fill text-warning me-1"></i> 4.8</span>
                                    </div>

                                    <div class="room-features mb-3">
                                        <div class="d-flex flex-wrap gap-2">
                                            <span class="badge bg-light text-dark">
                                                <i class="bi bi-wifi me-1"></i> Free WiFi
                                            </span>
                                            <span class="badge bg-light text-dark">
                                                <i class="bi bi-tv me-1"></i> Smart TV
                                            </span>
                                            <span class="badge bg-light text-dark">
                                                <i class="bi bi-snow me-1"></i> AC
                                            </span>
                                            @if ($r->capacity > 5)
                                                <span class="badge bg-light text-dark">
                                                    <i class="bi bi-thermometer-sun me-1"></i> Heater
                                                </span>
                                            @endif
                                            @if ($r->has_balcony)
                                                <span class="badge bg-light text-dark">
                                                    <i class="bi bi-door-open me-1"></i> Balcony
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="mt-auto">
                                        <a href="/rooms/{{ $r->no }}"
                                            class="text-decoration-none d-flex align-items-center">
                                            <span class="text-primary me-2">View all amenities</span>
                                            <i class="bi bi-arrow-right-short"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Price & Booking -->
                            <div class="col-md-3 border-start">
                                <div class="card-body h-100 d-flex flex-column justify-content-between">
                                    <div class="text-end">
                                        <div class="mb-2">

                                            @php
                                                $currency = session('currency', 'MAD');
                                                $rate = config('currency.rates')[$currency] ?? 1;
                                                $price = $r->price * $rate;
                                                $symbol = match ($currency) {
                                                    'USD' => '$',
                                                    'EUR' => '€',
                                                    default => 'MAD ',
                                                };
                                            @endphp

                                            @if ($r->discount)
                                                <span class="text-danger"><s>{{ $symbol }}
                                                        {{ number_format($price, 2) }}</s></span><br>
                                                {{-- <span class="h4 text-dark fw-bold">MAD
                                                    {{ number_format($r->price - $r->discount) }}</span>
                                                <span class="badge bg-danger ms-2">Save
                                                    {{ number_format(($r->discount / $r->price) * 100) }}%</span> --}}
                                            @else
                                                <span class="h4 text-dark fw-bold">{{ $symbol }}
                                                   {{ number_format($price, 2) }}</span>
                                            @endif
                                        </div>
                                        <small class="text-muted">per night (excl. taxes)</small>
                                        <div class="mt-2">
                                            <span class="badge bg-success text-white">
                                                <i class="bi bi-check-circle me-1"></i> Free cancellation
                                            </span>
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        @if ($request->from)
                                            <form action="/order" method="post" class="mb-2">
                                                @csrf
                                                <input type="hidden" name="room" value="{{ $r->id }}">
                                                <input type="hidden" name="from" value="{{ $request->from }}">
                                                <input type="hidden" name="to" value="{{ $request->to }}">
                                                <button class="btn btn-primary w-100">
                                                    <i class="bi bi-calendar-check me-1"></i> Book Now
                                                </button>
                                            </form>
                                        @else
                                            <a href="/rooms/{{ $r->no }}" class="btn btn-primary w-100 mb-2">
                                                <i class="bi bi-calendar-check me-1"></i> Book Now
                                            </a>
                                        @endif
                                        <a href="/rooms/{{ $r->no }}" class="btn btn-outline-dark w-100">
                                            <i class="bi bi-info-circle me-1"></i> Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Pagination -->
                <nav aria-label="Page navigation" class="mt-5">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                <i class="bi bi-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        /* Custom Styles */
        .room-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('/img/room-hero-bg.jpg');
            background-size: cover;
            background-position: center;
        }

        .room-hero-carousel .main-img {
            height: 300px;
            width: 100%;
            object-fit: cover;
        }

        .room-hero-carousel .thumbnails img {
            width: 80px;
            height: 60px;
            object-fit: cover;
            cursor: pointer;
            opacity: 0.7;
            transition: all 0.3s ease;
        }

        .room-hero-carousel .thumbnails img.active {
            opacity: 1;
            border-color: #0d6efd !important;
        }

        .room-card {
            transition: all 0.3s ease;
            border-radius: 8px;
            overflow: hidden;
        }

        .room-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1) !important;
        }

        .wishlist-btn {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .wishlist-btn:hover {
            background-color: #f8d7da !important;
            color: #dc3545 !important;
        }

        .bg-primary-light {
            background-color: rgba(13, 110, 253, 0.1);
        }

        .room-meta {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .range-slider {
            padding: 0 10px;
        }

        .form-range::-webkit-slider-thumb {
            background: #0d6efd;
            width: 20px;
            height: 20px;
        }

        .form-range::-moz-range-thumb {
            background: #0d6efd;
            width: 20px;
            height: 20px;
        }

        .form-range::-ms-thumb {
            background: #0d6efd;
            width: 20px;
            height: 20px;
        }

        .offer-card {
            transition: all 0.3s ease;
        }

        .offer-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }

        .offer-badge .badge {
            font-size: 1rem;
            padding: 5px 10px;
        }

        .pagination .page-item.active .page-link {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .pagination .page-link {
            color: #0d6efd;
            padding: 8px 16px;
        }

        @media (max-width: 992px) {

            .room-card .col-md-5,
            .room-card .col-md-3 {
                border-left: none !important;
                border-top: 1px solid #dee2e6;
            }
        }

        @media (max-width: 768px) {
            .room-hero {
                text-align: center;
                padding: 60px 0;
            }

            .room-hero .d-flex {
                justify-content: center;
            }

            .room-hero-carousel {
                margin-top: 30px;
            }
        }
    </style>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Hero carousel thumbnail click handler
            const thumbnails = document.querySelectorAll('.room-hero-carousel .thumbnails img');
            const mainImg = document.querySelector('.room-hero-carousel .main-img');

            thumbnails.forEach(thumb => {
                thumb.addEventListener('click', function() {
                    // Update active thumbnail
                    thumbnails.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');

                    // Update main image (in a real implementation, you'd swap the src)
                    mainImg.style.opacity = '0';
                    setTimeout(() => {
                        // This would be the actual image change in production
                        // mainImg.src = this.src;
                        mainImg.style.opacity = '1';
                    }, 300);
                });
            });

            // Price range slider
            const priceRange = document.getElementById('priceRange');
            const priceRangeValue = document.getElementById('priceRangeValue');
            const maxPrice = document.getElementById('maxPrice');

            if (priceRange) {
                // Format number with commas
                function formatNumber(num) {
                    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }

                // Update displayed value
                priceRangeValue.textContent = formatNumber(priceRange.value);

                // Update on slider change
                priceRange.addEventListener('input', function() {
                    priceRangeValue.textContent = formatNumber(this.value);
                    maxPrice.value = this.value;
                });
            }

            // Date validation
            const checkinInput = document.querySelector('input[name="from"]');
            const checkoutInput = document.querySelector('input[name="to"]');

            if (checkinInput && checkoutInput) {
                checkinInput.addEventListener('change', function() {
                    const selectedDate = new Date(this.value);
                    const newMinDate = new Date(selectedDate);
                    newMinDate.setDate(newMinDate.getDate() + 1);

                    checkoutInput.min = newMinDate.toISOString().split('T')[0];

                    // If current checkout is before new min date, update it
                    if (new Date(checkoutInput.value) < newMinDate) {
                        checkoutInput.value = newMinDate.toISOString().split('T')[0];
                    }
                });
            }

            // Wishlist button click handler
            const wishlistBtns = document.querySelectorAll('.wishlist-btn');
            wishlistBtns.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const icon = this.querySelector('i');

                    if (icon.classList.contains('bi-heart-fill')) {
                        icon.classList.remove('bi-heart-fill', 'text-danger');
                        icon.classList.add('bi-heart');
                    } else {
                        icon.classList.remove('bi-heart');
                        icon.classList.add('bi-heart-fill', 'text-danger');
                    }
                });
            });
        });
    </script>
@endsection
