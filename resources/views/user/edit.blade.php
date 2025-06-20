<!DOCTYPE html>
<html>
<head>
	<title>DONQUIXOTE | Edit Fotor Profile</title>
	<!-- CSS only -->
@include('frontend.inc.links')

<link rel="stylesheet" type="text/css" href="/css/common.css">
{{-- <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script> --}}
<link rel="stylesheet" href="/bs/css/bootstrap.min.css">

</head>
<body>

@include('frontend.inc.header') @include('frontend.inc.logout')

<section style="background-color: #eee;margin-bottom:65px">
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
                @if($user->image == null)
                    <img src="/img/default-user.jpg" alt="avatar"
                      class="rounded-circle img-fluid" style="width: 150px;height:150px">
                 @else
                <img src="{{asset('storage/' . $user->image)}}" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;height:150px">
                @endif
              <h5 class="my-3">{{ $user->Customer->name }}</h5>
              <p class="text-muted mb-1">@if ($user->Customer->job)
                {{ $user->Customer->job}}
                @else

             @endif</p>
              <p class="text-muted mb-4">@if ($user->Customer->address)
                 {{ $user->Customer->address}}
                 @else

              @endif</p>
              <div class="d-flex justify-content-center mb-2">
                  <a href="/myaccount" class="btn btn-primary">Back</a>
                @if (!$user->image == null)
                <a href="/myaccount/{{$user->id}}/delete-foto" class="btn btn-danger ms-2">Delete Photo</a>
                @endif

              </div>
            </div>
          </div>

        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex">

                </div>
              <div class="d-flex">
                  <h4>@if ($user->image == null)
                Add
                @else
                Edit
                  @endif Foto <span class="fst-italic">(Max 5mb)</span></h4>
              </div>
              <hr>
              <div class="d-flex justify-content-start">
                <div class="col-md-12">
                    <form action="/myaccount/addimage" method="post"  enctype="multipart/form-data"> @csrf
                        <label for="bukti" class="mb-2"></label>
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <input type="file" class="form-control mb-3" required name="image" id="bukti">
                        <button class="btn btn-primary justify-content-end" type="submit">Send</button>
                    </form>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
  </section>


  @include('vendor.sweetalert.alert')
@include('frontend.inc.footer')

</body>
</html>
