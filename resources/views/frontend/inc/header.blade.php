<html>

<head>
    <!-- فـ resources/views/layouts/app.blade.php مثلا -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icons@6.14.0/css/flag-icons.min.css">


    <style>
        .dropdown-item .fi {
            width: 20px;
            height: 15px;
            border-radius: 2px;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.2);
        }

        /* الزر الرئيسي */
        .btn-lang-toggle {
            background-color: #1e1e2f;
            color: #fff;
            border: 1px solid #444;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .btn-lang-toggle:hover {
            background-color: #2c2c3e;
        }

        /* القائمة */
        .lang-menu {
            background-color: #2e2e42;
            border-radius: 8px;
            min-width: 160px;
            border: 1px solid #444;
            padding: 0;
            overflow: hidden;
        }

        /* العناصر */
        .lang-menu .dropdown-item {
            color: #f1f1f1;
            padding: 10px 16px;
            transition: background-color 0.2s ease;
            font-size: 14px;
        }

        .lang-menu .dropdown-item:hover {
            background-color: #3a3a55;
            color: #fff;
        }

        /* شكل السهم */
        .dropdown-toggle::after {
            margin-left: 8px;
            vertical-align: 0.2em;
            border-top-color: #ccc;
        }

        /* Language Selector Styles */
        .flag-icon {
            width: 1.2em;
            height: 1em;
            vertical-align: middle;
            background-size: contain;
            background-position: 50%;
            background-repeat: no-repeat;
            display: inline-block;
        }

        .flag-icon-gb {
            background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA2NDAgNDgwIj48cGF0aCBmaWxsPSIjMDAyNDdCIiBkPSJNMCAwaDY0MHY0ODBIMHoiLz48cGF0aCBmaWxsPSIjRkZGIiBkPSJNNzUgMGwyNCAxODYuNUg2NDBWMjQwSDk5bDI0IDE4Ni41TDc1IDQ4MGgyNjVsMjQtMTg2LjVIMHYtNDhoNTQ1bDI0LTE4Ni41SDM0MEg5OUw3NSAwem0wIDQ4MGwyNC0xODYuNUg2NDBWMjQwSDk5bDI0IDE4Ni41eiIvPjxwYXRoIGZpbGw9IiNDRDEwMTQiIGQ9Ik0zMjAgMEg2NDB2NDhIMzIwem0wIDk2SDY0MHY0OEgzMjB6bTAgOTZINjQwdjQ4SDMyMHptMCA5Nkg2NDB2NDhIMzIwem0wIDk2SDY0MHY0OEgzMjB6bTAgOTZINjQwdjQ4SDMyMHpNMCAxNDRoMzIwdjQ4SDB6bTAgOTZoMzIwdjQ4SDB6bTAgOTZoMzIwdjQ4SDB6Ii8+PC9zdmc+');
        }

        .flag-icon-fr {
            background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA2NDAgNDgwIj48cGF0aCBmaWxsPSIjRkZGIiBkPSJNMCAwaDY0MHY0ODBIMHoiLz48cGF0aCBmaWxsPSIjMDAyNTlGIiBkPSJNMCAwaDIxMy4zdjQ4MEgweiIvPjxwYXRoIGZpbGw9IiNEMjAwMjUiIGQ9Ik00MjYuNyAwaDIxMy4zdjQ4MEg0MjYuN3oiLz48L3N2Zz4=');
        }

        .flag-icon-es {
            background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA2NDAgNDgwIj48cGF0aCBmaWxsPSIjQzYwMDAwIiBkPSJNMCAwaDY0MHY0ODBIMHoiLz48cGF0aCBmaWxsPSIjRkZDNTAwIiBkPSJNMCAxMjBoNjQwdjI0MEgweiIvPjxwYXRoIGZpbGw9IiNDNjAwMDAiIGQ9Ik0wIDE4MGg2NDB2MTIwSDB6Ii8+PC9zdmc+');
        }

        .flag-icon-de {
            background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA2NDAgNDgwIj48cGF0aCBmaWxsPSIjRDAwMCIgZD0iTTAgMzIwaDY0MHYxNjBIMHoiLz48cGF0aCBmaWxsPSIjRkZDRjAwIiBkPSJNMCAxNjBoNjQwdjE2MEgweiIvPjxwYXRoIGZpbGw9IiMwMDAiIGQ9Ik0wIDBoNjQwdjE2MEgweiIvPjwvc3ZnPg==');
        }

        .flag-icon-it {
            background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA2NDAgNDgwIj48cGF0aCBmaWxsPSIjRkZGIiBkPSJNMCAwaDIxMy4zdjQ4MEgweiIvPjxwYXRoIGZpbGw9IiMwMDkyNDYiIGQ9Ik00MjYuNyAwaDIxMy4zdjQ4MEg0MjYuN3oiLz48cGF0aCBmaWxsPSIjQ0UyQjAwIiBkPSJNMjEzLjMgMGgyMTMuM3Y0ODBIMjEzLjN6Ii8+PC9zdmc+');
        }

        .flag-icon-sa {
            background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA2NDAgNDgwIj48cGF0aCBmaWxsPSIjMDA2MDAwIiBkPSJNMCAwaDY0MHY0ODBIMHoiLz48cGF0aCBmaWxsPSIjRkZGIiBkPSJNNDgwIDI3MS4xYzAgMTUuNy0yNiAzOC40LTY0IDM4LjRzLTY0LTIyLjctNjQtMzguNCAyNi0zOC40IDY0LTM4LjQgNjQgMjIuNyA2NCAzOC40eiIvPjxwYXRoIGZpbGw9IiNGRkYiIGQ9Ik0zODQgMjMxLjFjMCAxNS43LTI2IDM4LjQtNjQgMzguNHMtNjQtMjIuNy02NC0zOC40IDI2LTM4LjQgNjQtMzguNCA2NCAyMi43IDY0IDM4LjR6Ii8+PHBhdGggZmlsbD0iI0ZGRiIgZD0iTTU3NiAyNzEuMWMwIDE1LjctMjYgMzguNC02NCAzOC40cy02NC0yMi43LTY0LTM4LjQgMjYtMzguNCA2NC0zOC40IDY0IDIyLjcgNjQgMzguNHoiLz48cGF0aCBmaWxsPSIjRkZGIiBkPSJNNDgwIDMxMS4xYzAgMTUuNy0yNiAzOC40LTY0IDM4LjRzLTY0LTIyLjctNjQtMzguNCAyNi0zOC40IDY0LTM4LjQgNjQgMjIuNyA2NCAzOC40eiIvPjxwYXRoIGZpbGw9IiNGRkYiIGQ9Ik0zODQgMzExLjFjMCAxNS43LTI2IDM4LjQtNjQgMzguNHMtNjQtMjIuNy02NC0zOC40IDI2LTM4LjQgNjQtMzguNCA2NCAyMi43IDY0IDM4LjR6Ii8+PHBhdGggZmlsbD0iI0ZGRiIgZD0iTTU3NiAzMTEuMWMwIDE1LjctMjYgMzguNC02NCAzOC40cy02NC0yMi43LTY0LTM4LjQgMjYtMzguNCA2NC0zOC40IDY0IDIyLjcgNjQgMzguNHoiLz48cGF0aCBmaWxsPSIjRkZGIiBkPSJNNDgwIDM1MS4xYzAgMTUuNy0yNiAzOC40LTY0IDM4LjRzLTY0LTIyLjctNjQtMzguNCAyNi0zOC40IDY0LTM4LjQgNjQgMjIuNyA2NCAzOC40eiIvPjxwYXRoIGZpbGw9IiNGRkYiIGQ9Ik0zODQgMzUxLjFjMCAxNS43LTI2IDM4LjQtNjQgMzguNHMtNjQtMjIuNy02NC0zOC40IDI2LTM4LjQgNjQtMzguNCA2NCAyMi43IDY0IDM4LjR6Ii8+PHBhdGggZmlsbD0iI0ZGRiIgZD0iTTU3NiAzNTEuMWMwIDE1LjctMjYgMzguNC02NCAzOC40cy02NC0yMi43LTY0LTM4LjQgMjYtMzguNCA2NC0zOC40IDY0IDIyLjcgNjQgMzguNHoiLz48cGF0aCBmaWxsPSIjRkZGIiBkPSJNNDgwIDM5MS4xYzAgMTUuNy0yNiAzOC40LTY0IDM4LjRzLTY0LTIyLjctNjQtMzguNCAyNi0zOC40IDY0LTM4LjQgNjQgMjIuNyA2NCAzOC40eiIvPjxwYXRoIGZpbGw9IiNGRkYiIGQ9Ik0zODQgMzkxLjFjMCAxNS43LTI2IDM4LjQtNjQgMzguNHMtNjQtMjIuNy02NC0zOC40IDI2LTM4LjQgNjQtMzguNCA2NCAyMi43IDY0IDM4LjR6Ii8+PHBhdGggZmlsbD0iI0ZGRiIgZD0iTTU3NiAzOTEuMWMwIDE1LjctMjYgMzguNC02NCAzOC40cy02NC0yMi43LTY0LTM4LjQgMjYtMzguNCA2NC0zOC40IDY0IDIyLjcgNjQgMzguNHoiLz48cGF0aCBmaWxsPSIjRkZGIiBkPSJNNDgwIDE5MS4xYzAgMTUuNy0yNiAzOC40LTY0IDM4LjRzLTY0LTIyLjctNjQtMzguNCAyNi0zOC40IDY0LTM4LjQgNjQgMjIuNyA2NCAzOC40eiIvPjxwYXRoIGZpbGw9IiNGRkYiIGQ9Ik0zODQgMTkxLjFjMCAxNS43LTI2IDM4LjQtNjQgMzguNHMtNjQtMjIuNy02NC0zOC40IDI2LTM4LjQgNjQtMzguNCA2NCAyMi43IDY0IDM4LjR6Ii8+PHBhdGggZmlsbD0iI0ZGRiIgZD0iTTU3NiAxOTEuMWMwIDE1LjctMjYgMzguNC02NCAzOC40cy02NC0yMi43LTY0LTM4LjQgMjYtMzguNCA2NC0zOC40IDY0IDIyLjcgNjQgMzguNHoiLz48cGF0aCBmaWxsPSIjRkZGIiBkPSJNNDgwIDE1MS4xYzAgMTUuNy0yNiAzOC40LTY0IDM4LjRzLTY0LTIyLjctNjQtMzguNCAyNi0zOC40IDY0LTM4LjQgNjQgMjIuNyA2NCAzOC40eiIvPjxwYXRoIGZpbGw9IiNGRkYiIGQ9Ik0zODQgMTUxLjFjMCAxNS43LTI2IDM4LjQtNjQgMzguNHMtNjQtMjIuNy02NC0zOC40IDI2LTM4LjQgNjQtMzguNCA2NCAyMi43IDY0IDM4LjR6Ii8+PHBhdGggZmlsbD0iI0ZGRiIgZD0iTTU3NiAxNTEuMWMwIDE1LjctMjYgMzguNC02NCAzOC40cy02NC0yMi43LTY0LTM4LjQgMjYtMzguNCA2NC0zOC40IDY0IDIyLjcgNjQgMzguNHoiLz48L3N2Zz4=');
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg px-lg-3 py-lg-2 shadow sticky-top bg-white">
        <div class="container">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="/">
                {{-- <img src="/img/logo.png" style="max-width:90px"> --}}
                <span class="h5 fw-bold fs-3">Bela Hotel</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Bela Hotel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}"
                                href="/">{{ __('messages.Home') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-2 {{ Request::is('rooms*') ? 'active' : '' }}"
                                href="/rooms">{{ __('messages.Rooms') }}</a>
                        </li>
                        {{-- <li class="nav-item">
                                <a class="nav-link me-2 {{ Request::is('facilities*') ? 'active' : '' }}" href="/facilities">Facilities</a>
                            </li> --}}
                        <li class="nav-item">
                            <a class="nav-link me-2 {{ Request::is('contact*') ? 'active' : '' }}"
                                href="/contact">{{ __('messages.Contact') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-2 {{ Request::is('about*') ? 'active' : '' }}"
                                href="/about">{{ __('messages.About') }}</a>
                        </li>

                        <!-- Language Selector (Mobile) -->
                        <li class="nav-item d-lg-none">
                            <div class="dropdown mt-2">
                                <button class="btn btn-outline-secondary dropdown-toggle w-100" type="button"
                                    id="mobileLanguageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-globe me-2"></i> Language
                                </button>
                                <ul class="dropdown-menu w-100" aria-labelledby="mobileLanguageDropdown">
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2"
                                            href="{{ route('lang.switch', 'en') }}">
                                            <span class="fi fi-us"></span> English
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2"
                                            href="{{ route('lang.switch', 'fr') }}">
                                            <span class="fi fi-fr"></span> Français
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2"
                                            href="{{ route('lang.switch', 'ar') }}">
                                            <span class="fi fi-ma"></span> العربية
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item d-lg-none">
                            @php
                                $currency = session('currency', 'MAD');
                                $flags = [
                                    'MAD' => '', // المغرب
                                    'USD' => '$', // الولايات المتحدة
                                    'EUR' => '€', // فرنسا (تمثل اليورو)
                                ];
                                $flag = $flags[$currency] ?? 'us';
                            @endphp
                            <div class="dropdown mt-2">
                                <button class="btn btn-outline-secondary dropdown-toggle w-100" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ $flag }} {{ $currency }}
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('currency.switch', 'MAD') }}">
                                            MAD
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('currency.switch', 'USD') }}">
                                            USD
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('currency.switch', 'EUR') }}">
                                            EUR
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        @guest
                            <li class="nav-item">
                                <a class="nav-link me-2 {{ Request::is('login') ? 'active' : '' }}" href="/login">{{ __('messages.Log in') }}</a>
                            </li>
                        @endguest

                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-dark" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                        <path
                                            d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                                    </svg>
                                </a>
                                <ul class="dropdown-menu">
                                    @if (auth()->user()->is_admin)
                                        <li>
                                            <a class="dropdown-item" href="/dashboard">
                                                <i class="bi bi-pc-display" style="font-size:15px"></i>&nbsp; My Dashboard
                                            </a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                    @endif
                                    <li>
                                        <a class="dropdown-item" href="/myaccount">
                                            <i class="bi bi-person-vcard-fill" style="font-size:15px"></i>&nbsp; My Account
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/history">
                                            <i class="bi bi-cart-check-fill" style="font-size:15px"></i>&nbsp; History
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-danger" href="/logout">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                <style>
                                                    .logout {
                                                        fill: #ff1100
                                                    }
                                                </style>
                                                <path class="logout"
                                                    d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224H192c-17.7 0-32 14.3-32 32s14.3 32 32 32h210.7l-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32S177.7 32 160 32H96C43 32 0 75 0 128v256c0 53 43 96 96 96h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H96c-17.7 0-32-14.3-32-32V128c0-17.7 14.3-32 32-32h64z" />
                                            </svg>
                                            &nbsp; Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endauth
                    </ul>

                    <!-- Language Selector (Desktop) -->
                    <div class="d-none d-lg-block ms-3">
                        <div class="dropdown language-dropdown">
                            <button class="btn btn-lang-toggle dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                🌐 {{ strtoupper(app()->getLocale()) }}
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2"
                                        href="{{ route('lang.switch', 'en') }}">
                                        <span class="fi fi-us"></span> English
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2"
                                        href="{{ route('lang.switch', 'fr') }}">
                                        <span class="fi fi-fr"></span> Français
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2"
                                        href="{{ route('lang.switch', 'ar') }}">
                                        <span class="fi fi-ma"></span> العربية
                                    </a>
                                </li>
                            </ul>


                        </div>

                    </div>

                    @php
                        $currency = session('currency', 'MAD');
                        $flags = [
                            'MAD' => '', // المغرب
                            'USD' => '$', // الولايات المتحدة
                            'EUR' => '€', // فرنسا (تمثل اليورو)
                        ];
                        $flag = $flags[$currency] ?? 'us';
                    @endphp
                    <div class="d-none d-lg-block ms-3" style="margin-top: 2px">
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $flag }} {{ $currency }}
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('currency.switch', 'MAD') }}">
                                        MAD
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('currency.switch', 'USD') }}">
                                        USD
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('currency.switch', 'EUR') }}">
                                        EUR
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>




                </div>
            </div>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Highlight current language in dropdown
            const currentLang = '{{ app()->getLocale() }}';
            const langItems = document.querySelectorAll('.dropdown-item[href*="lang="]');

            langItems.forEach(item => {
                if (item.getAttribute('href').includes(`lang=${currentLang}`)) {
                    item.classList.add('active');
                    item.innerHTML = '<i class="fas fa-check me-2"></i>' + item.innerHTML;
                }
            });

            // Store selected language in localStorage
            const langLinks = document.querySelectorAll('[href*="lang="]');
            langLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    localStorage.setItem('preferred_language', this.getAttribute('href').split(
                        'lang=')[1]);
                });
            });

            // Check for preferred language in localStorage
            const preferredLang = localStorage.getItem('preferred_language');
            if (preferredLang && preferredLang !== currentLang) {
                window.location.href = window.location.pathname + '?lang=' + preferredLang;
            }
        });
    </script>
</body>

</html>
