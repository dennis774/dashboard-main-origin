{{-- START OF TOP BAR --}}

<nav class="navbar navbar-expand-lg mt-4">
    <div class="container justify-content-center">
        <!-- NAVBAR -->
        <div class="row d-flex rounded-5 py-1 justify-content-between nav-row">
            <div class="col-3 flex-grow-1 flex-lg-grow-0 d-flex align-items-center justify-content-center justify-content-lg-end" style="width: min-content;">
                <a class="navbar-brand me-0 me-lg-2" href="#">
                    <img src="{{ asset('assets/images/icons/user-profile-img.jpeg') }}" class="object-fit-cover border border-white" style="height: 45px; width: 45px; border-radius: 100%;" alt="Profile Image">
                </a>
                <p class="mb-0 d-none d-lg-flex text-white text-greeting">Welcome, {{ Auth::user()->name }}!</p>
            </div>
            <div class="col-6 col-lg dropdown d-flex btn-group justify-content-center align-items-center">
                <!-- BUSINESSES DROPDOWN -->
                <button class="btn btn-lg rounded-5 dropdown-toggle dropdown-business-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="col-0 col-lg-3"></div>
                    <div class="col-9 col-lg-6" id="nav-business-dropdown">
                        Business
                    </div>
                    <div class="col-3 d-flex justify-content-end">
                        <ion-icon name="chevron-down-outline" class="align-self-middle"></ion-icon>
                    </div>
                </button>
                <ul class="z-3 position-absolute rounded-bottom-2 rounded-top-0 dropdown-menu dropdown-business-menu" aria-labelledby="nav-business-dropdown">
                    @if (Auth::check() && Auth::user()->role == 'owner')
                        <li><a class="py-2 text-white dropdown-item business-item {{ Str::contains(request()->path(), 'executive') ? 'active' : '' }}" href="{{ url('/executive') }}" data-name="Executive">Executive</a></li>
                    @endif

                    @if (Auth::check() && Auth::user()->role != 'uddesign')
                    <li><a class="py-2 text-white dropdown-item business-item {{ Str::contains(request()->path(), 'kuwago-one') ? 'active' : '' }}" href="{{ url('/kuwago-one') }}" data-name="Kuwago Cafe 1">Kuwago Cafe 1</a></li>
                    <li><a class="py-2 text-white dropdown-item business-item {{ Str::contains(request()->path(), 'kuwago-two') ? 'active' : '' }}" href="{{ url('/kuwago-two') }}" data-name="Kuwago Cafe 2">Kuwago Cafe 2</a></li>
                    @endif

                    @if (Auth::check() && Auth::user()->role != 'kuwago')
                    <li><a class="py-2 text-white dropdown-item business-item {{ Str::contains(request()->path(), 'uddesign') ? 'active' : '' }}" href="{{ url('/uddesign') }}" data-name="UdDesign">UdDesign</a></li>
                    @endif
                </ul>
                <!-- END BUSINESSES DROPDOWN -->
            </div>
            <!-- NAV TOGGLER / NAV ITEMS -->
            <div class="col-3 d-flex justify-content-center align-items-center text-center">
                <button class="navbar-toggler align-items-center border-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span><ion-icon name="menu-outline" class="text-white"></ion-icon></span>
                </button>
                <ul class="rounded-bottom-2 rounded-top-0 dropdown-menu dropdown-menu-end">
                    <li class="dropdown-list py-2">
                        <a class="dropdown-item dropdown-nav-item" href="{{url('/business')}}">
                            <img src="{{ asset('assets/images/icons/business-img-icon.png') }}" style="height: 25px;" alt="Businesses Tab">
                        </a>
                    </li>
                    <li class="dropdown-list pb-2">
                        @if (Auth::check() && Auth::user()->role == 'owner')
                            <a class="dropdown-item dropdown-nav-item" href="{{url('/account')}}">
                                <img src="{{ asset('assets/images/icons/accounts-img-icon.png') }}" style="height: 25px;" alt="Accounts Tab">
                            </a>
                        @else
                            <a class="dropdown-item dropdown-nav-item" href="{{ route('settings.account-show', ['id' => Auth::user()->id]) }}">
                                <img src="{{ asset('assets/images/icons/accounts-img-icon.png') }}" style="height: 25px;" alt="Accounts Tab">
                            </a>
                        @endif
                    </li>
                    <li class="dropdown-list pb-2">
                        <a class="dropdown-item dropdown-nav-item" href="{{ route('targetSales.index') }}">
                            <img src="{{ asset('assets/images/icons/targets-img-icon.png') }}" style="height: 25px;" alt="Financial Targets Tab">
                        </a>
                    </li>
                    @if (Auth::check())
                    <li class="dropdown-list pb-2">
                        <a class="dropdown-item dropdown-nav-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            <img src="{{ asset('assets/images/icons/logout-img-icon.png') }}" style="height: 25px;" alt="Logout Button">
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endif
                </ul>
                <div class="collapse navbar-collapse justify-content-evenly">
                    <ul class="flex-grow-1 navbar-nav d-none d-lg-flex justify-content-evenly">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/business')}}">
                                <img src="{{ asset('assets/images/icons/business-img-icon.png') }}" style="height: 30px;" alt="Businesses Tab">
                            </a>
                        </li>
                        @if (Auth::check() && Auth::user()->role == 'owner')
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/account')}}">
                                    <img src="{{ asset('assets/images/icons/accounts-img-icon.png') }}" style="height: 30px;" alt="Accounts Tab">
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('settings.account-show', ['id' => Auth::user()->id])}}">
                                    <img src="{{ asset('assets/images/icons/accounts-img-icon.png') }}" style="height: 30px;" alt="Accounts Tab">
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('targetSales.index') }}">
                                <img src="{{ asset('assets/images/icons/targets-img-icon.png') }}" style="height: 30px;" alt="Financial Targets Tab">
                            </a>
                        </li>
                        @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#logout-modal">
                                <img src="{{ asset('assets/images/icons/logout-img-icon.png') }}" style="height: 30px;" alt="Logout Button">
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @endif
                    </ul>
                </div>
                <!-- END NAV TOGGLER / NAV ITEMS -->
            </div>
        </div>
        <!-- END NAVBAR -->
    </div>
