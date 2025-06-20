@extends('dashboard.layout.main')
@section('title')
    <title>Dashboard | Confirmation</title>
@endsection
@section('content')
    <!-- Page Heading -->
    <div class="container">
        <div class="mb-3">
            <link rel="stylesheet" href="/style/progress-indication.css">
            @include('dashboard.order.progressbar')
        </div>

    </div>
    <div class="container mt-3">
        <div class="row justify-content-md-center">
            <div class="col-md-8 mt-2">
                <div class="card shadow-sm border">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row mb-3">
                                    <label for="room_number" class="col-sm-2 col-form-label">Room</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="room_no" name="room_no"
                                            placeholder="col-form-label" value="{{ $room->no }} " readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="room_type" class="col-sm-2 col-form-label">Type</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="room_type" name="room_type"
                                            placeholder="col-form-label" value="{{ $room->type->name }} " readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="room_capacity" class="col-sm-2 col-form-label">Capacity</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="room_capacity" name="room_capacity"
                                            placeholder="col-form-label" value="{{ $room->capacity }} " readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="room_price" class="col-sm-2 col-form-label">Price / Day</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="room_price" name="room_price"
                                            placeholder="col-form-label" value="MAD {{ number_format($room->price) }}"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-sm-12 mt-2">
                                <form method="POST" action="{{ route('payDownPayment') }}">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="check_in" class="col-sm-2 col-form-label">Check In</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" name="customer" value="{{ $customer->id }}">
                                            <input type="hidden" name="room" value="{{ $room->id }}">
                                            <input type="text" class="form-control" id="check_in" name="check_in"
                                                placeholder="col-form-label"
                                                value="{{ Carbon\Carbon::parse($stayfrom)->isoformat('D MMMM Y') }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="check_out" class="col-sm-2 col-form-label">Check Out</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="check_out" name="check_out"
                                                placeholder="col-form-label"
                                                value="{{ Carbon\Carbon::parse($stayuntil)->isoformat('D MMMM Y') }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="how_long" class="col-sm-2 col-form-label">Total Day</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="how_long" name="how_long"
                                                placeholder="col-form-label" value="{{ $dayDifference }} Day" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="total_price" class="col-sm-2 col-form-label">Total Price</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="total_price" name="total_price"
                                                placeholder="col-form-label" value="MAD {{ number_format($total) }} "
                                                readonly>
                                        </div>
                                    </div>
                                    {{-- <div class="row mb-3"> --}}
                                        {{-- <label for="minimum_dp" class="col-sm-2 col-form-label">Minimum DP</label> --}}
                                        {{-- <div class="col-sm-10"> --}}
                                            <input type="hidden" class="form-control" id="minimum_dp" name="minimum_dp"
                                                placeholder="col-form-label"
                                                value="MAD {{ number_format($downPayment) }} " readonly>
                                        {{-- </div> --}}
                                    {{-- </div> --}}
                                    {{-- <div class="row mb-3"> --}}
                                        {{-- <label for="downPayment" class="col-sm-2 col-form-label">Payment</label> --}}
                                        {{-- <div class="col-sm-10"> --}}
                                            <input type="hidden"
                                                class="form-control @error('downPayment') is-invalid @enderror"
                                                id="downPayment" name="downPayment" placeholder="Input payment here"
                                                value="{{ number_format($total) }}">
                                            {{-- @error('downPayment') --}}
                                                {{-- <div class="text-danger mt-1"> --}}
                                                    {{-- {{ $message }} --}}
                                                {{-- </div> --}}
                                            {{-- @enderror --}}
                                        {{-- </div> --}}
                                    {{-- </div> --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-10" id="showPaymentType"></div>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-end">Pay DownPayment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="card shadow-sm">
                    @if ($customer->User)
                        @if ($customer->User->image)
                            <img class="myImages" src="{{ asset('storage/' . $customer->User->image) }}"
                                style="object-fit: cover; height:250px; border-top-right-radius: 0.5rem; border-top-left-radius: 0.5rem;">
                        @else
                            <img class="myImages" src="/img/default-user.jpg"
                                style="object-fit: cover; height:250px; border-top-right-radius: 0.5rem; border-top-left-radius: 0.5rem;">
                        @endif
                    @else
                        <img class="myImages" src="/img/default-user.jpg"
                            style="object-fit: cover; height:250px; border-top-right-radius: 0.5rem; border-top-left-radius: 0.5rem;">
                    @endif

                    <div class="card-body">
                        <table>
                            <tr>
                                <td style="text-align: center; width:50px">
                                    <span>
                                        <i class="fas {{ $customer->jk == 'L' ? 'fa-male' : 'fa-female' }}">
                                        </i>
                                    </span>
                                </td>
                                <td>
                                    {{ $customer->name }}
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; ">
                                    <span>
                                        <i class="fas fa-user-md"></i>
                                    </span>
                                </td>
                                <td>{{ $customer->job }}</td>
                            </tr>
                            <tr>
                                <td style="text-align: center; ">
                                    <span>
                                        <i class="fas fa-birthday-cake"></i>
                                    </span>
                                </td>
                                <td>
                                    {{ $customer->birthdate }}
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center"><i class="fas fa-phone"></i></td>
                                <td>
                                    <span>
                                        @if ($customer->User)
                                            @if ($customer->User->telp)
                                                0{{ $customer->User->telp }}
                                            @else
                                                -
                                            @endif
                                        @else
                                            -
                                        @endif
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; ">
                                    <span>
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                </td>
                                <td>
                                    {{ $customer->address }}
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center"><i class="far fa-id-card"></i></td>
                                <td>
                                    <span>
                                        {{ $customer->nik ?? '-' }}
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/style/js/jquery.js"></script>
    {{-- <script>
        $('#downPayment').keyup(function() {
            $('#showPaymentType').text('Rp. ' + parseFloat($(this).val(), 10).toFixed(2).replace(
                    /(\d)(?=(\d{3})+\.)/g, "$1.")
                .toString());
        });
    </script> --}}
@endsection


<!-- End of Main Content -->
