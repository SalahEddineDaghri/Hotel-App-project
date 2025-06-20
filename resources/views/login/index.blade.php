<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Login | Bela Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url('/images/bg-login.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }

        .form-control {
            background-color: #222;
            color: #eee;
            border: none;
            border-radius: 8px;
            padding: 12px 15px;
        }

        .form-control::placeholder {
            color: #bbb;
        }

        .form-control:focus {
            background-color: #333;
            box-shadow: 0 0 8px #0d6efd;
            color: #fff;
        }

        .social-btn {
            background-color: #222;
            border: 1px solid #444;
            color: white;
            padding-left: 45px;
            position: relative;
            border-radius: 8px;
            font-weight: 600;
            height: 48px;
            line-height: 48px;
            text-align: left;
            display: block;
            width: 100%;
            margin-bottom: 14px;
        }

        .social-btn i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.25rem;
        }

        .text-link {
            color: #0d6efd;
            font-weight: 600;
            text-decoration: none;
        }

        .text-link:hover {
            text-decoration: underline;
        }

        .btn-join {
            background-color: #0d6efd;
            color: white;
            border-radius: 30px;
            padding: 10px 30px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
        }

        .btn-join:hover {
            background-color: #0a53be;
        }

        .login-card {
            background-color: rgba(0, 0, 0, 0.92);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
            overflow: hidden;
        }

        footer {
            background-color: #111;
            color: #aaa;
            font-size: 14px;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <div class="container my-auto py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row login-card">
                    <!-- Left Side -->
                    <div class="col-md-6 p-5">
                        <h3 class="mb-4">Enhance your experience with every new booking</h3>
                        <ul class="list-unstyled">
                            <li class="mb-2">Best price guaranteed</li>
                            <li class="mb-2">More stays, more savings</li>
                            <li class="mb-2">Exclusive experiences</li>
                            <li class="mb-2">Booking flexibility</li>
                        </ul>
                        <div class="mt-4">
                            <p><strong>Don't have a Bela Hotel account?</strong></p>
                            <a href="/register" class="btn-join">Join for free</a>
                        </div>
                    </div>

                    <!-- Right Side -->
                    <div class="col-md-6 p-5 border-start border-secondary">
                        <h4 class="mb-4 text-uppercase" style="letter-spacing: 1px;">Login</h4>

                        <a href="#" class="social-btn"><i class="fab fa-google"></i> With Google</a>

                        <div class="text-center my-3" style="font-weight: 500; font-size: 0.95rem;">
                            Or log in with your user
                        </div>

                        <form action="/login" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="email" value="{{ Cookie::get('email') }}" class="form-control" placeholder="Enter your email"
                                    required
                                    @if (Cookie::has('email')) value="{{ Cookie::get('email') }}" @endif>
                                @if (session('email_error'))
                                    <div class="text-danger small mb-2">{{ session('email_error') }}</div>
                                @endif
                                @error('email')
                                    <div class="text-danger small mb-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control"
                                    placeholder="Enter your password" required
                                    @if (Cookie::has('password')) value="{{ Cookie::get('password') }}" @endif>
                                @if (session('password_error'))
                                    <div class="text-danger small mb-2">{{ session('password_error') }}</div>
                                @endif
                                @error('password')
                                    <div class="text-danger small mb-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mt-2">ACCESS TO BELA HOTEL</button>
                            <div class="text-end mt-2">
                                <a href="/forgot-password" class="text-link">Did you forget your password?</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer fixed at bottom -->
    <footer class="text-center py-4 mt-auto">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Bela Hotel Hotels & Resorts. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @include('sweetalert::alert')
</body>

</html>
