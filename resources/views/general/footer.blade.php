<nav class="navbar mt-1">
    <div class="container justify-content-center">
        <!-- BOTTOM BAR -->
        <div class="row d-flex justify-content-between bottom-nav-row">
            <div class="col-auto d-flex flex-grow-1 align-items-center justify-content-start">
                <button
                    class="align-items-center border-0 py-2 bg-white text-black fw-bold"
                    style="font-family: Poppins; font-size: 1.15rem; width: 140px; border-radius: 20px;"
                    onclick="generatePDF()">
                    Gen. PDF
                </button>
            </div>
            <div class="col-7 dropup-center dropup d-flex btn-group justify-content-center align-items-center">
                <!-- FILTER -->
                <div class="row d-flex w-100">
                    <div class="col-12 d-flex w-100 align-items-center justify-content-center">

                        @if(!str_contains(request()->url(), '/promos'))

                        <!-- DATE FILTER BUTTON -->
                        <button class="btn dropdown-toggle w-100 pb-1 date-filter-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="col-0 col-lg-auto"></div>
                            <div class="col-9 col-lg" id="date-filter-dropdown">
                                @if(request('interval') != 'custom' )
                                {{ ucwords(str_replace('_', ' ', request('interval', 'this_week'))) }}
                                
                                @else 
                                {{ ucwords(str_replace('_', ' ', request('start_date'))) }} to {{ ucwords(str_replace('_', ' ', request('end_date'))) }}
                                @endif
                            </div>
                            <div class="col-auto d-flex justify-content-end align-items-end">
                                <ion-icon name="chevron-down-outline" class="date-dropdown-arrow"></ion-icon>
                            </div>
                        </button>
                        <ul class="z-3 position-absolute rounded-top-2 rounded-bottom-0 dropdown-menu date-dropdown-menu" aria-labelledby="date-filter-dropdown">
                            <div class="d-flex">
                                <li class="col-6">
                                    <a class="py-2 text-white dropdown-item date-item {{ request('interval', 'this_week') == 'overall' ? 'active' : '' }}" href="?interval=overall" data-interval="overall">
                                        All Time
                                    </a>
                                </li>
                                <li class="col-6">
                                    <a class="py-2 text-white dropdown-item date-item {{ request('interval', 'this_week') == 'yesterday' ? 'active' : '' }}" href="?interval=yesterday" data-interval="yesterday">
                                        Yesterday
                                    </a>
                                </li>
                            </div>
                            <div class="d-flex">
                                <li class="col-6">
                                    <a class="py-2 text-white dropdown-item date-item {{ request('interval', 'this_week') == 'today' ? 'active' : '' }}" href="?interval=today" data-interval="today">
                                        Today
                                    </a>
                                </li>
                                <li class="col-6">
                                    <a class="py-2 text-white dropdown-item date-item {{ request('interval', 'this_week') == 'this_week' ? 'active' : '' }}" href="?interval=this_week" data-interval="this_week">
                                        This Week
                                    </a>
                                </li>
                            </div>
                            <div class="d-flex">
                                <li class="col-6">
                                    <a class="py-2 text-white dropdown-item date-item {{ request('interval', 'this_week') == 'last_3_days' ? 'active' : '' }}" href="?interval=last_3_days" data-interval="last_3_days">
                                        Last 3 Days
                                    </a>
                                </li>
                                <li class="col-6">
                                    <a class="py-2 text-white dropdown-item date-item {{ request('interval', 'this_week') == 'last_week' ? 'active' : '' }}" href="?interval=last_week" data-interval="last_week">
                                        Last Week
                                    </a>
                                </li>
                            </div>
                            <div class="d-flex">
                                <li class="col-6">
                                    <a class="py-2 text-white dropdown-item date-item {{ request('interval', 'this_week') == 'last_5_days' ? 'active' : '' }}" href="?interval=last_5_days" data-interval="last_5_days">
                                        Last 5 Days
                                    </a>
                                </li>
                                <li class="col-6">
                                    <a class="py-2 text-white dropdown-item date-item {{ request('interval', 'this_week') == 'this_month' ? 'active' : '' }}" href="?interval=this_month" data-interval="this_month">
                                        This Month
                                    </a>
                                </li>
                            </div>
                            <div class="d-flex">
                                <li class="col-6">
                                    <a class="py-2 text-white dropdown-item date-item {{ request('interval', 'this_week') == 'last_7_days' ? 'active' : '' }}" href="?interval=last_7_days" data-interval="last_7_days">
                                        Last 7 Days
                                    </a>
                                </li>
                                <li class="col-6">
                                    <a class="py-2 text-white dropdown-item date-item {{ request('interval', 'this_week') == 'last_month' ? 'active' : '' }}" href="?interval=last_month" data-interval="last_month">
                                        Last Month
                                    </a>
                                </li>
                            </div>
                            <div class="d-flex">
                                <li class="col-6">
                                    <a class="py-2 text-white dropdown-item date-item {{ request('interval', 'this_week') == 'this_year' ? 'active' : '' }}" href="?interval=this_year" data-interval="this_year">
                                        This Year
                                    </a>
                                </li>
                                <li class="col-6">
                                    <a class="py-2 text-white dropdown-item date-item {{ request('interval', 'this_week') == 'last_year' ? 'active' : '' }}" href="?interval=last_year" data-interval="last_year">
                                        Last Year
                                    </a>
                                </li>
                            </div>
                            <li>
                                @if(str_contains(request()->url(), '/feedbacks'))
                                <button class="btn bg-white rounded-2 fw-bold dropdown-item"
                                    data-bs-toggle="modal"
                                    data-bs-target="#feedbacks-date-modal"
                                    style="letter-spacing: 1px; width: 90%; margin: auto;">
                                    Custom
                                </button>
                                @else
                                <button class="btn bg-white rounded-2 fw-bold dropdown-item"
                                    data-bs-toggle="modal"
                                    data-bs-target="#custom-date-modal"
                                    style="letter-spacing: 1px; width: 90%; margin: auto;">
                                    Custom
                                </button>
                                @endif
                            </li>
                        </ul>

                        <!-- SORT BUTTON -->
                        @else

                        <button class="btn dropdown-toggle w-100 pb-1 date-filter-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="col-0 col-lg-2"></div>
                            <div class="col-9 col-lg-6" id="date-filter-dropdown">
                                {{ request('sort') == 'oldest' ? 'Oldest to Newest' : 'Newest to Oldest'}}
                            </div>
                            <div class="col-3 d-flex justify-content-end align-items-end">
                                <ion-icon name="chevron-down-outline" class="date-dropdown-arrow"></ion-icon>
                            </div>
                        </button>
                        <ul class="z-3 position-absolute rounded-top-2 rounded-bottom-0 dropdown-menu date-dropdown-menu" aria-labelledby="date-filter-dropdown">
                            <li>
                                <a class="py-3 text-white dropdown-item date-item {{ request('sort', 'newest') == 'newest' ? 'active' : '' }}" href="?sort=newest" data-sort="newest">
                                    Newest to Oldest
                                </a>
                            </li>
                            <li>
                                <a class="py-3 text-white dropdown-item date-item {{ request('sort', 'newest') == 'oldest' ? 'active' : '' }}" href="?sort=oldest" data-sort="oldest">
                                    Oldest to Newest
                                </a>
                            </li>
                        </ul>

                        @endif
                    </div>

                    <div class="col-12 d-flex justify-content-start ">
                        <hr class="m-0 ms-2 text-white opacity-100 date-filter-line" style="width: 85%;">
                    </div>
                </div>
                <!-- END FILTER -->


            </div>
            <!-- REFRESH BUTTON -->
            <div class="col-2 d-flex flex-grow-1 justify-content-end align-items-center text-center">


                {{-- KUWAGO ONE REFRESH BUTTON --}}
                @if(request()->routeIs(['general.kuwago-one.dashboard', 'general.kuwago-one.sales', 'general.kuwago-one.expenses', 'general.kuwago-one.feedbacks']))
                    @if(str_contains(request()->url(), '/feedbacks'))
                        <form action="{{ url('feedback/import-one') }}" method="GET">
                    @else
                        <form action="{{ route('refresh.data', ['type' => 'kuwago_one']) }}" method="GET">
                    @endif
                    <button class="align-items-center rounded-5 border-0 bg-white" type="submit">
                        <img src="{{ asset('assets/images/icons/refresh-icon.png') }}" style="height: 40px; object-fit: cover;" alt="Refresh Icon">
                    </button>
                    </form>
                    @elseif(request()->routeIs(['general.kuwago-one.promos']))
                    <button class="align-items-center rounded-5 border-0 bg-white" type="button" onclick="location.reload()">
                        <img src="{{ asset('assets/images/icons/refresh-icon.png') }}" style="height: 40px; object-fit: cover;" alt="Refresh Icon">
                    </button>
                @endif

                {{-- KUWAGO TWO REFRESH BUTTON --}}
                @if(request()->routeIs(['general.kuwago-two.dashboard', 'general.kuwago-two.sales', 'general.kuwago-two.expenses', 'general.kuwago-two.feedbacks']))
                    @if(str_contains(request()->url(), '/feedbacks'))
                        <form action="{{ url('feedback/import-two') }}" method="GET">
                    @else
                        <form action="{{ route('refresh.data', ['type' => 'kuwago_two']) }}" method="GET">
                    @endif
                    <button class="align-items-center rounded-5 border-0 bg-white" type="submit">
                        <img src="{{ asset('assets/images/icons/refresh-icon.png') }}" style="height: 40px; object-fit: cover;" alt="Refresh Icon">
                    </button>
                </form>
                @elseif(request()->routeIs(['general.kuwago-two.promos']))
                <button class="align-items-center rounded-5 border-0 bg-white" type="button" onclick="location.reload()">
                    <img src="{{ asset('assets/images/icons/refresh-icon.png') }}" style="height: 40px; object-fit: cover;" alt="Refresh Icon">
                </button>
                @endif

                {{-- UDDESIGN REFRESH BUTTON --}}
                @if(request()->routeIs(['general.uddesign.dashboard', 'general.uddesign.sales', 'general.uddesign.expenses', 'general.uddesign.feedbacks']))
                    @if(str_contains(request()->url(), '/feedbacks'))
                        <form action="{{ url('uddesignfeedback/fetch') }}" method="GET">
                    @else
                        <form action="{{ route('refresh.data', ['type' => 'uddesign']) }}" method="GET">
                    @endif
                <form action="{{ route('refresh.data', ['type' => 'uddesign']) }}" method="GET">
                    <button class="align-items-center rounded-5 border-0 bg-white" type="submit">
                        <img src="{{ asset('assets/images/icons/refresh-icon.png') }}" style="height: 40px; object-fit: cover;" alt="Refresh Icon">
                    </button>
                </form>
                @elseif(request()->routeIs(['general.uddesign.uddeals']))
                <button class="align-items-center rounded-5 border-0 bg-white" type="button" onclick="location.reload()">
                    <img src="{{ asset('assets/images/icons/refresh-icon.png') }}" style="height: 40px; object-fit: cover;" alt="Refresh Icon">
                </button>
                @endif

                {{-- EXECUTIVE REFRESH BUTTON --}}
                @if(str_contains(request()->url(), '/executive'))
                    <button class="align-items-center rounded-5 border-0 bg-white" type="button" onclick="location.reload()">
                        <img src="{{ asset('assets/images/icons/refresh-icon.png') }}" style="height: 40px; object-fit: cover;" alt="Refresh Icon">
                    </button>
                </form>
                @endif



                <!-- END NAV TOGGLER / NAV ITEMS -->
            </div>
        </div>
        <!-- END BOTTOMNAVBAR -->
    </div>
