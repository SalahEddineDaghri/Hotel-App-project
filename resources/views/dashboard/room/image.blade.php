@extends('dashboard.layout.main')
@section('title')
<title>Dashboard | Tambah Foto Kamar</title>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="container">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <h4>Add Room Photo {{ $room->no }} #{{ $room->id }}</h4>
                </div>
                <div class="card-body" style="margin-bottom:100px">
                    <form action="/dashboard/data/room/{{ $room->no }}/store-image" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-7 col-lg-7 col-12 order-md-1 order-2">
                            <div class="card border-0" style="margin-top: 28px">
                                <div class="card-header">
                                    <h5>Room photo data {{ $room->no }}</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-responsive table-bordered" id="myTable">
                                        <thead>
                                            <Tr>
                                                <th>#</th>
                                                <th>id</th>
                                                <th>Image</th>
                                            </Tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($cts as $c)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $c->id }}</td>
                                                <td>
                                                    <a href="" data-toggle="modal" data-target="#modal{{ $loop->iteration }}">
                                                        {{ $c->image }}</a>
                                                </td>
                                                <div class="modal" tabindex="-1" id="modal{{ $loop->iteration }}">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title me-auto">Image #{{ $loop->iteration }}</h5>
                                                                <div>
                                                                    <a href="/dashboard/data/room/26D/image/{{ $c->id }}/delete" class="btn btn-danger"  onclick="return confirm('Are you sure you want to delete this Image?');"> Delete &nbsp;<i class="fas fa-trash"></i> </a>
                                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="d-flex justify-content-center">
                                                                    <img src="{{asset('storage/' . $c->image)}}" style="width:600px;height:500px;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                         @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-12 order-1 order-md-2 col-md-5">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="room_id" class="form-label">ID Room </label>
                                    <input type="text" class="form-control" disabled value="{{ $room->id }}"  id="room_id"  placeholder="ex 10A">
                                </div>
                                <div class="col-md-9 col-lg-9">
                                    <label for="image" class="form-label">Add Room Photo </label>
                                    <input class="form-control" name="image" type="file" id="image">
                                    <input type="text" name="room_id" hidden value="{{ $room->id }}">
                                    <button class="btn btn-dark mt-4 ms-auto" type="submit"> SUBMIT </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
            <!-- End of Main Content -->
