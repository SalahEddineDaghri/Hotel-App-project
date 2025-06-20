@extends('dashboard.layout.main')
@section('title')
    <title>
        Dashboard | Like</title>
@endsection
<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

@section('content')
    <!-- Page Heading -->
    <div class="container">
        <div class="col-md-6">
            <div class="d-flex align-items-center mb-4">
                <h1 class="h2 mb-0 text-dark-1000">Room</h1>
                <a href="room/create" class="btn btn-sm shadow border ms-2 mt-1 p-2"><i class="fas fa-plus"></i></a>
            </div>
        </div>

        <div class="col-md-6">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert"> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
            @endif
        </div>
    </div>

    <!-- Content Row -->
    <div class="container">
        <div class="card border-0 shadow">
            <div class="card-header">
                <h5>Total data {{ $p }}</h5>
            </div>
            <div class="card-body">
                <div class="col-md-auto">
                    <table class="table table-responsive table-sm table-bordered" id="myTable">
                        <thead class="table-secondary">
                            <tr>
                                <th width="5%">#</th>
                                <th width="5%">Id</th>
                                <th>No</th>
                                <th>Type</th>
                                <th>image</th>
                                {{-- <th>Status</th> --}}
                                <th>Capacity</th>
                                <th>Price/day</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            {{-- {{dd($room)}} --}}

                            @foreach ($room as $r)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $r->id }}</td>
                                    <td>{{ $r->no }}</td>
                                    <td>{{ $r->type->name }}</td>

                                    <td>
                                        @if ($r->images->count() > 0)
                                            {{-- صورة مصغرة مع فتـح المودال --}}
                                            <a href="#" data-toggle="modal"
                                                data-target="#roomModal{{ $r->id }}">
                                                <img src="/storage/{{ $r->images->first()->image }}" alt="Room Image"
                                                    style="width: 80px; height: 60px; object-fit: cover; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.2);">
                                            </a>

                                            {{-- Modal مع Carousel --}}
                                            <div class="modal fade" id="roomModal{{ $r->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="modalLabel{{ $r->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">صور الغرفة رقم {{ $r->no }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body p-0">
                                                            <div id="carouselRoom{{ $r->id }}"
                                                                class="carousel slide" data-ride="carousel">
                                                                <div class="carousel-inner">
                                                                    @foreach ($r->images as $index => $img)
                                                                        {{-- {{dd($img->image )}} --}}
                                                                        <div
                                                                            class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                                            <img src="/storage/{{ $img->image }}"
                                                                                class="d-block w-100"
                                                                                style="height: 400px; object-fit: cover;"
                                                                                alt="Room Image">
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                                @if ($r->images->count() > 1)
                                                                    <a class="carousel-control-prev"
                                                                        href="#carouselRoom{{ $r->id }}"
                                                                        role="button" data-slide="prev">
                                                                        <span class="carousel-control-prev-icon"
                                                                            aria-hidden="true"></span>
                                                                        <span class="sr-only">Previous</span>
                                                                    </a>
                                                                    <a class="carousel-control-next"
                                                                        href="#carouselRoom{{ $r->id }}"
                                                                        role="button" data-slide="next">
                                                                        <span class="carousel-control-next-icon"
                                                                            aria-hidden="true"></span>
                                                                        <span class="sr-only">Next</span>
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <span class="text-muted">No image</span>
                                        @endif
                                    </td>




                                    {{-- <td>{{ $r->status->name }}</td> --}}
                                    <td>{{ $r->capacity }}</td>
                                    <td>{{ number_format($r->price) }} MAD</td>

                                    <td class="d-flex">
                                        <a href="room/{{ $r->id }}/edit" class="btn btn-success me-1"><i
                                                class="fas fa-pen"></i></a>


                                        <a href="#" class="btn btn-danger me-1" data-bs-toggle="modal"
                                            data-bs-target="#confirmDeleteModal" data-id="{{ $r->id  }}">
                                            <i class="fas fa-trash"></i>
                                        </a>


                                        <a href="/dashboard/data/room/{{ $r->no }}"
                                            class="btn btn-warning text-light me-1">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot class="table-secondary">
                            <tr>
                                <th>#</th>
                                <th>Id</th>
                                <th>No</th>
                                <th>Type</th>
                                <th>image</th>
                                {{-- <th>Status</th> --}}
                                <th>Capacity</th>
                                <th>Price/day</th>
                                <th width="14%">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
       <!-- Delete Confirmation Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this room? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a id="confirmDeleteBtn" href="#" class="btn btn-danger">Yes, Delete</a>
            </div>
        </div>
    </div>
</div>


    </div>
   <script>
    const confirmDeleteModal = document.getElementById('confirmDeleteModal');
    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');

    confirmDeleteModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const roomId = button.getAttribute('data-id');
        const deleteUrl = `/dashboard/data/room/${roomId}/delete`;

        confirmDeleteBtn.setAttribute('href', deleteUrl);
    });
</script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
<!-- End of Main Content -->