</nav>


<!-- DATE FILTER MODAL for GENERAL to EXPENSES-->
@if(!str_contains(request()->url(), '/promos') && !str_contains(request()->url(), '/feedbacks') && !str_contains(request()->url(), '/executive'))
<div class="modal fade" id="custom-date-modal" tabindex="-1" aria-labelledby="customDateModalLabel">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-white px-2" style="height:335px; width: 65%; font-family: Poppins;">
            <h5 class="modal-title text-center fw-bold mb-0 mt-4" id="customDateModalLabel" style="font-size: 1.5rem; letter-spacing: 2px;">Select Date Range</h5>
            <hr class="align-self-center mt-2 mb-2 opacity-100" style="width:40%;">
            <div class="modal-body" style="font-size: 1.2rem; letter-spacing: 1.5px;">
                <form action="{{$actionRoute}}" method="GET">
                    @csrf
                    <input type="hidden" name="interval" value="custom">
                    <div class="form-group mb-3">
                        <label for="start_date" class="form-label text-black fw-semibold modal-date-label">Start Date:</label>
                        <input type="date" id="start_date" name="start_date" class="form-control rounded-0 modal-date-label" style="border: none; border-bottom: 1px solid black;" value="{{ request('start_date', \Carbon\Carbon::now()->subDays(6)->toDateString()) }}" required />
                    </div>
                    <div class="form-group mb-4">
                        <label for="end_date" class="form-label text-black fw-semibold modal-date-label">End Date:</label>
                        <input type="date" id="end_date" name="end_date" class="form-control rounded-0 modal-date-label" style="border: none; border-bottom: 1px solid black;" value="{{ request('end_date', \Carbon\Carbon::now()->toDateString()) }}" required />
                    </div>
                    <div class="d-flex justify-content-around">
                        <button type="button" onclick="closeModal()" class="btn text-body-tertiary fw-bold modal-date-button" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn text-black fw-bold modal-date-button">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- DATE FILTER MODAL for FEEDBACKS-->
