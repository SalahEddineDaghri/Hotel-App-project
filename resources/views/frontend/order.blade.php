@extends('frontend.inc.main')
@section('title')
    <title>Bela Hotel | ORDER NOW</title>
@endsection

@section('content')
    <div class="container" style="margin-top:50px;margin-bottom:100px">
        <div class="row justify-content-md-center">
            <div class="col-md-8 mt-2">
                <div class="card shadow border-0">
                    <div class="container">
                        <div class="card-body">
                            <div class="d-flex">
                                <h4 class="mb-3">Order Details</h4>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:30px">
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row mb-3">
                                            <label for="room_number" class="col-sm-2 col-form-label">Room</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="room_no" name="room_no"
                                                    placeholder="col-form-label" value="{{ $room->no }} " disabled>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="room_type" class="col-sm-2 col-form-label">Type</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="room_type" name="room_type"
                                                    placeholder="col-form-label" value="{{ $room->type->name }} " disabled>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="room_capacity" class="col-sm-2 col-form-label">Capacity</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="room_capacity"
                                                    name="room_capacity" placeholder="col-form-label"
                                                    value="{{ $room->capacity }} " disabled>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="room_price" class="col-sm-2 col-form-label">Price / Day</label>
                                            <div class="col-sm-10">

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
                                                <input type="text" class="form-control" id="room_price" name="room_price"
                                                    placeholder="col-form-label"
                                                    value=" {{ $symbol }}{{ number_format($price, 2) }}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="col-sm-12 mt-2">
                                        <form method="POST" action="/order/post">
                                            @csrf
                                            <input type="hidden" name="customer" value="{{ $customer->id }}">
                                            <input type="hidden" name="room" value="{{ $room->id }}">

                                            <div class="row mb-3">
                                                <label for="check_in" class="col-sm-2 col-form-label">Check In</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="check_in"
                                                        name="check_in" placeholder="col-form-label"
                                                        value="{{ Carbon\Carbon::parse($stayfrom)->isoformat('D MMMM Y') }}"
                                                        disabled>
                                                    <input type="hidden" name="check_in" value="{{ $stayfrom }}">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="check_out" class="col-sm-2 col-form-label">Check Out</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="check_out"
                                                        name="check_out" placeholder="col-form-label"
                                                        value="{{ Carbon\Carbon::parse($stayuntil)->isoformat('D MMMM Y') }}"
                                                        disabled>
                                                    <input type="hidden" name="check_out" value="{{ $stayuntil }}">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="how_long" class="col-sm-2 col-form-label">Total Day</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="how_long"
                                                        name="how_long" placeholder="col-form-label"
                                                        value="{{ $dayDifference }} Day" disabled>
                                                    <input type="hidden" name="how_long" value="{{ $dayDifference }}">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="total_price" class="col-sm-2 col-form-label">Total
                                                    Price</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="total_price"
                                                        name="total_price" placeholder="col-form-label"
                                                        value="MAD {{ number_format($total) }} " disabled>
                                                    <input type="hidden" name="total_price"
                                                        value="{{ $total }}">
                                                    <input type="hidden" name="price" value="{{ $room->price }}">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="paymentmethod" class="col-sm-2 col-form-label">Payment
                                                    Method</label>
                                                <div class="col-sm-10">
                                                    <select name="payment_method_id" class="form-select mt-1"
                                                        id="paymentmethod">
                                                        @foreach ($paymentmet as $pay)
                                                            <option value="{{ $pay->id }}">{{ $pay->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <hr>

                                            <div class="row mb-4" style="margin-bottom:50px">
                                                <label for="NIK" class="col-sm-2 col-form-label">NIK</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="NIK"
                                                        placeholder="col-form-label"
                                                        value="{{ $customer->nik ?? '-' }}"disabled>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary float-end">Pay
                                                DownPayment</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <div class="col-md-4 mt-2">
                <div class="card shadow border-0">
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
                                    {{ Carbon\Carbon::parse($customer->birthdate)->isoformat('D MMM YYYY') }}
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
