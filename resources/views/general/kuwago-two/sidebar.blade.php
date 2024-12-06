<ul class="nav flex-column pb-2 pt-1 justify-content-between ">
    <li class="nav-item nav-item-icon">
        <a href="{{route('general.kuwago-two.dashboard')}}"
            class="{{ request()->routeIs('general.kuwago-two.dashboard') ? 'active' : '' }}"
            data-tooltip="Main Dashboard">
            <img src="{{ asset('assets/images/icons/general-img-icon.png') }}" style="height: 22px;" alt="General Dashboard Tab">
        </a>
    </li>

    <li class="nav-item nav-item-icon">
        <a href="{{route('general.kuwago-two.sales')}}"
            class="{{ request()->routeIs('general.kuwago-two.sales') ? 'active' : '' }}"
            data-tooltip="Sales">
            <img src="{{ asset('assets/images/icons/sales-img-icon.png') }}" style="height: 23px;" alt="Sales Dashboard Tab">
        </a>
    </li>
    <li class="nav-item nav-item-icon">
        <a href="{{route('general.kuwago-two.expenses')}}"
            class="{{ request()->routeIs('general.kuwago-two.expenses') ? 'active' : '' }}"
            data-tooltip="Expenses">
            <img src="{{ asset('assets/images/icons/expenses-img-icon.png') }}" style="height: 23px;" alt="Expenses Dashboard Tab">
        </a>
    </li>
    <li class="nav-item nav-item-icon">
        <a href="{{route('general.kuwago-two.promos')}}"
            class="{{ request()->routeIs('general.kuwago-two.promos') ? 'active' : '' }}"
            data-tooltip="Promos">
            <img src="{{ asset('assets/images/icons/promos-img-icon.png') }}" style="height: 23px;" alt="Promos Dashboard Tab">
        </a>
    </li>
    <li class="nav-item nav-item-icon">
        <a href="{{route('general.kuwago-two.feedbacks')}}"
            class="{{ request()->routeIs('general.kuwago-two.feedbacks') ? 'active' : '' }}"
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