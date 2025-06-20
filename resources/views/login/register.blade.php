<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register | Bela Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap + FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background-image: url('/images/bg-login.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: 'Poppins', sans-serif;
            color: #fff;
        }

        .auth-container {
            max-width: 850px;
            background-color: rgba(15, 15, 15, 0.95);
            border-radius: 20px;
            padding: 30px;
            margin: 30px auto;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.7);
        }

        .form-control {
            background-color: #222;
            border: 1px solid #444;
            color: #fff;
            border-radius: 8px;
            padding: 8px 10px;
            font-size: 14px;
        }

        .form-control::placeholder {
            color: #aaa;
        }

        .form-check-label {
            font-size: 13px;
            color: #ccc;
        }

        .btn-social {
            width: 100%;
            background-color: #111;
            border: 1px solid #333;
            color: #fff;
            border-radius: 8px;
            padding: 8px 10px;
            font-weight: 500;
            font-size: 14px;
        }

        .btn-social i {
            margin-right: 6px;
        }

        .btn-register {
            background-color: #555;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 20px;
            font-weight: bold;
            width: 100%;
            font-size: 15px;
            margin-top: 15px;
        }

        .btn-register:hover {
            background-color: #777;
        }

        footer {
            background-color: #111;
            color: #aaa;
            font-size: 13px;
        }

        label {
            font-weight: 500;
            font-size: 14px;
        }

        small.text-muted {
            font-size: 12px;
        }

        h3 {
            font-size: 22px;
        }

        a {
            font-size: 14px;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <main class="flex-grow-1 d-flex align-items-center justify-content-center">
        <div class="auth-container">

            <a href="/login" class="text-white text-decoration-none mb-3 d-block">
                <i class="fas fa-arrow-left me-2"></i>Go back
            </a>

            <h3 class="text-center mb-3">Create your account</h3>

            <!-- Social Login -->
            <div class="row g-2 mb-3">
                <div class="col-md-4">
                    <a href="#" class="btn btn-social"><i class="fab fa-google"></i>With Google</a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="btn btn-social"><i class="fab fa-facebook-f"></i>With Facebook</a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="btn btn-social"><i class="fab fa-apple"></i>With Apple</a>
                </div>
            </div>

            <!-- Divider -->
            <hr class="text-secondary my-3">

            <!-- Register Form -->
            <form action="/register" method="POST">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="email">Email *</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                            required placeholder="Enter your email">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="dob">Date of Birth *</label>
                        <input type="date" name="dob" id="dob" class="form-control"
                            placeholder="DD/MM/YYYY">
                    </div>

                    <div class="col-md-6">
                        <label for="name">Name *</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                            required placeholder="Enter your name">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="username">Username *</label>
                        <input type="text" name="username" id="username"
                            class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}"
                            required placeholder="Choose a username">
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="password">Password *</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror" required
                                placeholder="Enter your password">
                            <span class="input-group-text bg-dark text-white toggle-password d-none"
                                data-target="password" style="cursor:pointer;">
                                <i class="fa fa-eye-slash" id="toggleIconPassword"></i>
                            </span>


                        </div>
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 position-relative">
                        <label for="confirmation_password">Confirm Password *</label>
                        <div class="input-group">
                            <input type="password" name="confirmation_password" id="confirmation_password"
                                class="form-control @if (session('password_error')) is-invalid @endif" required
                                placeholder="Re-enter your password">
                            <span class="input-group-text bg-dark text-white toggle-password d-none"
                                data-target="confirmation_password" style="cursor:pointer;">
                                <i class="fa fa-eye-slash" id="toggleIconConfirm"></i>
                            </span>

                        </div>
                        @if (session('password_error'))
                            <div class="invalid-feedback d-block">{{ session('password_error') }}</div>
                        @endif
                    </div>

                </div>

                <!-- Terms Checkboxes -->
                <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" id="privacy" required>
                    <label class="form-check-label" for="privacy">
                        I accept and confirm that I have read the <a href="#"
                            class="text-decoration-underline text-light">Privacy Policy</a>*
                    </label>
                </div>

                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="terms" required>
                    <label class="form-check-label" for="terms">
                        I accept and confirm that I have read the <a href="#"
                            class="text-decoration-underline text-light">Program conditions</a>*
                    </label>
                </div>

                <small class="text-muted">
                    By ticking this box, I declare that I have read and accepted the Terms and Conditions of the my Bela
                    Program and want to become a member.
                </small>

                <button type="submit" class="btn btn-register">Create account</button>
            </form>
        </div>
    </main>

    <footer class="text-center py-3 mt-auto">
        <p class="mb-0">&copy; 2025 Bela Hotel Hotels & Resorts</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @include('sweetalert::alert')

    <script>
        document.querySelectorAll('.toggle-password').forEach(icon => {
            icon.addEventListener('click', () => {
                const inputId = icon.getAttribute('data-target');
                const input = document.getElementById(inputId);
                const iconElement = icon.querySelector('i');

                if (input.type === 'password') {
                    input.type = 'text';
                    iconElement.classList.remove('fa-eye-slash');
                    iconElement.classList.add('fa-eye');
                } else {
                    input.type = 'password';
                    iconElement.classList.remove('fa-eye');
                    iconElement.classList.add('fa-eye-slash');
                }
            });
        });

        // Show/hide the icon only when input is filled
        ['password', 'confirmation_password'].forEach(id => {
            const input = document.getElementById(id);
            const toggle = document.querySelector(`.toggle-password[data-target="${id}"]`);

            input.addEventListener('input', () => {
                if (input.value.length > 0) {
                    toggle.classList.remove('d-none');
                } else {
                    toggle.classList.add('d-none');
                    // Also reset to eye-slash and input type to password
                    input.type = 'password';
                    const icon = toggle.querySelector('i');
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                }
            });
        });
    </script>


</body>

</html>
