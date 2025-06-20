@extends('frontend.inc.main')

@section('title')
    <title>Bela Hotel | Proof of payment</title>
@endsection

@section('content')
    <div class="container py-5">
        <div class="row g-4">

            <!-- Order Details -->
            <div class="col-lg-6">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <h4 class="mb-4 fw-bold text-primary">Order Details <span
                                class="text-muted">#{{ $pay->invoice }}</span></h4>

                        <!-- Room Info -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Room</label>
                            <input type="text" class="form-control" value="{{ $t->room->no }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Type</label>
                            <input type="text" class="form-control" value="{{ $t->room->type->name }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Capacity</label>
                            <input type="text" class="form-control" value="{{ $t->room->capacity }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Price / Day</label>
                            <input type="text" class="form-control" value="MAD {{ number_format($t->room->price) }}"
                                disabled>
                        </div>

                        <hr>

                        <!-- Booking Info -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Check In</label>
                            <input type="text" class="form-control"
                                value="{{ Carbon\Carbon::parse($t->check_in)->isoformat('D MMMM Y') }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Check Out</label>
                            <input type="text" class="form-control"
                                value="{{ Carbon\Carbon::parse($t->check_out)->isoformat('D MMMM Y') }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Total Day</label>
                            <input type="text" class="form-control"
                                value="{{ $t->check_in->diffindays($t->check_out) }} Day" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Total Price</label>
                            <input type="text" class="form-control" value="MAD {{ number_format($price) }}" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Payment Method</label>
                            <input type="text" class="form-control" value="{{ $pay->Methode->nama }}" disabled>
                        </div>

                    </div>

                </div>
            </div>

            <!-- Payment Proof Upload -->

            {{-- <div class="d-flex gap-3 mt-4">
                <a href="{{ route('paypal.payment') }}" class="btn btn-outline-primary">
                    <i class="bi bi-paypal"></i> PayPal
                </a>

                <form action="/stripe/checkout" method="GET">
                    <button class="btn btn-dark">
                        <i class="bi bi-credit-card-2-front-fill"></i> Card (Visa/MasterCard)
                    </button>
                </form>
            </div> --}}




            <div class="col-lg-6">
                <div class="card shadow border-0">
                    <div class="card-body">

                        <h6 class="mb-4 fw-bold text-success">Pay with Card (Visa / MasterCard)</h6>
                        <form action="{{ route('checkout') }}" method="POST">
                            @csrf
                            <input type="hidden" name="amount" value="{{ (int) $price }}">
                            <button class="btn btn-dark">
                                <i class="bi bi-credit-card-2-front-fill"></i> Pay with Card (Visa / MasterCard)
                            </button>
                        </form>
                    </div>
                </div>
                <br>
                <div class="card shadow border-0">
                    <div class="card-body">
                        <h4 class="mb-4 fw-bold text-success">Send Proof of Payment</h4>

                        <!-- Modern Payment Methods -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Transfer to : 1012304567890123</label>
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-credit-card-2-front-fill fs-4 text-primary"></i>
                                <h5 class="mb-0">{{ $pay->Methode->no_rek }}</h5>
                            </div>
                            <small class="text-muted">Support: Bank Transfer, E-wallet, QRIS</small>
                        </div>

                        <form action="/bayar" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="image" class="form-label">Upload Proof of Payment<small
                                        class="text-muted">(Max 3MB)</small></label>
                                <input required type="file" class="form-control" name="image" id="image">
                            </div>

                            <input type="hidden" name="id" value="{{ $pay->id }}">

                            <div class="d-grid">
                                <button class="btn btn-success" type="submit"><i class="bi bi-upload me-1"></i>Send
                                    Proof</button>
                            </div>
                        </form>

                        <!-- Optional: QRIS support -->
                        @if ($pay->Methode->qris_image)
                            <hr>
                            <div class="text-center">
                                <p class="fw-semibold">Or Scan QRIS:</p>
                                <img src="{{ asset('storage/qris/' . $pay->Methode->qris_image) }}" alt="QRIS"
                                    class="img-fluid" style="max-width: 250px;">
                            </div>
                        @endif

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
