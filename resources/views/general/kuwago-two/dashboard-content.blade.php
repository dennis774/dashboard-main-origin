<!-- DASHBOARD PANEL -->
<div class="d-flex rounded-4 dashboard-panel">
    <div class="row d-flex flex-grow-1 m-0 column-gap-3 h-100 rounded-4 justify-content-center align-items-center text-white " style="padding-inline: 2%; padding-block: 2.5%;">
        <!-- LEFT COLUMN -->
        <div class="col-auto p-0 h-100" style="width: 43%;">
            <!-- SALES & PROFIT -->
            <div class="row d-flex flex-grow-1 w-100 m-0 mb-3 column-gap-3 align-items-center" style="height: 33.3%;">
                <div class="col h-100 p-0">
                    <div class="card rounded-4 h-100 w-100 dashboard-card">
                        <!-- DB CARD TITLE -->
                        <div class="row mt-3 justify-content-start w-100">
                            <div class="col-12 align-items-center justify-content-center">
                                <div class="card-title d-flex mb-0 align-items-center">
                                    <img src="{{ asset('assets/images/icons/total-sales-icon.png') }}" style="height: 30px;" alt="Total Sales Icon">
                                    <h5 class="card-title mb-0 ms-2 db-card-title">Total Sales</h5>
                                </div>
                            </div>
                        </div>
                        <!-- DB CARD CONTENT -->
                        <div class="row d-flex flex-grow-1 pb-3 align-items-center" style="max-width: 240px;">
                            <div class="col-12 align-self-middle dashboard-total-text">
                                <span>{{ number_format($totalSales, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col h-100 p-0">
                    <div class="card rounded-4 h-100 w-100 dashboard-card">
                        <!-- DB CARD TITLE -->
                        <div class="row mt-3 justify-content-start w-100">
                            <div class="col-12 align-items-center justify-content-center">
                                <div class="card-title d-flex mb-0 align-items-center">
                                    <img src="{{ asset('assets/images/icons/total-profit-icon.png') }}" style="height: 30px;" alt="Total Profit Icon">
                                    <h5 class="card-title mb-0 ms-2 db-card-title">Total Profit</h5>
                                </div>
                            </div>
                        </div>
                        <!-- DB CARD CONTENT -->
                        <div class="row d-flex flex-grow-1 pb-3 align-items-center" style="max-width: 240px;">
                            <div class="col-12 align-self-middle dashboard-total-text">
                                <span>{{ number_format($totalProfit, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- EXPENSES & ORDER -->
            <div class="row d-flex flex-grow-1 w-100 m-0 mb-3 column-gap-3 align-items-center" style="height: 33.3%;">
                <div class="col h-100 p-0">
                    <div class="card rounded-4 h-100 w-100 dashboard-card">
                        <!-- DB CARD TITLE -->
                        <div class="row mt-3 justify-content-start w-100">
                            <div class="col-12 align-items-center justify-content-center">
                                <div class="card-title d-flex mb-0 align-items-center">
                                    <img src="{{ asset('assets/images/icons/total-expenses-icon.png') }}" style="height: 30px;" alt="Total Expenses Icon">
                                    <h5 class="card-title mb-0 ms-2 db-card-title">Total Expenses</h5>
                                </div>
                            </div>
                        </div>
                        <!-- DB CARD CONTENT -->
                        <div class="row d-flex flex-grow-1 pb-3 align-items-center" style="max-width: 240px;">
                            <div class="col-12 align-self-middle dashboard-total-text">
                                <span>{{ number_format($totalExpenses, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col h-100 p-0">
                    <div class="card rounded-4 h-100 w-100 dashboard-card">
                        <!-- DB CARD TITLE -->
                        <div class="row mt-3 justify-content-start w-100">
                            <div class="col-12 align-items-center justify-content-center">
                                <div class="card-title d-flex mb-0 align-items-center">
                                    <img src="{{ asset('assets/images/icons/total-orders-icon.png') }}" style="height: 30px;" alt="Total Orders Icon">
                                    <h5 class="card-title mb-0 ms-2 db-card-title">Total Orders</h5>
                                </div>
                            </div>
                        </div>
                        <!-- DB CARD CONTENT -->
                        <div class="row d-flex flex-grow-1 pb-3 align-items-center" style="max-width: 240px;">
                            <div class="col-12 align-self-middle dashboard-total-text">
                                <span>{{ number_format($totalOrders) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- TARGET SALES -->
            <div class="row d-flex flex-grow-1 w-100 m-0 align-items-center" style="height: 24%;">
                <div class="col p-0" style="height: 100%;">
                    <div class="d-flex flex-column rounded-4 h-100 w-100 dashboard-card">
                        <!-- DB CARD TITLE -->
                        <div class="row justify-content-start h-100 w-100">
                            <div class="col-7 align-items-center justify-content-center">
                                <div class="col-12 d-flex mb-0 mt-3 align-items-center">
                                    {{-- CARD TITLE --}}
                                    <h5 class="mb-0 ms-2 db-card-title">Target Sales</h5>
                                </div>
                                <div class="col-12 d-flex h-100 w-100 px-3 column-gap-2 align-items-center" style="max-height: 70%;">
                                    <div class="col-7 align-self-middle text-start lh-1 dashboard-total-text">

                                    @if ($financialTargetSales)
                                        {{$financialTargetSales->amount}}<br>
                                        <span style="font-size: 0.65rem; font-weight: normal;">{{ $financialTargetSales->start_date }} - {{ $financialTargetSales->end_date }}</span>
                                    @else
                                        <p>No target sale found for display.</p>
                                        <span style="font-size: 8px;">No target sale found for display.</span>
                                    @endif
                                    
                                    </div>
                                    
                                </div>
                            </div>
                            {{-- TARGET SALES CHART --}}
                            <div class="col-5 d-flex justify-content-center align-items-center h-100" style="max-width: 80%;">
                                <canvas id="gaugeChart" width="400" height="200"></canvas>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- END TARGET SALES -->
        </div>
        <!-- END LEFT COLUMN -->

        <!-- RIGHT COLUMN -->
        <div class="col p-0 h-100">
            <!-- SALES PROFIT EXPENSES CARD-->
            <div class="row d-flex flex-grow-1 w-100 m-0 mb-3 column-gap-3 align-items-center" style="height: 43%;">
                <div class="col h-100 p-0">
                    <div class="card rounded-4 h-100 w-100 dashboard-card">
                        <!-- DB CARD CONTENT -->
                        <div class="row d-flex flex-grow-1 h-100 align-items-center">
                            <div class="col-12 py-1 h-100 align-self-middle">
                                <canvas id="myChart" class="h-100 w-100"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- COMPARE TITLE -->
            <div class="row m-0 align-items-center">
                <div class="col-12 d-flex h-100 p-0 justify-content-start">
                    <P class="text-align-left ms-2 compare-text">Compare with</P>
                </div>
            </div>

            <!-- COMPARE CARD -->
            <div class="row d-flex flex-grow-1 w-100 m-0 mb-3 column-gap-3 align-items-center" style="height: 45%;">
                <div class="col h-100 p-0">
                    <div class="card rounded-4 h-100 w-100 dashboard-card">
                        <div class="row flex-grow-1 w-100 justify-content-center align-items-center text-white">

                            <!-- LEFT COMPARE -->
                            <div class="col d-flex flex-column flex-grow-1 h-100 pb-3 justify-content-center">
                                <div class="col-12 d-flex flex-column dropdown w-100 align-items-center justify-content-start">
                                    <button class="btn dropdown w-100 pb-1 left-filter-btn" id="left-filter-btn" type="button">
                                        <div class="col-0 col-lg-2"></div>
                                        <div class="col-9 col-lg-6" id="left-filter-dropdown">
                                            <span id="left-btn-label">This Week</span>
                                        </div>
                                        <div class="col-3 d-flex justify-content-end align-items-end">
                                            <ion-icon name="chevron-down-outline" class="left-dropdown-arrow" id="left-dropdown-arrow"></ion-icon>
                                        </div>
                                    </button>
                                    <div class="col-12 d-flex justify-content-start ">
                                        <hr class="m-0 ms-4 mb-4 text-white opacity-100" style="width: 75%;">
                                    </div>
                                    <!-- DROPDOWN DATE LIST -->
                                    <div class="col-auto d-flex flex-column align-self-start rounded-bottom-2 left-dropdown-menu hidden" id="left-dropdown-menu" style="width: 75%;">

                                        <!-- ALL TIME / YESTERDAY -->
                                        <div class="col-12 d-flex mt-1">
                                            <div class="col-6 p-0">
                                                <label class="py-1 w-100 left-date-item" for="all-time">All Time</label>
                                                <input type="radio" class="left-date-option" id="all-time" name="left-compare-date" value="left-all-time">
                                            </div>
                                            <div class="col-6 p-0">
                                                <label class="py-1 w-100 left-date-item" for="yesterday">Yesterday</label>
                                                <input type="radio" class="left-date-option" id="yesterday" name="left-compare-date" value="left-yesterday">
                                            </div>
                                        </div>

                                        <!-- TODAY / THIS WEEK -->
                                        <div class="col-12 d-flex">
                                            <div class="col-6 p-0">
                                                <label class="py-1 w-100 left-date-item" for="today">Today</label>
                                                <input type="radio" class="left-date-option" id="today" name="left-compare-date" value="left-today">
                                            </div>
                                            <div class="col-6 p-0">
                                                <label class="py-1 w-100 left-date-item" for="this-week">This Week</label>
                                                <input type="radio" class="left-date-option" id="this-week" name="left-compare-date" value="left-this-week">
                                            </div>

                                        </div>

                                        <!-- LAST 3 DAYS / LAST WEEK -->
                                        <div class="col-12 d-flex">
                                            <div class="col-6 p-0">
                                                <label class="py-1 w-100 left-date-item" for="last-3-days">Last 3 Days</label>
                                                <input type="radio" class="left-date-option" id="last-3-days" name="left-compare-date" value="left-last-3-days">
                                            </div>
                                            <div class="col-6 p-0">
                                                <label class="py-1 w-100 left-date-item" for="last-week">Last Week</label>
                                                <input type="radio" class="left-date-option" id="last-week" name="left-compare-date" value="left-last-week">
                                            </div>

                                        </div>

                                        <!-- LAST 5 DAYS / THIS MONTH -->
                                        <div class="col-12 d-flex">
                                            <div class="col-6 p-0">
                                                <label class="py-1 w-100 left-date-item" for="last-5-days">Last 5 Days</label>
                                                <input type="radio" class="left-date-option" id="last-5-days" name="left-compare-date" value="left-last-5-days">
                                            </div>
                                            <div class="col-6 p-0">
                                                <label class="py-1 w-100 left-date-item" for="this-month">This Month</label>
                                                <input type="radio" class="left-date-option" id="this-month" name="left-compare-date" value="left-this-month">
                                            </div>
                                        </div>

                                        <!-- LAST 7 DAYS / LAST MONTH -->
                                        <div class="col-12 d-flex">
                                            <div class="col-6 p-0">
                                                <label class="py-1 w-100 left-date-item" for="last-7-days">Last 7 Days</label>
                                                <input type="radio" class="left-date-option" id="last-7-days" name="left-compare-date" value="left-last-7-days">
                                            </div>
                                            <div class="col-6 p-0">
                                                <label class="py-1 w-100 left-date-item" for="last-month">Last Month</label>
                                                <input type="radio" class="left-date-option" id="last-month" name="left-compare-date" value="left-last-month">
                                            </div>
                                        </div>
                                        <!-- THIS YEAR / LAST YEAR -->
                                        <div class="col-12 d-flex mb-1">
                                            <div class="col-6 p-0">
                                                <label class="py-1 w-100 left-date-item" for="this-year">This Year</label>
                                                <input type="radio" class="left-date-option" id="this-year" name="left-compare-date" value="left-this-year">
                                            </div>
                                            <div class="col-6 p-0">
                                                <label class="py-1 w-100 left-date-item" for="last-year">Last Year</label>
                                                <input type="radio" class="left-date-option" id="last-year" name="left-compare-date" value="left-last-year">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- COMPARE DISPLAY -->
                                <!-- ALL TIME -->
                                <div id="left-all-time" class="row flex-column justify-content-start left-filter-content" style="display: none;">
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/profit-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Profit: <span class="ms-1 db-compare-text">All Time</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">All Time</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">All Time</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">All Time</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- YESTERDAY -->
                                <div id="left-yesterday" class="row flex-column justify-content-start left-filter-content" style="display: none;">
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/profit-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Profit: <span class="ms-1 db-compare-text">Yesterday</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">Yesterday</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">Yesterday</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">Yesterday</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- TODAY -->
                                <div id="left-today" class="row flex-column justify-content-start left-filter-content" style="display: none;">
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/profit-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Profit: <span class="ms-1 db-compare-text">Today</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">Today</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">Today</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">Today</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- THIS WEEK -->
                                <div id="left-this-week" class="row flex-column justify-content-start left-filter-content" style="display: block;">
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/profit-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Profit: <span class="ms-1 db-compare-text">{{number_format($thisWeekProfit,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">{{number_format($thisWeekSales,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">{{number_format($thisWeekExpenses,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">{{number_format($thisWeekOrders)}}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- LAST 3 DAYS -->
                                <div id="left-last-3-days" class="row flex-column justify-content-start left-filter-content" style="display: none;">
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/profit-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Profit: <span class="ms-1 db-compare-text">Last 3 Days</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">Last 3 Days</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">Last 3 Days</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">Last 3 Days</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- LAST WEEK -->
                                <div id="left-last-week" class="row flex-column justify-content-start left-filter-content" style="display: none;">
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/profit-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Profit: <span class="ms-1 db-compare-text">{{number_format($lastWeekProfit,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">{{number_format($lastWeekSales,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">{{number_format($lastWeekExpenses,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">{{number_format($lastWeekOrders)}}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- LAST 5 DAYS -->
                                <div id="left-last-5-days" class="row flex-column justify-content-start left-filter-content" style="display: none;">
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/profit-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Profit: <span class="ms-1 db-compare-text">Last 5 Days</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">Last 5 Days</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">Last 5 Days</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">Last 5 Days</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- THIS MONTH -->
                                <div id="left-this-month" class="row flex-column justify-content-start left-filter-content" style="display: none;">
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/profit-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Profit: <span class="ms-1 db-compare-text">{{number_format($thisMonthProfit,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">{{number_format($thisMonthSales,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">{{number_format($thisMonthExpenses,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">{{number_format($thisMonthOrders)}}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- LAST 7 DAYS -->
                                <div id="left-last-7-days" class="row flex-column justify-content-start left-filter-content" style="display: none;">
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/profit-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Profit: <span class="ms-1 db-compare-text">{{number_format($lastWeekProfit,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">{{number_format($lastWeekSales,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">{{number_format($lastWeekExpenses,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">{{number_format($lastWeekOrders)}}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- LAST MONTH -->
                                <div id="left-last-month" class="row flex-column justify-content-start left-filter-content" style="display: none;">
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/profit-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Profit: <span class="ms-1 db-compare-text">{{number_format($lastMonthProfit,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">{{number_format($lastMonthSales,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">{{number_format($lastMonthExpenses,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">{{number_format($lastMonthOrders)}}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- THIS YEAR -->
                                <div id="left-this-year" class="row flex-column justify-content-start left-filter-content" style="display: none;">
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/profit-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Profit: <span class="ms-1 db-compare-text">{{number_format($thisYearProfit,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">{{number_format($thisYearSales,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">{{number_format($thisYearExpenses,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">{{number_format($thisYearOrders,2)}}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- LAST YEAR -->
                                <div id="left-last-year" class="row flex-column justify-content-start left-filter-content" style="display: none;">
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/profit-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Profit: <span class="ms-1 db-compare-text">{{number_format($lastYearProfit,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">{{number_format($lastYearSales,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">{{number_format($lastYearExpenses,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">{{number_format($lastYearOrders)}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- VERTICAL RULE LINE -->
                            <div class="vr p-0 text-white opacity-75 align-self-center" style="width: 1.5px; min-height: 65%;"></div>

                            <!-- RIGHT COMPARE -->
                            <div class="col d-flex flex-column flex-grow-1 h-100 pb-3 justify-content-center">
                                <div class="col-12 d-flex flex-column dropdown w-100 align-items-center justify-content-start">
                                    <button class="btn dropdown w-100 pb-1 right-filter-btn" id="right-filter-btn" type="button">
                                        <div class="col-0 col-lg-2"></div>
                                        <div class="col-9 col-lg-6" id="right-filter-dropdown">
                                            <span id="right-btn-label">Last Week</span>
                                        </div>
                                        <div class="col-3 d-flex justify-content-end align-items-end">
                                            <ion-icon name="chevron-down-outline" class="right-dropdown-arrow" id="right-dropdown-arrow"></ion-icon>
                                        </div>
                                    </button>
                                    <div class="col-12 d-flex justify-content-start ">
                                        <hr class="m-0 ms-4 mb-4 text-white opacity-100" style="width: 75%;">
                                    </div>
                                    <!-- DROPDOWN DATE LIST -->
                                    <div class="col-auto d-flex flex-column align-self-start rounded-bottom-2 right-dropdown-menu hidden" id="right-dropdown-menu" style="width: 75%;">

                                        <!-- ALL TIME / YESTERDAY -->
                                        <div class="col-12 d-flex mt-1">
                                            <div class="col-6 p-0">
                                                <label class="py-1 w-100 right-date-item" for="all-time-right">All Time</label>
                                                <input type="radio" class="right-date-option" id="all-time-right" name="right-compare-date" value="right-all-time">
                                            </div>
                                            <div class="col-6 p-0">
                                                <label class="py-1 w-100 right-date-item" for="yesterday-right">Yesterday</label>
                                                <input type="radio" class="right-date-option" id="yesterday-right" name="right-compare-date" value="right-yesterday">
                                            </div>
                                        </div>

                                        <!-- TODAY / THIS WEEK -->
                                        <div class="col-12 d-flex">
                                            <div class="col-6 p-0">
                                                <label class="py-1 w-100 right-date-item" for="today-right">Today</label>
                                                <input type="radio" class="right-date-option" id="today-right" name="right-compare-date" value="right-today">
                                            </div>
                                            <div class="col-6 p-0">
                                                <label class="py-1 w-100 right-date-item" for="this-week-right">This Week</label>
                                                <input type="radio" class="right-date-option" id="this-week-right" name="right-compare-date" value="right-this-week">
                                            </div>

                                        </div>

                                        <!-- LAST 3 DAYS / LAST WEEK -->
                                        <div class="col-12 d-flex">
                                            <div class="col-6 p-0">
                                                <label class="py-1 w-100 right-date-item" for="last-3-days-right">Last 3 Days</label>
                                                <input type="radio" class="right-date-option" id="last-3-days-right" name="right-compare-date" value="right-last-3-days">
                                            </div>
                                            <div class="col-6 p-0">
                                                <label class="py-1 w-100 right-date-item" for="last-week-right">Last Week</label>
                                                <input type="radio" class="right-date-option" id="last-week-right" name="right-compare-date" value="right-last-week">
                                            </div>

                                        </div>

                                        <!-- LAST 5 DAYS / THIS MONTH -->
                                        <div class="col-12 d-flex">
                                            <div class="col-6 p-0">
                                                <label class="py-1 w-100 right-date-item" for="last-5-days-right">Last 5 Days</label>
                                                <input type="radio" class="right-date-option" id="last-5-days-right" name="right-compare-date" value="right-last-5-days">
                                            </div>
                                            <div class="col-6 p-0">
                                                <label class="py-1 w-100 right-date-item" for="this-month-right">This Month</label>
                                                <input type="radio" class="right-date-option" id="this-month-right" name="right-compare-date" value="right-this-month">
                                            </div>
                                        </div>

                                        <!-- LAST 7 DAYS / LAST MONTH -->
                                        <div class="col-12 d-flex">
                                            <div class="col-6 p-0">
                                                <label class="py-1 w-100 right-date-item" for="last-7-days-right">Last 7 Days</label>
                                                <input type="radio" class="right-date-option" id="last-7-days-right" name="right-compare-date" value="right-last-7-days">
                                            </div>
                                            <div class="col-6 p-0">
                                                <label class="py-1 w-100 right-date-item" for="last-month-right">Last Month</label>
                                                <input type="radio" class="right-date-option" id="last-month-right" name="right-compare-date" value="right-last-month">
                                            </div>
                                        </div>

                                        <!-- THIS YEAR / LAST YEAR -->
                                        <div class="col-12 d-flex mb-1">
                                            <div class="col-6 p-0">
                                                <label class="py-1 w-100 right-date-item" for="this-year-right">This Year</label>
                                                <input type="radio" class="right-date-option" id="this-year-right" name="right-compare-date" value="right-this-year">
                                            </div>
                                            <div class="col-6 p-0">
                                                <label class="py-1 w-100 right-date-item" for="last-year-right">Last Year</label>
                                                <input type="radio" class="right-date-option" id="last-year-right" name="right-compare-date" value="right-last-year">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- COMPARE DISPLAY -->
                                <!-- ALL TIME -->
                                <div id="right-all-time" class="row flex-column justify-content-start right-filter-content" style="display: none;">
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/profit-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Profit: <span class="ms-1 db-compare-text">All Time</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">All Time</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">All Time</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">All Time</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- YESTERDAY -->
                                <div id="right-yesterday" class="row flex-column justify-content-start right-filter-content" style="display: none;">
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/profit-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Profit: <span class="ms-1 db-compare-text">Yesterday</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">Yesterday</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">Yesterday</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">Yesterday</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- TODAY -->
                                <div id="right-today" class="row flex-column justify-content-start right-filter-content" style="display: none;">
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/profit-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Profit: <span class="ms-1 db-compare-text">Today</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">Today</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">Today</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">Today</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- THIS WEEK -->
                                <div id="right-this-week" class="row flex-column justify-content-start right-filter-content" style="display: none;">
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/profit-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Profit: <span class="ms-1 db-compare-text">{{number_format($thisWeekProfit,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">{{number_format($thisWeekSales,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">{{number_format($thisWeekExpenses,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">{{number_format($thisWeekOrders)}}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- LAST 3 DAYS -->
                                <div id="right-last-3-days" class="row flex-column justify-content-start right-filter-content" style="display: none;">
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/profit-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Profit: <span class="ms-1 db-compare-text">Last 3 Days</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">Last 3 Days</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">Last 3 Days</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">Last 3 Days</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- LAST WEEK -->
                                <div id="right-last-week" class="row flex-column justify-content-start right-filter-content" style="display: block;">
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/profit-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Profit: <span class="ms-1 db-compare-text">{{number_format($lastWeekProfit,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">{{number_format($lastWeekSales,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">{{number_format($lastWeekExpenses,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">{{number_format($lastWeekOrders)}}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- LAST 5 DAYS -->
                                <div id="right-last-5-days" class="row flex-column justify-content-start right-filter-content" style="display: none;">
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/profit-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Profit: <span class="ms-1 db-compare-text">Last 5 Days</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">Last 5 Days</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">Last 5 Days</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">Last 5 Days</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- THIS MONTH -->
                                <div id="right-this-month" class="row flex-column justify-content-start right-filter-content" style="display: none;">
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/profit-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Profit: <span class="ms-1 db-compare-text">{{number_format($thisMonthProfit,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">{{number_format($thisMonthSales,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">{{number_format($thisMonthExpenses,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">{{number_format($thisMonthOrders)}}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- LAST 7 DAYS -->
                                <div id="right-last-7-days" class="row flex-column justify-content-start right-filter-content" style="display: none;">
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/profit-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Profit: <span class="ms-1 db-compare-text">{{number_format($lastWeekProfit,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">{{number_format($lastWeekSales,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">{{number_format($lastWeekExpenses,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">{{number_format($lastWeekOrders)}}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- LAST MONTH -->
                                <div id="right-last-month" class="row flex-column justify-content-start right-filter-content" style="display: none;">
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/profit-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Profit: <span class="ms-1 db-compare-text">{{number_format($lastMonthProfit,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">{{number_format($lastMonthSales,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">{{number_format($lastMonthExpenses,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">{{number_format($lastMonthOrders)}}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- THIS YEAR -->
                                <div id="right-this-year" class="row flex-column justify-content-start right-filter-content" style="display: none;">
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/profit-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Profit: <span class="ms-1 db-compare-text">{{number_format($thisYearProfit,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">{{number_format($thisYearSales,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">{{number_format($thisYearExpenses,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">{{number_format($thisYearOrders)}}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- LAST YEAR -->
                                <div id="right-last-year" class="row flex-column justify-content-start right-filter-content" style="display: none;">
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/profit-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Profit: <span class="ms-1 db-compare-text">{{number_format($lastYearProfit,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">{{number_format($lastYearSales,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">{{number_format($lastYearExpenses,2)}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">{{number_format($lastYearOrders)}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END RIGHT COLUMN -->
    </div>
</div>



{{-- SCRIPT FOR HALF DONUT CHART --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var ctx = document.getElementById('gaugeChart').getContext('2d');

        // Values for the chart
        var financialTargetAmount = {{ $financialTargetSales->amount ?? 0 }};
        var financialTotalSales = {{ $financialTotalSales ?? 0 }};

        // Additional client-side null/NaN check
        if (isNaN(financialTargetAmount) || financialTargetAmount === null) {
            financialTargetAmount = 0;
        }
        if (isNaN(financialTotalSales) || financialTotalSales === null) {
            financialTotalSales = 0;
        }

        // Prevent division by zero and calculate percentage
        // Calculate percentage and limit it to a maximum of 100%
        var percentage = financialTargetAmount !== 0 ? Math.min((financialTotalSales / financialTargetAmount) * 100, 100) : 0;
        var remainingAmount = Math.max(financialTargetAmount - financialTotalSales, 0);


        var gaugeChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    label: 'Actual Sales',
                    data: [financialTotalSales, remainingAmount],
                    backgroundColor: ['#FFA500', '#FFFFFF'],
                    borderWidth: 0
                }]
            },
            options: {
                aspectRatio: 1.5,
                circumference: 180,
                rotation: 270,
                cutout: '60%',
                layout: {
                    padding: {
                        left: 10,
                        right: 10
                    },
                },
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        bodyColor: 'white',
                        titleColor: 'white',
                        titleFont: {
                            size: 12,
                        },
                        bodyFont: {
                            size: 8.5,
                            family: 'Poppins'
                        },
                        filter: (tooltipItem) => {
                            return tooltipItem.dataIndex === 0;
                        },
                        backgroundColor: 'rgba(0, 0, 0, 0.8)'  
                    },
                    datalabels: {
                        display: true,
                        formatter: function() {
                            return `${percentage.toFixed(0)}%`;
                        },
                        color: '#000',
                        font: {
                            weight: 'bold',
                            size: 24
                        }
                    }
                }
            },
            // CENTER TEXT
            plugins: [{
                id: 'centerText',
                beforeDraw: (chart) => {
                    const { width } = chart;
                    const { height } = chart;
                    const ctx = chart.ctx;

                    ctx.restore();
                    const fontSize = (height / 100).toFixed(2);
                    ctx.font = `${fontSize}em Poppins`;
                    ctx.textBaseline = 'end';

                    const text = `${percentage.toFixed(0)}%`;
                    const textX = Math.round((width - ctx.measureText(text).width) / 2);
                    const textY = height/ 1.2;

                    ctx.fillStyle = '#FFF';
                    ctx.fillText(text, textX, textY);
                    ctx.save();
                }
            }]
        });
    });
</script>


<script>
    // LEFT COMPARE VARIABLES
    const buttonLeft = document.querySelector('#left-filter-btn');
    const arrowLeft = document.querySelector('#left-dropdown-arrow');
    const selectLeft = document.querySelector('#left-dropdown-menu');
    const optionsLeft = document.querySelectorAll('.left-date-option');
    const selectLabelLeft = document.querySelector('#left-btn-label');
    const compareSectionsLeft = document.querySelectorAll('.left-filter-content');



    // LEFT FUNCTIONS
    buttonLeft.addEventListener('click', function(e) {
        e.preventDefault();
        arrowLeft.classList.toggle('active');
        toggleDropdownLeft();

    })


    function toggleDropdownLeft() {
        selectLeft.classList.toggle('hidden');
    }

    optionsLeft.forEach(function(option) {
        option.addEventListener('click', function(e) {
            setSelectedTitleLeft(e);

            compareSectionsLeft.forEach((section) => {
                section.style.display = "none";
            });

            const sectionToShow = document.getElementById(this.value);
            if (sectionToShow) {
                sectionToShow.style.display = "block";

                arrowLeft.classList.toggle('active');
            }

        })
    })

    function setSelectedTitleLeft(e) {
        const labelElement = document.querySelector(`label[for="${e.target.id}"]`).innerText;
        selectLabelLeft.innerText = labelElement;
        toggleDropdownLeft();
    }
</script>

<script>
    // RIGHT COMPARE VARIABLES
    const buttonRight = document.querySelector('#right-filter-btn');
    const arrowRight = document.querySelector('#right-dropdown-arrow');
    const selectRight = document.querySelector('#right-dropdown-menu');
    const optionsRight = document.querySelectorAll('.right-date-option');
    const selectLabelRight = document.querySelector('#right-btn-label');
    const compareSectionsRight = document.querySelectorAll('.right-filter-content');

    // RIGHT FUNCTIONS
    buttonRight.addEventListener('click', function(e) {
        e.preventDefault();
        arrowRight.classList.toggle('active');
        toggleDropdownRight();

    })

    function toggleDropdownRight() {
        selectRight.classList.toggle('hidden');
    }

    optionsRight.forEach(function(option) {
        option.addEventListener('click', function(e) {
            setSelectedTitleRight(e);

            compareSectionsRight.forEach((section) => {
                section.style.display = "none";
            });

            const sectionToShow = document.getElementById(this.value);
            console.log(this.value);
            if (sectionToShow) {
                sectionToShow.style.display = "block";
                arrowRight.classList.toggle('active');
            }

        })
    })

    function setSelectedTitleRight(e) {
        const labelElement = document.querySelector(`label[for="${e.target.id}"]`).innerText;
        selectLabelRight.innerText = labelElement;
        toggleDropdownRight();
    }
</script>
