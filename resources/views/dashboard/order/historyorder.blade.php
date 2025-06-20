@extends('dashboard.layout.main')
@section('title')
<title>Dashboard | History Order</title>
@endsection
@section('content')

                    <!-- Content Row -->
                    <div class="container">
                        <div class="card">
                            <div class="card-header">
                                <h5> Status <span style="color: green"> Active </span> </h5>
                            </div>
                                <div class="card-body">
                                    <div class="col-md-auto">

                                        <table class="table table-striped table-bordered table-responsive" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th width="4%">#</th>
                                                    <th>Customer</th>
                                                    <th>Room</th>
                                                    <th>Check in</th>
                                                    <th>Check out</th>
                                                    <th>Days</th>
                                                    <th>Total Price</th>
                                                    <th>Paid Off</th>
                                                    <th>Debt</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($transaction as $t)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $t->Customer->name ?? '-' }}</td>
                                                    <td>{{ $t->Room->no}}</td>
                                                    <td>{{ $t->check_in->isoFormat('D MMM Y') }}</td>
                                                    <td>{{ $t->check_out->isoFormat('D MMM Y') }}</td>
                                                    <td>{{ $t->check_in->diffindays($t->check_out) }} Day</td>
                                                    <td>Rp.{{ number_format($t->getTotalPrice()) }}</td>
                                                    <td>Rp. {{ number_format($t->getTotalPayment()) }}</td>
                                                    <td>Rp. {{ number_format($t->getTotalPrice() - $t->getTotalPayment()) }}</td>
                                                    <td> @php
                                                        $insufficient = $t->getTotalPrice() - $t->getTotalPayment();
                                                 @endphp
                                                 <a @if($insufficient == 0)
                                                 style="pointer-events: none;
                                                 cursor: default;color:gray"
                                             @endif href="/dashboard/order/{{ $t->id }}/pay-debt"><i class="fas fa-money-bill-wave"></i></a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th width="4%">#</th>
                                                    <th>Customer</th>
                                                    <th>Room</th>
                                                    <th>Check in</th>
                                                    <th>Check out</th>
                                                    <th>Days</th>
                                                    <th>Total Price</th>
                                                    <th>Paid Off</th>
                                                    <th>Debt</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                            </div>
                    </div>
                </div>
                    <div class="container mt-4">
                        <div class="card">
                            <div class="card-header d-flex">
                                <h5> Status <span style="color: red">Expired </span> </h5>
                                    <h5 style="margin-left:10px;" class="font-italic">before {{ $p->isoformat('D MMM Y') }}</h5>
                            </div>
                                <div class="card-body">
                                    <div class="col-md-auto">

                                        <table class="table table-striped table-bordered table-responsive" id="myTable1">
                                            <thead>
                                                <tr>
                                                    <th width="4%">#</th>
                                                    <th>Customer</th>
                                                    <th>Room</th>
                                                    <th>Check in</th>
                                                    <th>Check out</th>
                                                    <th>Days</th>
                                                    <th>Total Price</th>
                                                    <th>Paid Off</th>
                                                    <th>Debt</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($transactionexpired as $t)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $t->Customer->name ?? '-' }}</td>
                                                    <td>{{ $t->Room->no}}</td>
                                                    <td>{{ $t->check_in->isoFormat('D MMM Y') }}</td>
                                                    <td>{{ $t->check_out->isoFormat('D MMM Y') }}</td>
                                                    <td>{{ $t->check_in->diffindays($t->check_out) }} Day</td>
                                                    <td>{{ number_format($t->getTotalPrice()) }} MAD</td>
                                                    <td>{{ number_format($t->getTotalPayment()) }} MAD</td>
                                                    <td>{{ number_format($t->getTotalPrice() - $t->getTotalPayment()) }} MAD</td>
                                                    <td> @php
                                                        $insufficient = $t->getTotalPrice() - $t->getTotalPayment();
                                                 @endphp
                                                 <a @if($insufficient == 0)
                                                 style="pointer-events: none;
                                                 cursor: default;color:gray"
                                             @endif href="/dashboard/order/{{ $t->id }}/pay-debt"><i class="fas fa-money-bill-wave"></i></a></td>
                                                </tr>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Customer</th>
                                                    <th>Room</th>
                                                    <th>Check in</th>
                                                    <th>Check out</th>
                                                    <th>Days</th>
                                                    <th>Total Price</th>
                                                    <th>Paid Off</th>
                                                    <th>Debt</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                            </div>
                    </div>


                </div>

@endsection
            <!-- End of Main Content -->
