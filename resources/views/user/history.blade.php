@extends('frontend.inc.main')
@section('title')
    <title>DONQUIXOTE | Order History</title>
@endsection

@section('content')
<section style="background-color: #eee; margin-bottom: 65px; padding-top: 30px;">
    <div class="container py-5">
        <div class="row">
            <!-- User Sidebar -->
            <div class="col-lg-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body text-center">
                        @if ($user->image)
                            <img src="{{ asset('storage/' . $user->image) }}" alt="avatar"
                                class="rounded-circle img-fluid" style="width: 150px; height: 150px;">
                        @else
                            <img src="/img/default-user.jpg" alt="avatar"
                                class="rounded-circle img-fluid" style="width: 150px; height: 150px;">
                        @endif
                        <h3 class="mt-3">{{ $user->Customer->name }}</h3>
                        <p class="text-muted">Order History</p>
                    </div>
                </div>
            </div>

            <!-- Order History List -->
            <div class="col-lg-8">
                @foreach ($his as $h)
                    <div class="card mb-4 shadow-sm border-0">
                        <div class="card-body">
                            <div class="d-flex justify-content-between flex-wrap">
                                <div class="mb-2">
                                    <h5 class="mb-1">#{{ $loop->iteration }} - {{ $h->invoice }}</h5>
                                    <p class="mb-2">
                                        Status:
                                        @if ($h->status == 'Pending' && $h->image != null)
                                            <span class="text-danger">{{ $h->status }}</span> | <span class="text-success">Paid</span>
                                        @elseif ($h->status == 'Pending')
                                            <span class="text-danger">{{ $h->status }}</span>
                                        @else
                                            <span class="text-success">{{ $h->status }}</span>
                                        @endif
                                    </p>
                                    <p class="mb-2">Total: <strong>DH {{ number_format($h->price) }}</strong></p>
                                    <p class="mb-0 text-muted">Created at: {{ $h->created_at }}</p>
                                </div>
                                <div class="d-flex flex-column justify-content-start text-end">
                                    @if ($h->status == 'Pending' && $h->image == null)
                                        <a href="/bayar/{{ $h->id }}" class="btn btn-sm btn-danger mb-2">Pay Now</a>
                                        <button class="btn btn-sm btn-secondary" disabled>View Invoice</button>
                                    @elseif ($h->status == 'Pending' && $h->image != null)
                                        <button class="btn btn-sm btn-warning mb-2" disabled>Waiting Confirmation</button>
                                        <button class="btn btn-sm btn-secondary" disabled>View Invoice</button>
                                    @else
                                        <a href="/invoice/{{ $h->id }}" class="btn btn-sm btn-dark">View Invoice</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {!! $his->links() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
