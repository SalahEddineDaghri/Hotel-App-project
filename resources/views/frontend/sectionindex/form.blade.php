<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <style>
        .booking-availability-wrapper {
            margin-top: -80px;
            position: relative;
            z-index: 10;
        }

        .booking-availability-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .form-title {
            color: #2c3e50;
            font-weight: 700;
            position: relative;
            padding-bottom: 10px;
        }

        .form-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: #e74c3c;
        }

        .datepicker-group .input-group-text {
            background: white;
            border-right: none;
            color: #3498db;
        }

        .datepicker-group .form-control {
            border-left: none;
        }

        .promo-banner {
            background: linear-gradient(135deg, #2c3e50, #4a6491);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .promo-badge .badge {
            background: #e74c3c;
            font-size: 0.8rem;
            padding: 5px 15px;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .promo-title {
            font-weight: 600;
        }

        .promo-text {
            font-size: 0.95rem;
            opacity: 0.9;
        }

        .code-display {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            padding: 5px 15px;
            border-radius: 4px;
            font-family: monospace;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .check-availability-btn {
            padding: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .check-availability-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 992px) {
            .booking-availability-wrapper {
                margin-top: 0;
            }
        }
    </style>
</head>
<div class="container booking-availability-wrapper">
    <div class="booking-availability-card">
        <div class="row g-0 align-items-center">
            <div class="booking-form p-4">
                <h3 class="form-title mb-4">{{ __('messages.Find Your Perfect Stay') }}</h3>
                <form method="get" action="/rooms" class="availability-form">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">{{ __('messages.Check-In Date') }}</label>
                            <div class="input-group datepicker-group">
                                <span class="input-group-text">
                                    <i class="bi bi-calendar-check"></i>
                                </span>
                                <input type="date" name="from" id="from" class="form-control"
                                    min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">{{ __('messages.Check-Out Date') }}</label>
                            <div class="input-group datepicker-group">
                                <span class="input-group-text">
                                    <i class="bi bi-calendar-x"></i>
                                </span>
                                <input type="date" name="to" id="to" class="form-control"
                                    min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                    value="{{ date('Y-m-d', strtotime('+1 day')) }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">{{ __('messages.Adults') }}</label>
                            <select class="form-select" name="adults">
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="4">4</option>
                                <option value="4">6</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">{{ __('messages.Children') }}</label>
                            <select class="form-select" name="children">
                                <option value="0" selected>0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="2">3</option>
                                <option value="2">4</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100 check-availability-btn">
                                <i class="bi bi-search me-2"></i> {{ __('messages.Check Availability') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Flatpickr
        const checkinInput = flatpickr("#from", {
            minDate: "today",
            defaultDate: "today",
            onChange: function(selectedDates, dateStr) {
                // Set checkout min date to day after checkin
                checkoutInput.set("minDate", new Date(selectedDates[0].getTime() + 86400000));

                // If current checkout is before new min date, update it
                if (checkoutInput.selectedDates[0] <= selectedDates[0]) {
                    checkoutInput.setDate(new Date(selectedDates[0].getTime() + 86400000));
                }
            }
        });

        const checkoutInput = flatpickr("#to", {
            minDate: new Date().fp_incr(1), // Tomorrow
            defaultDate: new Date().fp_incr(1)
        });

        // Form validation
        document.querySelector('.availability-form').addEventListener('submit', function(e) {
            const checkin = checkinInput.selectedDates[0];
            const checkout = checkoutInput.selectedDates[0];

            if (!checkin || !checkout) {
                e.preventDefault();
                // alert('Please select both check-in and check-out dates');
                return;
            }

            if (checkout <= checkin) {
                e.preventDefault();
                // alert('Check-out date must be after check-in date');
                checkoutInput.open();
            }
        });
    });
</script>
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Set minimum dates
        const today = new Date();
        const tomorrow = new Date(today);
        tomorrow.setDate(tomorrow.getDate() + 1);

        // Format dates for input fields
        function formatDate(date) {
            return date.toISOString().split('T')[0];
        }

        // Initialize date inputs
        const checkinInput = document.getElementById('from');
        const checkoutInput = document.getElementById('to');

        checkinInput.min = formatDate(today);
        checkinInput.value = formatDate(today);

        checkoutInput.min = formatDate(tomorrow);
        checkoutInput.value = formatDate(tomorrow);

        // Update checkout min date when checkin changes
        checkinInput.addEventListener('change', function() {
            const selectedDate = new Date(this.value);
            const newMinDate = new Date(selectedDate);
            newMinDate.setDate(newMinDate.getDate() + 1);

            checkoutInput.min = formatDate(newMinDate);

            // If current checkout is before new min date, update it
            if (new Date(checkoutInput.value) < newMinDate) {
                checkoutInput.value = formatDate(newMinDate);
            }
        });

        // Form validation
        document.querySelector('.availability-form').addEventListener('submit', function(e) {
            const checkin = new Date(checkinInput.value);
            const checkout = new Date(checkoutInput.value);

            if (checkout <= checkin) {
                e.preventDefault();
                alert('Check-out date must be after check-in date');
                checkoutInput.focus();
            }
        });
    });
</script> --}}
