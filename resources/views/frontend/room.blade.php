@extends('frontend.inc.main')
@section('title')
    <title>Bela Hotel | ROOM #{{ $room->no }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
@endsection

@section('css')
    <style>
        .room-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/nyoba/images/carousel/1.png');
            background-size: cover;
            background-position: center;
            padding: 100px 0;
            color: white;
            margin-bottom: 50px;
        }

        .swiper {
            height: 500px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .image-swipper {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .btn-book {
            background: #0d6efd;
            color: white;
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 30px;
            transition: all 0.3s ease;
        }

        .btn-book:hover {
            background: #0b5ed7;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(13, 110, 253, 0.3);
        }

        .policy-card {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .policy-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .facility-icon {
            font-size: 24px;
            color: #0d6efd;
            margin-right: 15px;
        }

        .price-highlight {
            font-size: 28px;
            font-weight: 700;
            color: #198754;
        }

        @media (max-width: 768px) {
            .swiper {
                height: 300px;
            }

            .room-hero {
                padding: 60px 0;
            }
        }

        .room-hero {
            background-attachment: fixed;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.6);
        }
    </style>
@endsection

@section('content')
    <!-- Booking Modal -->
    <div class="modal fade" id="checkin" tabindex="-1" aria-labelledby="checkinLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="checkinLabel">Select Your Dates</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/order">
                        @csrf
                        <input type="hidden" name="customer" value="{{ $customer }}">
                        <input type="hidden" name="room" value="{{ $room->id }}">
                        <div class="">
                            <label class="form-label">Check-In Date</label>
                            <div class="input-group datepicker-group">
                                <span class="input-group-text">
                                    <i class="bi bi-calendar-check"></i>
                                </span>
                                <input type="date" name="from" id="from" class="form-control"
                                    min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Check-Out Date</label>
                            <div class="input-group datepicker-group">
                                <span class="input-group-text">
                                    <i class="bi bi-calendar-x"></i>
                                </span>
                                <input type="date" name="to" id="to" class="form-control"
                                    min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                    value="{{ date('Y-m-d', strtotime('+1 day')) }}">
                            </div>
                        </div>
                        <br>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Check Availability</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Room Hero Section -->
    <section class="room-hero text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">{{ $room->type->name }} #{{ $room->no }}</h1>
            <p class="lead">Experience Moroccan luxury in the heart of Fes</p>
        </div>
    </section>

    <!-- Room Gallery -->
    <div class="container mb-5">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                @if ($room->images->count() > 0)
                    @foreach ($room->images as $room_images)
                        <div class="swiper-slide">
                            {{-- <img src="{{ asset('storage/images/rooms/' . $room_images->image) }}" class="image-swipper d-block"
                                alt="Room Image"> --}}
                            <img src="/storage/{{ $room_images->image }}" class="img-fluid rounded-start h-100 w-100"
                                style="object-fit: cover;" alt="Room Image">
                        </div>
                    @endforeach
                @else
                    <div class="swiper-slide">
                        <img src="/nyoba/images/carousel/1.png" class="image-swipper d-block" alt="Room Image">
                    </div>
                @endif
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>

    <!-- Room Details -->
    <div class="container mb-5">
        <div class="row align-items-center mb-4">
            <div class="col-md-8">
                <h2 class="fw-bold">{{ $room->type->name }} #{{ $room->no }}</h2>
                <p class="text-muted">Max. {{ $room->capacity }} Guests | Located in Fes Medina</p>
            </div>
            <div class="col-md-4 text-md-end">
                {{-- <h3 class="price-highlight">MAD {{ number_format($room->price) }}</h3> --}}

                @php
                    $currency = session('currency', 'MAD');
                    $rate = config('currency.rates')[$currency] ?? 1;
                    $price = $room->price * $rate;
                    $symbol = match ($currency) {
                        'USD' => '$',
                        'EUR' => '€',
                        default => 'MAD ',
                    };
                @endphp
                <h3 class="price-highlight">{{ $symbol }}{{ number_format($price, 2) }}</h3>
                <p class="text-muted">per night</p>
            </div>
        </div>

        <!-- Booking Button -->
        <div class="d-flex justify-content-end mb-5">
            @if ($request->from)
                <form action="/order" method="POST">
                    @csrf
                    <input type="hidden" name="customer" value="{{ $customer }}">
                    <input type="hidden" name="room" value="{{ $room->id }}">
                    <input type="hidden" name="from" value="{{ $request->from }}">
                    <input type="hidden" name="to" value="{{ $request->to }}">
                    <button class="btn btn-primary w-100">
                        <i class="fas fa-calendar-alt me-2"></i>Book Now
                    </button>

                </form>
            @else
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#checkin">Book
                    Now</button>
            @endif
        </div>

        <hr class="my-5">

        <!-- Room Policies -->
        <div class="row">
            <div class="col-lg-6">
                <div class="policy-card">
                    <h4 class="mb-4"><i class="fas fa-calendar-check facility-icon"></i> Check-in/Check-out Policy</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2"><strong>Check-in:</strong> 2:00 PM</li>
                        <li class="mb-2"><strong>Check-out:</strong> 12:00 PM</li>
                        <li><strong>Late check-out:</strong> MAD 100/hour after 12:00 PM</li>
                    </ul>
                </div>

                <div class="policy-card">
                    <h4 class="mb-4"><i class="fas fa-smoking-ban facility-icon"></i> Smoking Policy</h4>
                    <p>Smoking is prohibited in all rooms. We provide traditional Moroccan smoking lounges for our guests.
                    </p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="policy-card">
                    <h4 class="mb-4"><i class="fas fa-utensils facility-icon"></i> Dining</h4>
                    <p>Enjoy our complimentary Moroccan breakfast with traditional mint tea and local pastries.</p>
                </div>

                <div class="policy-card">
                    <h4 class="mb-4"><i class="fas fa-wifi facility-icon"></i> Connectivity</h4>
                    <p>Stay connected with our high-speed free WiFi available throughout the riad.</p>
                </div>

                <div class="policy-card">
                    <h4 class="mb-4"><i class="fas fa-swimming-pool facility-icon"></i> Traditional Hammam</h4>
                    <p>Relax in our authentic Moroccan spa with steam bath and massage services.</p>
                </div>
            </div>
        </div>


        <!-- Location -->

    </div>
@endsection

@push('scripts')
    <script>
        // Initialize Swiper
        const swiper = new Swiper('.swiper-container', {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        document.getElementById('check_out').addEventListener('change', function() {
            const from = new Date(document.getElementById('check_in').value);
            const to = new Date(this.value);
            const nights = Math.ceil((to - from) / (1000 * 60 * 60 * 24));
            const pricePerNight = {{ $room->price }};
            const total = nights * pricePerNight;
            if (!isNaN(total)) {
                alert('Total: MAD ' + total);
            }
        });

        // Set minimum date for check-in
        document.getElementById('check_in').min = new Date().toISOString().split('T')[0];

        // Update check-out min date when check-in changes
        document.getElementById('check_in').addEventListener('change', function() {
            document.getElementById('check_out').min = this.value;
        });
    </script>



    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            let fromDate = null;
            let toDate = null;

            // Format weekends
            const colorWeekend = function(date, dayElem) {
                const day = date.getDay(); // 0 = Sunday, 6 = Saturday
                if (day === 0 || day === 6) {
                    dayElem.style.backgroundColor = '#ffe8e8'; // لون الويكاند
                    dayElem.style.borderRadius = '6px';
                }
            };

            // Initialize check-in picker
            flatpickr("#from", {
                minDate: "today",
                dateFormat: "Y-m-d",
                onChange: function(selectedDates, dateStr, instance) {
                    fromDate = selectedDates[0];
                    // Set minDate of check-out to +1 day from check-in
                    toPicker.set('minDate', new Date(fromDate.getTime() + 86400000));
                },
                onDayCreate: function(dObj, dStr, fp, dayElem) {
                    colorWeekend(dayElem.dateObj, dayElem);
                }
            });

            // Initialize check-out picker
            const toPicker = flatpickr("#to", {
                minDate: new Date().fp_incr(1),
                dateFormat: "Y-m-d",
                onChange: function(selectedDates, dateStr, instance) {
                    toDate = selectedDates[0];
                },
                onDayCreate: function(dObj, dStr, fp, dayElem) {
                    colorWeekend(dayElem.dateObj, dayElem);
                }
            });

            // Validate on submit
            document.querySelector('.availability-form').addEventListener('submit', function(e) {
                if (!fromDate || !toDate || toDate <= fromDate) {
                    e.preventDefault();
                    alert('Check-out date must be after Check-in date.');
                    document.getElementById('to').focus();
                }
            });
        });
    </script> --}}

    <script>
