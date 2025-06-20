@extends('dashboard.layout.main')
@section('title')
    <title>Dashboard | Chooseroom</title>
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
                <div class="card shadow border-0">
                    <div class="card-body p-3">
                        <h2>{{ $roomsCount }} Room Available for:</h2>
                        <p>{{ request()->input('count') }} People On {{ $stayfrom }} To {{ $stayto }}
                        </p>
                        <hr>
                        <form method="POST" action="{{ route('chooseroom') }}">
                            @csrf
                            <div class="row mb-2">
                                <input type="hidden" name="c_id" value="{{ request()->input('c_id') }}">
                                <input type="hidden" name="from" value="{{ request()->input('from') }}">
                                <input type="hidden" name="to" value="{{ request()->input('to') }}">
                                <input type="hidden" name="count" value="{{ request()->input('count') }}">

                                <div class="col-md-6 col-lg-4 col-6">
                                    <select class="form-select" id="sort_name" name="sort_name"
                                        aria-label="Default select example">
                                        <option value="price" @if (request()->input('sort_name') == 'price') selected @endif>Price
                                        </option>
                                        <option value="no" @if (request()->input('sort_name') == 'no') selected @endif>Number
                                        </option>
                                        <option value="capacity" @if (request()->input('sort_name') == 'capacity') selected @endif>Capacity
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-6 col-lg-4 col-6">
                                    <select class="form-select" id="sort_type" name="sort_type"
                                        aria-label="Default select example">
                                        <option value="ASC" @if (request()->input('sort_type') == 'ASC') selected @endif>Ascending
                                        </option>
                                        <option value="DESC" @if (request()->input('sort_type') == 'DESC') selected @endif>Descending
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-12 col-lg-4 col-12 mt-4 mt-md-4 mt-lg-0">
                                    <button type="submit" class="btn myBtn shadow-sm border w-100">Search</button>
                                </div>
                            </div>
                        </form>

                        <div class="row">
                            @forelse ($rooms as $room)
                                <div class="col-lg-12">
                                    <div
                                        class="row g-0 border shadow rounded overflow-hidden mb-4 h-md-250 position-relative">
                                        <div
                                            class="col-md-12 order-2 order-md-2 order-lg-1 col-12 col-lg-8 p-4 flex-column position-static">
                                            <strong class="d-inline-block mb-2 text-secondary">{{ $room->capacity }}
                                                {{ Str::plural('Person', $room->capacity) }}</strong>
                                            <h3 class="mb-0">{{ $room->number }} ~ {{ $room->type->name }}</h3>
                                            <div class="mb-1 text-muted">Rp.{{ number_format($room->price) }} /
                                                Day
                                            </div>
                                            <div class="wrapper">
                                                <p class="card-text mb-auto demo-1">
                                                    {{ Illuminate\Support\Str::limit($room->info, 150) }}</p>
                                            </div>
                                            <form action="{{ route('confirmation') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="customer" value="{{ $customer->id }}">
                                                <input type="hidden" name="room" value="{{ $room->id }}">
                                                <input type="hidden" name="from" value="{{ $stayfrom }}">
                                                <input type="hidden" name="to" value="{{ $stayto }}">
                                                <button class="btn myBtn shadow-sm border w-100 m-2">Choose</button>
                                            </form>
                                        </div>
                                        <div
                                            class="d-flex justify-content-center col-lg-4 col-md-12 col-12 order-1 order-md-1 order-lg-2">
                                            @if (!$room->Images->count() > 0)
                                                <img src="/img/default-room.png" class="w-100" style="object-fit: cover;"
                                                    class="justify-content-center" height="250" alt="">
                                            @else
                                                <img src="{{ asset('storage/' . $room->images[0]->image) }}" class="w-100"
                                                    style="object-fit: cover;" class="justify-content-center" height="250"
                                                    alt="">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <h3>Theres no available room for {{ request()->input('count_person') }} or more
                                    person
                                </h3>
                            @endforelse
                        </div>
                        {{-- Pagination links --}}
                        <div class="mt-3">
                            {{ $rooms->links() }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mt-2">
                <div class="card border-0 shadow-sm">
                    {{-- {{ dd($customer) }} --}}
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
@endsection
