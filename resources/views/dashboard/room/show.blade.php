@extends('dashboard.layout.main')
@section('title')
<title>Dashboard | Kamar {{ $room->no }}</title>
@endsection
@section('content')
    <!-- Page Heading -->
    <div class="container">
        <div class="col-md-6">
            <div class="d-sm-flex align-items-center mb-4">
            <h1 class="h2 mb-0 text-dark-1000">Room {{ $room->no }}</h1>
            </div>
        </div>

        <div class="col-md-6">
            @if (session()->has('success'))

            <div class="alert alert-success alert-dismissible fade show" role="alert"> {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>

            @endif
        </div>

    </div>

    <!-- Content Row -->
    <div class="container">
        <div class="card border-0 shadow">
            <div class="card-header">
                <div class="d-flex">
                    <h5 class="">#{{ $room->id }} Status <h5 class="ms-1 me-5" @if ($room->status->code == 'V')
                    style="color: green;"
                    @else style="color: red" @endif> {{ $room->status->name }}</h5></h5>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5 col-lg-5 col-12 mb-sm-4">
                        @if ($room->images->count() > 0)
                        <img src="{{asset('storage/' . $cts->image)}}"
                               class="bd-placeholder-img" alt="foto {{ $cts->room->no }}" style="object-fit:cover;" width="100%" focusable="false" aria-hidden="true" height="225">
                               @else
                               <marquee class="h4" behavior="alternate" style="font-style: italic">Theres no image for this Room</marquee>
                        @endif
                    </div>
                    <div class="col-md-7 col-lg-7 col-12">
                    <table class="table table-sm table-bordered">
                        <thead class="table-secondary">
                            <tr>
                                <th>Capacity</th>
                                <th>Price/day</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $room->capacity }}</td>
                                <td>Rp.{{ number_format($room->price) }}</td>
                                <td>{{ $room->type->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <h5><a href="/dashboard/data/room/{{ $room->no }}/add-image" class="btn btn-success">Add photo</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
            <!-- End of Main Content -->