document.addEventListener('DOMContentLoaded', function() {
    const fromInput = document.getElementById('from');
    const toInput = document.getElementById('to');
    
    // Calcul des dates limites
    const today = new Date();
    const endOfCurrentMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);
    const endOfNextMonth = new Date(today.getFullYear(), today.getMonth() + 2, 0);
    
    // Fonction pour formater la date en YYYY-MM-DD
    function formatDate(date) {
        const d = new Date(date);
        let month = '' + (d.getMonth() + 1);
        let day = '' + d.getDate();
        const year = d.getFullYear();
        
        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;
        
        return [year, month, day].join('-');
    }
    
    // Définir le max date pour le check-in (fin du mois prochain)
    fromInput.max = formatDate(endOfNextMonth);
    
    // Définir le max date pour le check-out (fin du mois prochain)
    toInput.max = formatDate(endOfNextMonth);
    
    // Écouteur pour le changement de date d'arrivée
    fromInput.addEventListener('change', function() {
        const selectedDate = new Date(this.value);
        const nextDay = new Date(selectedDate);
        nextDay.setDate(nextDay.getDate() + 1);
        
        // Mettre à jour le min et la valeur par défaut du check-out
        toInput.min = formatDate(nextDay);
        
        // Si la date de départ actuelle est invalide, la mettre à jour
        if (new Date(toInput.value) < nextDay) {
            toInput.value = formatDate(nextDay);
        }
        
        // Si la date sélectionnée est dans le mois en cours, limiter le check-out à la fin du mois
        if (selectedDate.getMonth() === today.getMonth()) {
            toInput.max = formatDate(endOfCurrentMonth);
        } else {
            toInput.max = formatDate(endOfNextMonth);
        }
    });
    
    // Validation du formulaire
    document.querySelector('form').addEventListener('submit', function(e) {
        const checkin = new Date(fromInput.value);
        const checkout = new Date(toInput.value);
        
        if (checkout <= checkin) {
            e.preventDefault();
            alert('La date de départ doit être après la date d\'arrivée');
            toInput.focus();
        }
    });
});
</script>

@endpush
