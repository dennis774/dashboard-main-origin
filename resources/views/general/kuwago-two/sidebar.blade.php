
<div class="row mt-5"></div>
                <div class="row mt-4">  
                    <div class="col-lg-6 sidebar" style="height: 300px; background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); width:60px; border-radius:30px; z-index:1;">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="{{route('general.kuwago-two.dashboard')}}" data-tooltip="Main Dashboard"> 
                                    <i class="fa-solid fa-border-all" style="color: white; margin-bottom: 8px; margin-top: 8px;"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('general.kuwago-two.sales')}}" data-tooltip="Sales"> 
                                    <i class="fa-solid fa-chart-line" style="color: white; margin-bottom: 8px;"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('general.kuwago-two.expenses')}}" data-tooltip="Expenses"> 
                                    <i class="fa-solid fa-wallet" style="color: white; margin-bottom: 8px;"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/kuwago-two/promos')}}" data-tooltip="Promos"> 
                                    <i class="fa-solid fa-tags" style="color: white; margin-bottom: 8px;"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/kuwago-two/feedbacks')}}" data-tooltip="Feedbacks"> 
                                    <i class="fa-solid fa-star" style="color: white; margin-bottom: 8px;"></i>
                                </a>
                            </li>
                        </ul>
                    </div>                  
                    <div class="col-lg-6"></div>
                </div>

<style>

.sidebar .nav {
    padding: 0;
    margin: 0;
    list-style-type: none;
}

.sidebar .nav-item {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 13px 0;
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
</style>
