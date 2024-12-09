<ul class="nav flex-column pb-2 pt-1 justify-content-between ">
    <li class="nav-item nav-item-icon">
        <a href="{{route('general.kuwago-one.dashboard')}}"
            class="{{ request()->routeIs('general.kuwago-one.dashboard') ? 'active' : '' }}"
            data-tooltip="Main Dashboard">
            <img src="{{ asset('assets/images/icons/general-img-icon.png') }}" style="height: 22px;" alt="General Dashboard Tab">
        </a>
    </li>

    <li class="nav-item nav-item-icon">
        <a href="{{route('general.kuwago-one.sales')}}"
            class="{{ request()->routeIs('general.kuwago-one.sales') ? 'active' : '' }}"
            data-tooltip="Sales">
            <img src="{{ asset('assets/images/icons/sales-img-icon.png') }}" style="height: 23px;" alt="Sales Dashboard Tab">
        </a>
    </li>
    <li class="nav-item nav-item-icon">
        <a href="{{route('general.kuwago-one.expenses')}}"
            class="{{ request()->routeIs('general.kuwago-one.expenses') ? 'active' : '' }}"
            data-tooltip="Expenses">
            <img src="{{ asset('assets/images/icons/expenses-img-icon.png') }}" style="height: 23px;" alt="Expenses Dashboard Tab">
        </a>
    </li>
    <li class="nav-item nav-item-icon">
        <a href="{{ route('general.kuwago-one.promos') }}"
            class="{{ request()->routeIs('general.kuwago-one.promos') ? 'active' : '' }}"
            data-tooltip="Promos">
            <img src="{{ asset('assets/images/icons/promos-img-icon.png') }}" style="height: 23px;" alt="Promos Dashboard Tab">
        </a>
    </li>
    <li class="nav-item nav-item-icon">
        <a href="{{ route('general.kuwago-one.feedbacks') }}"
            class="{{ request()->routeIs('general.kuwago-one.feedbacks') ? 'active' : '' }}"
            data-tooltip="Feedbacks">
            <img src="{{ asset('assets/images/icons/feedbacks-img-icon.png') }}" style="height: 22px;" alt="Feedbacks Dashboard Tab">
        </a>
    </li>
</ul>
