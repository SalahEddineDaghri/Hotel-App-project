@extends('frontend.inc.main')

@section('title')
    <title>DONQUIXOTE | Edit Profile</title>
@endsection

@section('content')
<section style="background-color: #eee; margin-bottom:65px;">
    <div class="container py-5">
        <div class="row">
            <!-- Profile Card -->
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        @if ($user->image == null)
                            <img src="/img/default-user.jpg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px; height: 150px;">
                        @else
                            <img src="{{ asset('storage/' . $user->image) }}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px; height: 150px;">
                        @endif

                        <h3 class="mt-3">{{ $user->Customer->name }}</h3>
                        <h5 class="text-muted">{{ $user->username }}</h5>

                        <p class="mb-1">{{ $user->Customer->job ?? '' }}</p>
                        <p class="mb-3">{{ $user->Customer->address ?? '' }}</p>

                        <a href="/myaccount/edit" class="btn btn-outline-primary">
                            {{ $user->image == null ? 'Add Photo' : 'Edit Photo' }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="col-lg-8">
                <form action="/myaccount/{{ $user->id }}/update" method="post">
                    @csrf
                    <div class="card mb-4">
                        <div class="card-body">
                            @php
                                $fields = [
                                    ['label' => 'Full Name', 'name' => 'name', 'value' => $user->Customer->name, 'required' => true],
                                    ['label' => 'Username', 'name' => 'username', 'value' => $user->username, 'required' => true],
                                    ['label' => 'Email', 'name' => 'email', 'value' => $user->email, 'required' => true],
                                    ['label' => 'National ID (NIK)', 'name' => 'nik', 'value' => $user->Customer->nik, 'required' => true],
                                    ['label' => 'Phone Number', 'name' => 'telp', 'value' => $user->telp],
                                    ['label' => 'Date of Birth', 'name' => 'birthdate', 'value' => $user->Customer->birthdate, 'type' => 'date'],
                                    ['label' => 'Address', 'name' => 'address', 'value' => $user->Customer->address],
                                    ['label' => 'Occupation', 'name' => 'job', 'value' => $user->Customer->job],
                                    ['label' => 'Card Number', 'name' => 'card_number', 'value' => $user->card_number],
                                ];
                            @endphp

                            @foreach ($fields as $field)
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <label class="mb-0">
                                            {{ $field['label'] }} 
                                            @if (!empty($field['required'])) <span class="text-danger">*</span> @endif
                                        </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input 
                                            type="{{ $field['type'] ?? 'text' }}" 
                                            name="{{ $field['name'] }}" 
                                            class="form-control" 
                                            value="{{ $field['value'] }}" 
                                            @if (!empty($field['required'])) required @endif
                                        >
                                    </div>
                                </div>
                                <hr>
                            @endforeach

                            <!-- Gender -->
                            <div class="row mb-4">
                                <div class="col-sm-3">
                                    <label class="mb-0">Gender</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jk" value="L" id="male" {{ $user->Customer->jk == 'L' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jk" value="P" id="female" {{ $user->Customer->jk == 'P' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success px-4">Update Profile</button>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Change Password -->
                <div class="card">
                    <div class="card-body">
                        <form action="/myaccount/{{ $user->id }}/update" method="post">
                            @csrf
                            <h5 class="mb-4">Change Password</h5>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <label>New Password</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="password" name="newpassword" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <label>Confirm Password</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="password" name="confirmation" class="form-control" required>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-danger px-4">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
