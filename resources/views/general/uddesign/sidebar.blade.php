<ul class="nav flex-column pb-2 pt-1 justify-content-between ">
    <li class="nav-item nav-item-icon">
        <a href="{{route('general.uddesign.dashboard')}}"
            class="{{ request()->routeIs('general.uddesign.dashboard') ? 'active' : '' }}"
            data-tooltip="Main Dashboard">
            <img src="{{ asset('assets/images/icons/general-img-icon.png') }}" style="height: 22px;" alt="General Dashboard Tab">
        </a>
    </li>

    <li class="nav-item nav-item-icon">
        <a href="{{route('general.uddesign.sales')}}"
            class="{{ request()->routeIs('general.uddesign.sales') ? 'active' : '' }}"
            data-tooltip="Sales">
            <img src="{{ asset('assets/images/icons/sales-img-icon.png') }}" style="height: 23px;" alt="Sales Dashboard Tab">
        </a>
    </li>
    <li class="nav-item nav-item-icon">
        <a href="{{route('general.uddesign.expenses')}}"
            class="{{ request()->routeIs('general.uddesign.expenses') ? 'active' : '' }}"
            data-tooltip="Expenses">
            <img src="{{ asset('assets/images/icons/expenses-img-icon.png') }}" style="height: 23px;" alt="Expenses Dashboard Tab">
        </a>
    </li>
    <li class="nav-item nav-item-icon">
        <a href="{{url('/uddesign/promos')}}"
            class="{{ request()->routeIs('general.uddesign.promos') ? 'active' : '' }}"
            data-tooltip="Promos">
            <img src="{{ asset('assets/images/icons/promos-img-icon.png') }}" style="height: 23px;" alt="Promos Dashboard Tab">
        </a>
    </li>
    <li class="nav-item nav-item-icon">
        <a href="{{url('/uddesign/feedbacks')}}"
            class="{{ request()->routeIs('general.uddesign.feedbacks') ? 'active' : '' }}"
            data-tooltip="Feedbacks">
            <img src="{{ asset('assets/images/icons/feedbacks-img-icon.png') }}" style="height: 22px;" alt="Feedbacks Dashboard Tab">
        </a>
    </li>
</ul>



<!-- UNUSED -->
{{--
<div class="row mt-5"></div>
<div class="row mt-4">
    <div class="col-lg-6 sidebar" style="height: 300px; background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); width:60px; border-radius:30px; z-index:1;">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{route('general.kuwago-one.dashboard')}}"
class="{{ request()->routeIs('general.kuwago-one.dashboard') ? 'active' : '' }}"
data-tooltip="Main Dashboard">
<i class="fa-solid fa-border-all"></i>
</a>
</li>

<li class="nav-item">
    <a href="{{route('general.kuwago-one.sales')}}"
        class="{{ request()->routeIs('general.kuwago-one.sales') ? 'active' : '' }}"
        data-tooltip="Sales">
        <i class="fa-solid fa-chart-line"></i>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('general.kuwago-one.expenses')}}"
        class="{{ request()->routeIs('general.kuwago-one.expenses') ? 'active' : '' }}"
        data-tooltip="Expenses">
        <i class="fa-solid fa-wallet"></i>
    </a>
</li>
<li class="nav-item">
    <a href="{{url('/kuwago-one/promos')}}"
        class="{{ request()->routeIs('general.kuwago-one.promos') ? 'active' : '' }}"
        data-tooltip="Promos">
        <i class="fa-solid fa-tags"></i>
    </a>
</li>
<li class="nav-item">
    <a href="{{url('/kuwago-one/feedbacks')}}"
        class="{{ request()->routeIs('general.kuwago-one.feedbacks') ? 'active' : '' }}"
        data-tooltip="Feedbacks">
        <i class="fa-solid fa-star"></i>
    </a>
</li>
</ul>
</div>
<div class="col-lg-6"></div>
</div>
--}}






{{-- ORIGINAL CODE --}}
<?php /*
<div class="row mt-5"></div>
<div class="row mt-4">
    <div class="col-lg-6 sidebar" style="height: 300px; background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); width:60px; border-radius:30px; z-index:1;">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{route('general.uddesign.dashboard')}}"
                    class="{{ request()->routeIs('general.uddesign.dashboard') ? 'active' : '' }}"
                    data-tooltip="Main Dashboard">
                    <i class="fa-solid fa-border-all"></i>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('general.uddesign.sales')}}"
                    class="{{ request()->routeIs('general.uddesign.sales') ? 'active' : '' }}"
                    data-tooltip="Sales">
                    <i class="fa-solid fa-chart-line"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('general.uddesign.expenses')}}"
                    class="{{ request()->routeIs('general.uddesign.expenses') ? 'active' : '' }}"
                    data-tooltip="Expenses">
                    <i class="fa-solid fa-wallet"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('/uddesign/promos')}}"
                    class="{{ request()->routeIs('general.uddesign.promos') ? 'active' : '' }}"
                    data-tooltip="Promos">
                    <i class="fa-solid fa-tags"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('/uddesign/feedbacks')}}"
                    class="{{ request()->routeIs('general.uddesign.feedbacks') ? 'active' : '' }}"
                    data-tooltip="Feedbacks">
                    <i class="fa-solid fa-star"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="col-lg-6"></div>
</div>

<style>
    .sidebar {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-around;
        padding: 5px 0;
    }

    .sidebar .nav {
        padding: 0;
        margin: 0;
        list-style-type: none;
    }

    .sidebar .nav-item {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 15px 0;
    }

    .sidebar .nav-item a i {
        font-size: 24px;
        color: white;
    }

    .sidebar .nav-item a {
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        color: inherit;
    }

    .nav-link {
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        color: white;
    }

    .nav-link i {
        font-size: 24px;
        margin: 8px 0;
        transition: background-color 0.3s, color 0.3s;
    }

    .sidebar .nav-item a {
        position: relative;
    }

    .sidebar .nav-item a::after {
        content: attr(data-tooltip);
        position: absolute;
        left: 60px;
        opacity: 0;
        color: white;
        background: rgba(0, 0, 0, 0.7);
        padding: 5px 10px;
        border-radius: 5px;
        white-space: nowrap;
        font-size: 14px;
        transition: opacity 0.3s ease, transform 0.3s ease;
        transform: translateX(-10px);
        pointer-events: none;
    }

    .sidebar .nav-item a:hover::after {
        opacity: 1;
        transform: translateX(0);
    }

    .sidebar .nav-item a.active {
        background-color: white;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        
        justify-content: center;
        margin: 0 auto;
    }

    .sidebar .nav-item a.active i {
        color: rgba(0, 0, 0, 0.7);
    }
</style>
*/ ?>