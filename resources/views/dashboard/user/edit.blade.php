@extends('dashboard.layout.main')
@section('title')
<title>Dashboard | Edit User {{ $user->username }}</title>
@endsection
@section('content')
<div class="row">

                    <!-- Content Row -->
                    <div class="col-lg-12">
                        <div class="container">
                        <div class="card">
                                <div class="card-header">
                                  <h4>Edit user {{ $user->username }} #{{ $user->id }}</h4>
                                </div>
                                <div class="card-body">
                                    <form action="/dashboard/user/update" method="POST"  enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                                <div class="col-md-4">
                                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                                <label for="name" class="form-label">Name <span style="font-style: italic;">(required)</span></label>
                                                    <input type="text" class="form-control" id="name" name='name' value="{{ $user->Customer->name }}" placeholder="ex Jamal Kurniawan">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="username" class="form-label">Username <span style="font-style: italic;">(required)</span></label>
                                                    <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" placeholder="ex Jamal30">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="email" class="form-label">Email <span style="font-style: italic;">(required)</span></label>
                                                    <input type="text" class="form-control" id="email" name ='email' value="{{ $user->email }}" placeholder="ex Jamal@gmail.com">
                                                </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mt-3">
                                                <label for="password" class="form-label">Password <span style="font-style: italic;">(required)</span></label>
                                                <input type="password" class="form-control" id="password" name ='password' value="{{ $user->password }}" placeholder="***********">
                                          </div>

                                          <div class="col-md-6 mt-3">
                                            <label for="nik" class="form-label">Nik <span style="font-style: italic;">(required)</span></label>
                                            <input type="text" class="form-control" id="nik" name ='nik' value="{{ $user->Customer->nik }}">
                                      </div>
                                            {{-- <div class="col-md-6 mt-3">
                                                <label for="password" class="form-label">Password <span style="font-style: italic;">(required)</span></label>
                                                <input type="password" class="form-control" id="password" name ='password'  placeholder="******as*****">
                                          </div> --}}
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 mt-3">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" class="form-control" id="address" name ='address'  value="{{ $user->Customer->address }}" placeholder="ex Jamal">
                                            </div>
                                            <div class="col-md-4 mt-3">
                                                <label for="telp" class="form-label">Telp</label>
                                                <input type="text" class="form-control" id="telp" name ='telp' value="+62 {{ $user->telp }}" placeholder="ex Jamal">
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mt-3">
                                                <label for="birthdate" class="form-label">Birthdate</label>
                                                <input type="date" class="form-control" id="birthdate" name ='birthdate' value="{{ $user->Customer->birthdate }}">
                                            </div>

                                            <div class="col-md-4 mt-3">
                                                <label for="jk" class="form-label">Gender </label>
                                                <select class="form-select" name="jk" id="jk">
                                                    {{-- <option> --}}
                                                        @if ($user->Customer->jk == '?')
                                                        <option selected value="?"> Select Gender</option>
                                                        <option value="L">Man</option>
                                                        <option value="P">Women</option>
                                                        @elseif ($user->Customer->jk == 'P')
                                                        <option  value="?"> Select Gender </option>
                                                        <option value="L">Man</option>
                                                        <option selected value="P">Women</option>
                                                        @elseif($user->Customer->jk == 'L')
                                                        <option  value="?"> Select Gender </option>
                                                        <option selected value="L">Man</option>
                                                        <option  value="P">Women</option>
                                                        @endif

                                                    {{-- </option> --}}
                                                  </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 mt-3">
                                                <label for="is_admin" class="form-label">Is admin</label>
                                                <select class="form-select" name="is_admin" id="is_admin">
                                                    <option selected value="0">False </option>
                                                    <option value="1">True</option>
                                                  </select>
                                            </div>
                                        </div>

                                         <div class="row">
                                             <div class="col-md-10">
                                                 <div class="mt-3" style="margin-bottom: 30px">
                                                     <label for="formFile" class="form-label">Default file input example</label>
                                                     <input class="form-control" name="image" type="file" id="formFile">
                                                   </div>
                                             </div>
                                         </div>

                                        <button class="btn btn-dark mt-4" type="submit"> SUBMIT </button>
                                    </form>
                                </div>
                            </div>
                    </div>
                    </div>
</div>
@endsection
            <!-- End of Main Content -->
