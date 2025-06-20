@extends('dashboard.layout.main')
@section('title')
    <title>Dashboard | Invoice</title>
    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            #print * {
                visibility: visible;
                zoom: 110%;
            }

            #print {
                position: absolute;
                left: 0;
                top: 0;
            }
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-8 col-12 col-lg-8 order-2 order-md-1 order-lg-1 mt-2">
                <div class="prints" id="print">
                    <div class="card shadow-sm border">
                        <div class="card-body">
                            <div class="col-md-12">

                                <h2 class="mb-5" style="text-align: center">PROOF OF PAYMENT</h2>
                                <h4 class="mt-2">PT. Hotel FRM </h4>
                                <div class="d-flex justify-content-between">
                                    <h6>Cileungsi Kidul, Kec. Cileungsi, <br> Kabupaten Bogor, Jawa Barat 16820</h6>
                                    <h6>INVOICE #{{ $pay->invoice }} &nbsp;</h6>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6>+6285773677367</h6>
                                    <h6 class="mb-5"> {{ Carbon\Carbon::parse($pay->created_at) }}</h6>
                                </div>
                                <p class="mb-4"> Proof of Payment of transaction (INVOICE) with transaction ID
                                    #{{ $pay->Transaction->id }}</p>
                                <table>
                                    <tr class="">
                                        <th>DESCRIPTION</th>
                                    </tr>
                                    <tr>
                                        <td>Name {{ $pay->Transaction->Customer->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Room Reservation {{ $pay->Transaction->Room->no }}</td>
                                    </tr>
                                    <tr>
                                        <th>Price/day IDR {{ number_format($pay->Transaction->Room->price) }}</th>
                                    </tr>
                                </table>
                                <table class="mt-3">

                                    <tr>
                                        <td>Check in
                                            {{ Carbon\Carbon::parse($pay->Transaction->check_in)->isoformat('D MMM Y, h.mm') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Check out
                                            {{ Carbon\Carbon::parse($pay->Transaction->check_out)->isoFormat('D MMM Y, h.mm') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Status {{ $pay->status }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Price IDR {{ number_format($pay->Transaction->getTotalPrice()) }}</th>
                                    </tr>

                                </table>
                                <div class="d-flex justify-content-end">
                                    <table class="mb-5">
                                        <tr>
                                            <th>
                                                <h6>Pay Off IDR {{ number_format($pay->price) }}</h6>
                                            </th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-2 order-1 order-md-2">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1>INVOICE</h1>
                        <div class="d-flex">
                            <h5> #{{ $pay->invoice }} <a href="" onclick="window.print()"><i class="fas fa-print"
                                        style="margin-top: 5px"></i></a> </h5> &nbsp;
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- End of Main Content -->
