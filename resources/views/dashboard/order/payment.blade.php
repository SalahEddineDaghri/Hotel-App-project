@extends('dashboard.layout.main')
@section('title')
    <title>Dashboard | Payment</title>
@endsection
@section('content')
    <!-- Page Heading -->

    <div class="container mt-3">
        <div class="row justify-content-md-center">
            <div class="col-md-8 mt-2">
                <div class="card shadow border-0">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row mb-3">
                                    <label for="room_number" class="col-sm-2 col-form-label">Room</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="room_no" name="room_no"
                                            placeholder="col-form-label" value="{{ $transaction->Room->no }} " readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="check_in" class="col-sm-2 col-form-label">Check In</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="check_in" name="check_in"
                                            placeholder="col-form-label"
                                            value="{{ Carbon\Carbon::parse($transaction->check_in)->isoformat('D MMMM Y') }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="check_out" class="col-sm-2 col-form-label">Check Out</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="check_out" name="check_out"
                                            placeholder="col-form-label"
                                            value="{{ Carbon\Carbon::parse($transaction->check_out)->isoformat('D MMMM Y') }}"
                                            readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="room_price" class="col-sm-2 col-form-label">Room Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="room_price" name="room_price"
                                            placeholder="col-form-label"
                                            value="MAD {{ number_format($transaction->Room->price) }} " readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="daycount" class="col-sm-2 col-form-label">Days Count</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="daycount" name="daycount"
                                            placeholder="col-form-label"
                                            value="{{ $transaction->getDateDifferenceWithPlural($transaction->check_in, $transaction->check_out) }} Day"
                                            readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="total_price" class="col-sm-2 col-form-label">Total Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="total_price"
                                            class="form-control"value="MAD {{ number_format($transaction->getTotalPrice($transaction->room->price, $transaction->check_in, $transaction->check_out)) }}"
                                            readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Paidoff" class="col-sm-2 col-form-label">Paid Off</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="Paidoff"
                                            class="form-control"value="MAD {{ number_format($transaction->getTotalPayment()) }}"
                                            readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Paidoff" class="col-sm-2 col-form-label">Insufficient</label>
                                    {{-- <div class="col-sm-10"> --}}
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"
                                            value="MAD {{ number_Format($transaction->getTotalPrice($transaction->Room->price, $transaction->check_in, $transaction->check_out) - $transaction->getTotalPayment()) }}"
                                            readonly>
                                    </div>
                                    {{-- </div>  --}}


                                </div>
                                <hr>
                                <div class="col-sm-12 mt-2">
                                    <form method="POST" action="{{ route('paydebt') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $transaction->id }}">
                                        <div class="row mb-3">
                                            <label for="payment" class="col-sm-2 col-form-label">Payment</label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control @error('payment') is-invalid @enderror"
                                                    id="payment" name="payment" placeholder="Input payment here"
                                                    value="{{ old('payment') }}">
                                                @error('payment')
                                                    <div class="text-danger mt-1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-10" id="showPaymentType"></div>
                                        </div>
                                        <button type="submit" class="btn btn-primary float-end">Pay </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="card shadow border-0">
                    {{-- {{ dd($transaction->User->image) }} --}}
                    @if ($transaction->User->image != null)
                        <img src="{{ asset('storage/' . $transaction->User->image) }}"
                            style="border-top-right-radius: 0.5rem; border-top-left-radius: 0.5rem">
                    @else
                        <img src="/img/default-user.jpg"
                            style="border-top-right-radius: 0.5rem; border-top-left-radius: 0.5rem">
                    @endif
                    <div class="card-body">
                        <table>
                            <tr>
                                <td style="text-align: center; width:50px">
                                    <span>
                                        <i
                                            class="fas {{ $transaction->Customer->gender == 'Male' ? 'fa-male' : 'fa-female' }}">
                                        </i>
                                    </span>
                                </td>
                                <td>
                                    {{ $transaction->Customer->name }}
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; ">
                                    <span>
                                        <i class="fas fa-user-md"></i>
                                    </span>
                                </td>
                                <td>{{ $transaction->Customer->job }}</td>
                            </tr>
                            <tr>
                                <td style="text-align: center; ">
                                    <span>
                                        <i class="fas fa-birthday-cake"></i>
                                    </span>
                                </td>
                                <td>
                                    {{ $transaction->Customer->birthdate }}
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; ">
                                    <span>
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                </td>
                                <td>
                                    {{ $transaction->Customer->address }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="/style/js/jquery.js"></script>
        {{-- <script>
            $('#payment').keyup(function() {
                $('#showPaymentType').text('Rp. ' + parseFloat($(this).val(), 10).toFixed(2).replace(
                        /(\d)(?=(\d{3})+\.)/g, "$1.")
                    .toString());
            });
        </script> --}}
    @endsection


    <!-- End of Main Content -->
