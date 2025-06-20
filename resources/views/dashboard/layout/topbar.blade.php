<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </li>

    <!-- Nav Item - Alerts -->
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            @php
                $notif = App\Models\Notifications::limit(5)
                    ->where('status', 'unread')
                    ->orderby('created_at', 'desc')
                    ->get();
                $countnotif = App\Models\Notifications::where('status', 'unread')->count();
            @endphp
            <span class="badge badge-danger badge-counter">{{ $countnotif }}</span>
        </a>
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
                Alerts Center
            </h6>
            @foreach ($notif as $n)
                <form action="{{ json_decode($n->data)->url }}" method="get">
                    @csrf
                    <input type="hidden" name="nid" value="{{ $n->id }}">
                    <button class="a dropdown-item d-flex align-items-center" type="submit">
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                                <i class="fas fa-file-alt text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">{{ $n->created_at->diffforhumans() }},
                                {{ $n->created_at->isoformat('MMM D, Y') }}</div>
                            @php
                                $url = json_decode($n->data)->url;
                                $parturl = explode('pay/', $url);
                                $idpay = trim($parturl[1]);
                                $pay = App\Models\Payment::where('id', $idpay)->first();

                                $message = json_decode($n->data)->message;
                                $partmessage = explode('.', $message);
                                $datatrim = trim($partmessage[0]);

                                if ($pay && $pay->Transaction) {
                                    $checkin = Carbon\Carbon::parse($pay->Transaction->check_in)->format('d M Y');
                                    $checkout = Carbon\Carbon::parse($pay->Transaction->check_out)->format('d M Y');
                                    $total = $pay->price;
                                    $invoice = $pay->invoice;
                                }
                            @endphp

                            {{-- @if ($pay->status == 'Pending')
                                <span class="font-weight-bold">{{ $datatrim }}</span>
                            @else
                                <span class="font-weight-bold">{{ $message }}</span>
                            @endif
                            <div class="small text-gray-500">|Invoice {{ $invoice }} | Total IDR
                                {{ number_format($total) }} | {{ $checkin }} -
                                {{ $checkout }}|</div>
                        </div> --}}


                         {{-- <div>
                            <div class="small text-gray-500">{{ $n->created_at->diffforhumans() }},
                                {{ $n->created_at->isoformat('MMM D, Y') }}</div>
                            @php
                                $url = json_decode($n->data)->url;
                                $parturl = explode('pay/', $url);
                                $idpay = trim($parturl[1]);
                                $pay = App\Models\Payment::where('id', $idpay)->first();
                                
                                $message = json_decode($n->data)->message;
                                $partmessage = explode('.', $message);
                                $datatrim = trim($partmessage[0]);
                                $checkin = Carbon\Carbon::parse($pay->Transaction->check_in)->format('d M Y');
                                $checkout = Carbon\Carbon::parse($pay->Transaction->check_out)->format('d M Y');
                                $total = $pay->price;
                                $invoice = $pay->invoice;
                            @endphp
                            @if ($pay->status == 'Pending')
                                <span class="font-weight-bold">{{ $datatrim }}</span>
                            @else
                                <span class="font-weight-bold">{{ $message }}</span>
                            @endif
                            <div class="small text-gray-500">|Invoice {{ $invoice }} | Total IDR
                                {{ number_format($total) }} | {{ $checkin }} -
                                {{ $checkout }}|</div>
                        </div> --}}
                    </button>
                </form>
            @endforeach
            <a class="dropdown-item text-center small text-black-500" href="#">Show All Alerts</a>
            <a class="dropdown-item text-center small text-black-500" href="/dashboard/markall">Mark ALL as Read</a>
        </div>
    </li>

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Halo, {{ Auth::user()->username }}!</span>
            {{-- <img class="img-profile rounded-circle" src="img/undraw_profile.svg"> --}}
            <i class="fa fa-user-circle img-profile rounded-circle fa-lg mt-3 me-2" aria-hidden="true"></i>
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
            </a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Settings
            </a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Activity Log
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>
        </div>
    </li>

</ul>
{{-- {{ dd(json_decode($notif[0]->data->url)) }} --}}
