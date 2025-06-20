@extends('dashboard.layout.main')
@section('title')
    <title>
        Dashboard | All Payment</title>
@endsection
@section('content')
    <!-- Content Row -->
    <div class="container-fluid">
        {{-- <div class="card shadow border-0 mb-4">
            <div class="card-header">
                <h5> Payment Status <span style="color:red">Pending</span></h5>
            </div>
            <div class="card-body">
                <div class="col-md-auto">

                    <table class="table table-striped table-bordered table-responsive" id="myTable">
                        <thead>
                            <tr>
                                <th width="4%">#</th>
                                <th class="text-center">ID</th>
                                <th class="text-center">Customer</th>
                                <th class="text-center">Like</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Proof</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pay1 as $p)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $p->id }}</td>
                                    <td class="text-center">{{ $p->Customer->name }}</td>
                                    <td class="text-center">{{ $p->Transaction->Room->no }}</td>
                                    <td class="text-center">{{ number_format($p->price) }} MAD </td>
                                    <td class="text-center">{{ $p->created_at->isoformat('D MMMM Y') }}</td>
                                    <td class="text-center">
                                        @if ($p->image)
                                            <a href="{{ asset('storage/' . $p->image) }}">See the Evidence</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($p->status == 'Pending' and $p->image == null)
                                           Wait for Proof of Payment
                                        @elseif ($p->status == 'Pending' and $p->image != null)
                                            <form action="/dashboard/payment/confirm" method="post" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $p->id }}">
                                                <button class="badge bg-primary border-0"
                                                    onclick="return confirm('Are you sure to Confirm this?')">
                                                    <span>Confirmation</span>
                                                </button>
                                            </form>
                                            <form action="/dashboard/payment/tolak" method="post" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $p->id }}">
                                                <button class="badge bg-danger border-0"
                                                    onclick="return confirm(' Are you sure to Reject this?')">
                                                    <span> Reject </span>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="4%">#</th>
                                <th class="text-center">ID</th>
                                <th class="text-center">Customer</th>
                                <th class="text-center">Like</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Proof</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div> --}}

        <div class="card shadow">
            <div class="card-header">
                <h5> Payment Status <span style="color:green">Success</span></h5>
            </div>
            <div class="card-body">
                <div class="col-md-auto">

                    <table class="table table-striped table-bordered table-responsive" id="myTable1">
                        <thead>
                            <tr>
                                <th width="4%">#</th>
                                {{-- <th class="text-center">ID</th> --}}
                                <th class="text-center">Customer</th>
                                <th class="text-center">Like</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pay as $p)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    {{-- <td class="text-center">{{ $p->id }}</td> --}}
                                    <td class="text-center">{{ $p->Customer->name }}</td>
                                    <td class="text-center">{{ $p->Transaction->Room->no }}</td>
                                    <td class="text-center">{{ number_format($p->price) }} MAD </td>
                                    <td class="text-center">{{ $p->created_at->isoformat('D MMMM Y') }}</td>
                                    <td class="text-center">{{ $p->status }}</td>
                                    <td class="text-center"> <a href="/invoice/{{ $p->id }}"><i
                                                class="fas fa-file-invoice"></i></a> </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="4%">#</th>
                                {{-- <th class="text-center">ID</th> --}}
                                <th class="text-center">Customer</th>
                                <th class="text-center">Like</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>


    </div>
@endsection
<!-- End of Main Content -->
