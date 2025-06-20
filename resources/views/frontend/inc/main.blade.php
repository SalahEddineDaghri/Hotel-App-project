<!DOCTYPE html>
<html>

<head>
    @yield('title')

    <!-- ✅ Font Awesome CSS (نسخة مجانية) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-mQbDDrPVklm++9VNNfmxZAsL9U0BbScGZt93hH9S8kZVZAFyfL4oFZMS3fxK+E8Ve5Re2i9KrNe9xOLYQ/5kNQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- ✅ CSS only -->
    @include('frontend.inc.links')
    @yield('link')
    @yield('css')

    <style type="text/css">
        .availability-form {
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        .bg-custom,
        .btn-custom {
            background-color: #EAC117;
        }

        .btn-custom:hover {
            background-color: #bf9c08;
        }

        .swiper-slide img {
            width: 100%;
            height: auto;
            object-fit: cover;
            object-position: center;
        }

        @media screen and (max-width: 575px) {
            .availability-form {
                margin-top: 25px;
                padding: 0 35px;
            }

            .swiper-slide img {
                width: 100%;
                height: 50vh;
            }
        }

        .pop:hover {
            border-top-color: var(--teal) !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }

        .navbar {
            background-color: rgba(234, 193, 23, 1);
            transition: background-color 0.3s ease;
        }

        .navbar.scrolled {
            background-color: rgba(234, 193, 23, 0.8);
        }

        .box {
            border-top-color: var(--teal) !important;
        }

        /* ✅ Back to Top Button Style */
        .back-to-top {
            display: none;
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #00000010;
            color: black;
            font-size: 24px;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            z-index: 999;
            backdrop-filter: blur(6px);
            transition: background-color 0.3s, transform 0.3s;
            justify-content: center;
            align-items: center;
        }

        .back-to-top:hover {
            background-color: #ffffff20;
            transform: scale(1.1);
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body id="page-top">

    @include('frontend.inc.header')
    @include('frontend.inc.logout')

    @yield('content')

    {{-- <!-- ✅ Scroll to Top Button -->
    <a id="backToTop" class="back-to-top d-flex" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a> --}}

    <hr class="mt-4">
    <section class="bg-custom footer-index" id="footer-index">
        @include('frontend.inc.footer')
    </section>

    @include('vendor.sweetalert.alert')

    <section class="script" id="script">
        @include('frontend.inc.scripts')
    </section>

    <!-- ✅ Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ✅ Back to Top Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const backToTop = document.getElementById("backToTop");

            window.addEventListener("scroll", function() {
                if (window.scrollY > 300) {
                    backToTop.style.display = "flex";
                } else {
                    backToTop.style.display = "none";
                }
            });

            backToTop.addEventListener("click", function(e) {
                e.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


</body>

</html>
