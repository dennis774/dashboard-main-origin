<div class="container">
    <div class="row">
        <div class="col-lg-3">.</div>
        <div class="col-lg-6 footer">
            <div class="row">
                <div class="col-lg-4 d-flex justify-content-center">
                    <button onclick="generatePDF()" class="btn btn-outline-light">Generate PDF</button>
                </div>
                <div class="col-lg-5 d-flex justify-content-center align-items-center">
                    <div class="dropdown select-wrapper">
                        <select id="dateFilter" onchange="handleFilterChange()" class="dropdownforModal">
                            <option value="" selected disabled>Select filter</option>
                            <option value="today" {{ request('interval') == 'today' ? 'selected' : '' }}>Today</option>
                            <option value="yesterday" {{ request('interval') == 'yesterday' ? 'selected' : '' }}>Yesterday</option>
                            <option value="last3days" {{ request('interval') == 'last3days' ? 'selected' : '' }}>Last 3 Days</option>
                            <option value="last5days" {{ request('interval') == 'last5days' ? 'selected' : '' }}>Last 5 Days</option>
                            <option value="lastweek" {{ request('interval') == 'lastweek' ? 'selected' : '' }}>Last Week</option>
                            <option value="thisweek" {{ request('interval', 'thisweek') == 'thisweek' ? 'selected' : '' }}>This Week</option>
                            <option value="thismonth" {{ request('interval') == 'thismonth' ? 'selected' : '' }}>This Month</option>
                            <option value="lastmonth" {{ request('interval') == 'lastmonth' ? 'selected' : '' }}>Last Month</option>
                            <option value="thisyear" {{ request('interval') == 'thisyear' ? 'selected' : '' }}>This Year</option>
                            <option value="lastyear" {{ request('interval') == 'lastyear' ? 'selected' : '' }}>Last Year</option>
                            <option value="overall" {{ request('interval') == 'overall' ? 'selected' : '' }}>Overall</option>
                            <option value="custom" {{ request('interval') == 'custom' ? 'selected' : '' }}>Custom</option>
                        </select>
                        <i class="fa-solid fa-chevron-down dropdown-icon"></i>
                    </div>
                </div>
                <div class="col-lg-3 d-flex justify-content-center align-items-center">
                    @if(request()->routeIs(['general.uddesign.dashboard', 'general.uddesign.sales', 'general.uddesign.expenses']))
                        <form action="{{ route('refresh.data', ['type' => 'uddesign']) }}" method="GET">
                            <button type="submit" class="btn btn-link px-2 refreshButton" style="color: #007bff;">
                                <i class="fas fa-sync-alt fa-lg refreshIcon"></i>
                            </button>
                        </form>
                    @endif

                    @if(request()->routeIs(['general.kuwago-one.dashboard', 'general.kuwago-one.sales', 'general.kuwago-one.expenses']))
                        <form action="{{ route('refresh.data', ['type' => 'kuwago_one']) }}" method="GET">
                            <button type="submit" class="btn btn-link px-2 refreshButton" style="color: #007bff;">
                                <i class="fas fa-sync-alt fa-lg refreshIcon"></i>
                            </button>
                        </form>
                    @endif
                    
                    @if(request()->routeIs(['general.kuwago-two.dashboard', 'general.kuwago-two.sales', 'general.kuwago-two.expenses']))
                        <form action="{{ route('refresh.data', ['type' => 'kuwago_two']) }}" method="GET">
                            <button type="submit" class="btn btn-link px-2 refreshButton" style="color: #007bff;">
                                <i class="fas fa-sync-alt fa-lg refreshIcon"></i>
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-3">.</div>
    </div>

    <div class="modal-bg" id="customDateModal">
        <div class="modal-content">
            <h5>Select Date Range</h5>
            <form action="{{$actionRoute}}" method="GET">
                @csrf
                <input type="hidden" name="interval" value="custom">
                <div class="form-group mb-3">
                    <label for="start_date" class="form-label text-white">Start Date:</label>
                    <input type="date" id="start_date" name="start_date" class="form-control" value="{{ request('start_date', \Carbon\Carbon::now()->subDays(6)->toDateString()) }}" required />
                </div>
                <div class="form-group mb-3">
                    <label for="end_date" class="form-label text-white">End Date:</label>
                    <input type="date" id="end_date" name="end_date" class="form-control" value="{{ request('end_date', \Carbon\Carbon::now()->toDateString()) }}" required />
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" onclick="closeModal()" class="btn btn-secondary me-2">Cancel</button>
                    <button type="submit" class="btn btn-primary">Generate Report</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const dateFilter = document.getElementById('dateFilter');
    const dropdownIcon = document.querySelector('.dropdown-icon');

    dateFilter.addEventListener('focus', () => {
        dropdownIcon.classList.remove('fa-chevron-down');
        dropdownIcon.classList.add('fa-chevron-up');
    });

    dateFilter.addEventListener('blur', () => {
        dropdownIcon.classList.remove('fa-chevron-up');
        dropdownIcon.classList.add('fa-chevron-down');
    });
</script>

<style>
.footer {
    background: rgba(255, 255, 255, 0.1); 
    backdrop-filter: blur(10px); 
    border-radius: 50px; 
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
    height: 55px;
    padding: 7px 0px; 
}

.dropdownforModal {
    background-color: transparent;
    color: white;  /* Dropdown button text color */
    border: none;
    box-shadow: none;
    padding: 5px 10px;
    appearance: none; /* Removes the default select arrow */
    cursor: pointer;
    width: 100%;
}

.dropdownforModal option {
    background-color: white;
    color: black;  /* Dropdown options text color */
    padding: 5px 10px;
}

.dropdownforModal:hover,
.dropdownforModal:focus {
    outline: none;
}

/* Optional styling for custom arrow */
.dropdownforModal::after {
    content: '\25BC'; /* Downward arrow */
    font-size: 12px;
    color: white;
    position: absolute;
    right: 15px;
}
.modal-content {
    background-color: #fff; 
    padding: 20px;
    border-radius: 8px;
    width: 400px; 
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.select-wrapper {
    display: flex;
    align-items: center; /* Align text and icon vertically */
    gap: 5px; /* Add space between text and icon */
    color: white; /* Text and icon color */
}

.dropdownforModal {
    background-color: transparent;
    border: none;
    color: white;
    padding: 5px;
    font-size: 16px;
    cursor: pointer;
    appearance: none; /* Removes default select arrow */
}

.dropdown-icon {
    font-size: 16px;
    display: inline-block; /* Ensure icon stays inline with text */
}
#dateFilter {
    border-bottom: 2px solid white; /* White line under the dropdown */
}


</style>
