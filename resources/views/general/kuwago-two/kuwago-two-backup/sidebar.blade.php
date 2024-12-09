<div class="row mt-5"></div>
                <div class="row mt-4">  
                    <div class="col-lg-6 sidebar" style="height: 300px; background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); width:60px; border-radius:30px; z-index:1;">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="{{route('general.kuwago-two.dashboard')}}" 
                                   class="{{ request()->routeIs('general.kuwago-two.dashboard') ? 'active' : '' }}" 
                                   data-tooltip="Main Dashboard">
                                    <i class="fa-solid fa-border-all"></i>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="{{route('general.kuwago-two.sales')}}" 
                                class="{{ request()->routeIs('general.kuwago-two.sales') ? 'active' : '' }}" 
                                data-tooltip="Sales"> 
                                    <i class="fa-solid fa-chart-line"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('general.kuwago-two.expenses')}}" 
                                class="{{ request()->routeIs('general.kuwago-two.expenses') ? 'active' : '' }}" 
                                data-tooltip="Expenses"> 
                                    <i class="fa-solid fa-wallet"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('general.kuwago-two.promos')}}" 
                                class="{{ request()->routeIs('general.kuwago-two.promos') ? 'active' : '' }}" 
                                data-tooltip="Promos"> 
                                    <i class="fa-solid fa-tags"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('general.kuwago-two.feedbacks') }}"
                                    class="{{ request()->routeIs('general.kuwago-two.feedbacks') ? 'active' : '' }}"
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
    flex-direction: column; /* Stack the items vertically */
    align-items: center; /* Center items horizontally */
    justify-content: space-around; /* Distribute icons evenly within the sidebar */
    padding: 5px 0; /* Add consistent padding to the top and bottom */
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
    background-color: white; /* White background for active tab */
    border-radius: 50%; /* Circle shape */
    width: 40px; /* Adjust width for proper centering */
    height: 40px; /* Adjust height for proper centering */
    display: flex; /* Center the icon */
    align-items: center; /* Vertically center icon */
    justify-content: center; /* Horizontally center icon */
    margin: 0 auto; /* Center the active tab horizontally within the sidebar */
}

.sidebar .nav-item a.active i {
    color: rgba(0, 0, 0, 0.7); /* Darker color for the icon on active tab */
}


</style>