</nav>

<div class="modal fade" id="logout-modal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center bg-white py-4" style="height: 300px; font-family: Poppins;">
            <h5 class="modal-title fw-bold mb-0 mt-3" id="logoutModalLabel" style="font-size: 2rem; letter-spacing: 2px;">Come Back Soon!</h5>
            <hr class="align-self-center mt-1 mb-4 opacity-100" style="width:30%;">
            <div class="modal-body text-center px-5" style="font-size: 1.2rem; letter-spacing: 1.5px;">
                Are you sure you want to logout? You will be redirected to the login page.
            </div>
            <div class="modal-footer d-flex justify-content-around border-0">
                <button type="button" class="btn text-body-tertiary fw-bold" style="font-size: 1.2rem; letter-spacing: 2px;" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn text-black fw-bold" style="font-size: 1.2rem; letter-spacing: 2px;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</button>
            </div>
        </div>
    </div>
</div>




<!-- <div class="container">
    <div class="row">
        <div class="col-lg-2">.</div>
        <div class="col-lg-8 mt-3" style="z-index: 1;">
            {{-- TOPBAR --}}
            <div class="row topbar">
                <div class="col-lg-4 d-flex justify-content-start align-items-center user-info">
                    {{-- <img src="https://via.placeholder.com/80" class="user-image" /> --}}
                    <img src="{{ asset('user_images/' . Auth::user()->user_image) }}" alt="User Image" class="rounded-circle " style="width: 50px; height:50px;">
                    <span class="user-welcome">Welcome, {{ Auth::user()->name }}!</span>
                </div>
                <div class="col-lg-4 d-flex justify-content-center align-items-center">
                    <div class="mx-auto dropdown-oval-container">
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                Business
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="{{ url('/kuwago-one') }}" data-name="Kuwago Cafe 1">Kuwago Cafe 1</a></li>
                                <li><a class="dropdown-item" href="{{ url('/kuwago-two') }}" data-name="Kuwago Cafe 2">Kuwago Cafe 2</a></li>
                                <li><a class="dropdown-item" href="{{ url('/uddesign') }}" data-name="Uddesign">Uddesign</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex justify-content-center align-items-center">
                    <div>
                        <a href="{{url('/business')}}" class="mx-2"><i class="fa-solid fa-store"></i></a>
                        <a href="{{ route('targetSales.index') }}" class="mx-2"><i class="fa-solid fa-crosshairs"></i></a>
                        <a href="{{url('/account')}}" class="mx-2"><i class="fa-solid fa-user"></i></a>
                        <a href="{{ route('settings.account-show', ['id' => Auth::user()->id]) }}" class="mx-2"><i class="fa-solid fa-gear"></i></a>
                        @if (Auth::check())
                        <a href="#" class="mx-2" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        </a>

                        <!-- Logout Form 
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2">.</div>
    </div>
</div> -->

<!-- Logout Modal
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 800px; margin: auto;"> <!-- Increase modal width and center it
        <div class="modal-content text-center">
            <div class="modal-header justify-content-center"> <!-- Center header text
                <h5 class="modal-title w-100" id="logoutModalLabel">Comeback Soon!</h5>
            </div>
            <div class="modal-body">
                Are you sure you want to logout? You will be redirected to the login page.
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn" data-bs-dismiss="modal" style="color: #aaa; font-weight: bold;">Cancel</button> <!-- Custom Cancel button style 
                <button type="button" class="btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: red; font-weight: bold;">Sign out</button> <!-- Custom Sign out button style
            </div>
        </div>
    </div>
</div> -->
{{-- END OF TOP BAR --}}



<style>
    .modal-dialog {
        width: 100%;
        max-width: 45vw;
    }

    /* 
    .user-info {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .user-image {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }

    .user-welcome {
        font-size: 14px;
        color: #fff;
    }

    .dropdown-oval-container {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 50px;
        padding: 10px 70px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 38px;
    }

    .dropdown-toggle {
        background: transparent;
        border: none;
        color: white;
        font-weight: bold;
        font-size: 18px;
    }

    .dropdown-item {
        color: #333;
    }

    .fa-solid {
        font-size: 18px;
        color: #fff;
    }

    div.topbar {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 50px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin: 20px auto;
        width: 95%;
        max-width: 1200px;
        height: 55px;
    } */
</style>