<!-- ======= Clean Rooms Section ======= -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold h-font">Our Rooms & Suites</h2>
            <p class="lead text-muted">Experience luxury accommodations designed for your comfort</p>
        </div>
        @php
            $i = 1;
        @endphp
        <div class="row g-4">
            @foreach ($room as $r)
                @php
                    $i = $i + 5;
                @endphp
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        @if ($r->images->count() > 0)
                            {{-- {{dd($r->images->first()->image)}} --}}
                            <img src="/storage/{{ $r->images->first()->image }}" class="card-img-top"
                                alt="{{ $r->type->name }}">
                        @else
                            <img src="/nyoba/images/rooms/1.jpg" class="card-img-top" alt="Room Image">
                        @endif

                        <div class="card-body position-relative">
                            <div class="position-absolute top-0 start-0 m-2">

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
                                <span class="badge bg-primary fs-6">{{ number_format($price, 2) }} {{ $symbol }}
                                    <small>/night</small></span>


                                {{-- <h3 class="price-highlight">{{ $symbol }}{{ number_format($price, 2) }}</h3> --}}
                            </div>
                            <br>

                            <h5 class="card-title mt-3">{{ $r->type->name }} #{{ $r->no }}</h5>

                            <div class="mb-3 text-muted small">
                                <i class="bi bi-people me-1"></i> {{ $r->capacity }} Guests &nbsp; &nbsp;
                                {{-- <i class="bi bi-square me-1"></i> {{ $r->size }} m² --}}
                            </div>

                            <p class="card-text text-muted">{{ Str::limit($r->description, 100) }}</p>

                            <h6 class="mt-4">Room Features</h6>
                            <div class="d-flex flex-wrap gap-2 mb-3">
                                @if ($r->capacity <= 5)
                                    <span class="badge bg-light text-dark"><i class="bi bi-door-closed me-1"></i> 2
                                        Rooms</span>
                                    <span class="badge bg-light text-dark"><i class="bi bi-brightness-high me-1"></i>
                                        Balcony</span>
                                    <span class="badge bg-light text-dark"><i class="bi bi-wifi me-1"></i> Free
                                        WiFi</span>
                                @elseif ($r->capacity <= 10)
                                    <span class="badge bg-light text-dark"><i class="bi bi-door-closed me-1"></i> 3
                                        Rooms</span>
                                    <span class="badge bg-light text-dark"><i class="bi bi-brightness-high me-1"></i> 2
                                        Balconies</span>
                                    <span class="badge bg-light text-dark"><i class="bi bi-wifi me-1"></i> Premium
                                        WiFi</span>
                                @else
                                    <span class="badge bg-light text-dark"><i class="bi bi-door-closed me-1"></i> 4
                                        Rooms</span>
                                    <span class="badge bg-light text-dark"><i class="bi bi-brightness-high me-1"></i> 2
                                        Balconies</span>
                                    <span class="badge bg-light text-dark"><i class="bi bi-wifi me-1"></i> Ultra
                                        WiFi</span>
                                @endif
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="/rooms/{{ $r->no }}" class="btn btn-sm btn-outline-primary w-50 me-2">
                                    <i class="bi bi-info-circle me-1"></i> Details
                                </a>
                                <a href="/rooms/{{ $r->no }}" class="btn btn-sm btn-primary w-50">
                                    <i class="bi bi-calendar-check me-1"></i> Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-5">
            <a href="/rooms" class="btn btn-primary btn-lg px-5">
                <i class="bi bi-grid me-2"></i> View All Rooms
            </a>
        </div>
    </div>
</section>