@else
<div class="modal fade" id="feedbacks-date-modal" tabindex="-1" aria-labelledby="feedbacksDateModalLabel">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-white px-2" style="height:335px; width: 65%; font-family: Poppins;">
            <h5 class="modal-title text-center fw-bold mb-0 mt-4" id="feedbacksDateModalLabel" style="font-size: 1.5rem; letter-spacing: 2px;">Select Date Range</h5>
            <hr class="align-self-center mt-2 mb-2 opacity-100" style="width:40%;">
            <div class="modal-body" style="font-size: 1.2rem; letter-spacing: 1.5px;">
                <form id="feedbacks-form">
                    @csrf
                    <input type="hidden" name="interval" value="custom">
                    <div class="form-group mb-3">
                        <label for="start_date" class="form-label text-black fw-semibold modal-date-label">Start Date:</label>
                        <input type="date" id="start_date" name="start_date" class="form-control rounded-0 modal-date-label" style="border: none; border-bottom: 1px solid black;" required />
                    </div>
                    <div class="form-group mb-4">
                        <label for="end_date" class="form-label text-black fw-semibold modal-date-label">End Date:</label>
                        <input type="date" id="end_date" name="end_date" class="form-control rounded-0 modal-date-label" style="border: none; border-bottom: 1px solid black;" required />
                    </div>
                    <div class="d-flex justify-content-around">
                        <button type="button" class="btn text-body-tertiary fw-bold modal-date-button" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn text-black fw-bold modal-date-button">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif