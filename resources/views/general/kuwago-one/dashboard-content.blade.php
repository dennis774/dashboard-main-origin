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
                                <span id="totalSales">{{ number_format($totalSales, 2) }}</span>
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
                                <span id="totalProfit">{{ number_format($totalProfit, 2) }}</span>
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
                                <span id="totalExpenses">{{ number_format($totalExpenses, 2) }}</span>
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
                                <span id="totalOrders">{{ number_format($totalOrders) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- TARGET SALES -->
            <div class="row d-flex flex-grow-1 w-100 m-0 align-items-center" style="height: 27.5%;">
                <div class="col p-0" style="height: 100%;">
                    <div class="card rounded-4 h-100 w-100 dashboard-card">
                        <!-- DB CARD TITLE -->
                        <div class="row mt-3 justify-content-start w-100">
                            <div class="col-12 align-items-center justify-content-center">
                                <div class="card-title d-flex mb-0 align-items-center">
                                    <h5 class="card-title mb-0 ms-2 db-card-title">Target Sales</h5>
                                </div>
                            </div>
                        </div>
                        <!-- DB CARD CONTENT -->
                        <div class="row d-flex flex-grow-1 w-100 px-3 pb-3 column-gap-3 align-items-center">
                            <div class="col-7 align-self-middle text-start dashboard-total-text">
                            @if ($targetSale)
                            <p>{{ $targetSale->start_date }} - {{ $targetSale->end_date }}</p>

                            <p>{{ $targetSale->amount }}</p>
                            @else
                                <p>No target sale found for display.</p>
                            @endif
                            <canvas id="gaugeChart" width="400" height="200"></canvas>
                            </div>
                            <div class="col bg-success">
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
                    <p class="text-align-left ms-2 compare-text">Compare with</p>
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
                                            Total Profit: <span class="ms-1 db-compare-text">{{$thisWeekProfit}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">{{$thisWeekSales}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">{{$thisWeekExpenses}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">{{$thisWeekOrders}}</span>
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
                                            Total Profit: <span class="ms-1 db-compare-text">Last Week</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">Last Week</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">Last Week</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">Last Week</span>
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
                                            Total Profit: <span class="ms-1 db-compare-text">{{$thisMonthProfit}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">{{$thisMonthSales}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">{{$thisMonthExpenses}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">{{$thisMonthOrders}}</span>
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
                                            Total Profit: <span class="ms-1 db-compare-text">Last 7 Days</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">Last 7 Days</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">Last 7 Days</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">Last 7 Days</span>
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
                                            Total Profit: <span class="ms-1 db-compare-text">Last Month</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">Last Month</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">Last Month</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">Last Month</span>
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
                                            Total Profit: <span class="ms-1 db-compare-text">{{$thisYearProfit}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">{{$thisYearSales}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">{{$thisYearExpenses}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">{{$thisYearOrders}}</span>
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
                                            Total Profit: <span class="ms-1 db-compare-text">Last Year</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">Last Year</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">Last Year</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">Last Year</span>
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
                                            Total Profit: <span class="ms-1 db-compare-text">week</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">week</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">week</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">week</span>
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
                                            Total Profit: <span class="ms-1 db-compare-text">{{$lastWeekProfit}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">{{$lastWeekSales}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">{{$lastWeekExpenses}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">{{$lastWeekOrders}}</span>
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
                                            Total Profit: <span class="ms-1 db-compare-text">month</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">month</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">month</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">month</span>
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
                                            Total Profit: <span class="ms-1 db-compare-text">Last 7 Days</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">Last 7 Days</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">Last 7 Days</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">Last 7 Days</span>
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
                                            Total Profit: <span class="ms-1 db-compare-text">{{$lastMonthProfit}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">{{$lastMonthSales}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">{{$lastMonthExpenses}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">{{$lastMonthOrders}}</span>
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
                                            Total Profit: <span class="ms-1 db-compare-text">year</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">year</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">year</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">year</span>
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
                                            Total Profit: <span class="ms-1 db-compare-text">{{$lastYearProfit}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2 ">
                                        <div class="col-1 d-flex align-items-end justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/sales-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Sales: <span class="ms-1 db-compare-text">{{$lastYearSales}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/expenses-compare-icon.png') }}" style="height: 15px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Expenses: <span class="ms-1 db-compare-text">{{$lastYearExpenses}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ms-4 ps-4 mb-2">
                                        <div class="col-1 d-flex align-items-center justify-content-start" style="width: 10%;">
                                            <img src="{{ asset('assets/images/icons/order-compare-icon.png') }}" style="height: 17px;" alt="Profit Icon">
                                        </div>
                                        <div class="col-11 d-flex align-items-end db-compare-text" style="width: 80%;">
                                            Total Order: <span class="ms-1 db-compare-text">{{$lastYearOrders}}</span>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
        document.addEventListener("DOMContentLoaded", function () {
            var ctx = document.getElementById('gaugeChart').getContext('2d');

            // Values for the chart
            var targetSaleAmount = {{ $targetSale->amount ?? 0 }};
            var totalSales = {{ $totalSales }};
            var percentage = (targetSaleAmount / totalSales) * 100;

            var gaugeChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [percentage, 100 - percentage],
                        backgroundColor: ['#FFA500', '#FFFFFF'],
                        borderWidth: 0
                    }]
                },
                options: {
                    circumference: Math.PI,
                    rotation: Math.PI,
                    cutoutPercentage: 70,
                    tooltips: { enabled: false },
                    hover: { mode: null },
                    plugins: {
                        datalabels: {
                            display: true,
                            formatter: function(value, context) {
                                return context.chart.data.datasets[0].data[0] + '%';
                            },
                            color: '#000',
                            font: {
                                weight: 'bold',
                                size: 24
                            }
                        }
                    }
                }
            });
        });
    </script>



<!-- UNUSED -->
{{--
<div class="container text-center content-container">
    <div class="row mb-5">
        <div class="col-lg-1"></div>
        <div class="col-lg-1">
            <div class="container">
                <div class="row">
                    @include('general.kuwago-one.sidebar')
                </div>
            </div>
        </div>

        <div class="col-lg-9 p-3 kuwago1Main">
            <div class="row">
                <div class="col-lg-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 card-boxKuwago1">
                                <div class="col-lg-12 d-flex align-items-center mt-2">
                                    <i class="fa-solid fa-money-bill-trend-up kuwago1Icons">
                                        <span style="font-family: serif; font-size: 18px;">Total Sales</span>
                                    </i>
                                </div>
                                <div class="col-lg-12d-flex align-items-center mt-3" style="font-size: 25px; font-weight: bold;">
                                    <p>₱{{ number_format($totalSales, 2) }}</p>
</div>
</div>

<div class="col-lg-6 card-boxKuwago1">
    <div class="col-lg-12 d-flex align-items-center mt-2">
        <i class="fa-solid fa-hand-holding-dollar kuwago1Icons">
            <span style="font-family: serif; font-size: 18px;">Total Profit</span>
        </i>
    </div>
    <div class="col-lg-12d-flex align-items-center mt-3" style="font-size: 25px; font-weight: bold;">
        <p>₱{{number_format($totalProfit, 2)}}</p>
    </div>
</div>

<div class="col-lg-6 card-boxKuwago1">
    <div class="col-lg-12 d-flex align-items-center mt-2">
        <i class="fa-brands fa-shopify kuwago1Icons">
            <span style="font-family: serif; font-size: 18px;">Total Expenses</span>
        </i>
    </div>
    <div class="col-lg-12d-flex align-items-center mt-3" style="font-size: 25px; font-weight: bold;">
        <p>₱{{number_format($totalExpenses, 2)}}</p>
    </div>
</div>

<div class="col-lg-6 card-boxKuwago1">
    <div class="col-lg-12 d-flex align-items-center mt-2">
        <i class="fa-solid fa-cart-shopping kuwago1Icons">
            <span style="font-family: serif; font-size: 18px;">Total Orders</span>
        </i>
    </div>
    <div class="col-lg-12d-flex align-items-center mt-3" style="font-size: 25px; font-weight: bold;">
        <p>{{$totalOrders}}</p>
    </div>
</div>

<div class="col-lg-12 card-targetSales">
    <div class="col-lg-12 d-flex align-items-center mt-2">
        <i class="fa-solid fa-piggy-bank kuwago1Icons">
            <span style="font-family: serif; font-size: 18px;">    </span>
        </i>
    </div>
    <div class="col-lg-12d-flex align-items-center mt-3" style="font-size: 25px; font-weight: bold;">
        <p><i class="fa-solid fa-peso-sign"></i>5,000.00</p>
    </div>
</div>
</div>
</div>
</div>
<div class="col-lg-7">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 chartsKuwago1" style="height: 265px; position: relative;">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mt-2 d-flex justify-content-start" style="color: #fff; font-weight: bold;">
            <div>Compare With</div>
        </div>
    </div>

    <div class="col-lg-12 card-boxCompare">
        <div style="position: relative;">
            <div class="row">
                <!-- Left Side Section -->
                <div class="col-lg-6" style="display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; border-right: 2px solid white;">
                    <select id="filterLeft" class="form-select mb-1 comparedd select-no-arrow" style="width: 75%; color: white; background-color: #333; border-color: #555; border-bottom: 2px solid white; border-radius:0; font-weight: bold;">
                        <!-- Adjusted width -->
                        <option value="thisWeekLeft" selected>This Week</option>
                        <option value="thisMonthLeft">This Month</option>
                        <option value="thisYearLeft">This Year</option>
                    </select>
                    <div id="thisWeekLeft" class="filter-section-left" style="display: block;">
                        <div class="col-lg-12 mb-2 junctions">
                            <div>
                                <i class="fa-solid fa-hand-holding-dollar">
                                    <span style="font-family:'Calibri'; font-size: 16px;">Total Profit: ₱ {{$thisWeekProfit}}</span>
                                </i>
                            </div>
                            <div>
                                <i class="fa-solid fa-money-bill-trend-up">
                                    <span style="font-family:'Calibri'; font-size: 16px;">Total Sales: ₱ {{$thisWeekSales}}</span>
                                </i>
                            </div>
                            <div>
                                <i class="fa-brands fa-shopify">
                                    <span style="font-family:'Calibri'; font-size: 16px;">Total Expenses: ₱ {{$thisWeekExpenses}}</span>
                                </i>
                            </div>
                            <div>
                                <i class="fa-solid fa-cart-shopping">
                                    <span style="font-family:'Calibri'; font-size: 16px;">Total Orders: ₱ {{$thisWeekOrders}}</span>
                                </i>
                            </div>
                        </div>
                    </div>
                    <div id="thisMonthLeft" class="filter-section-left" style="display: none;">
                        <div class="col-lg-12 mb-2 junctions">
                            <div>
                                <i class="fa-solid fa-hand-holding-dollar">
                                    <span style="font-family:'Calibri'; font-size: 16px;">Total Profit: ₱ {{$thisMonthProfit}}</span>
                                </i>
                            </div>
                            <div>
                                <i class="fa-solid fa-money-bill-trend-up">
                                    <span style="font-family:'Calibri'; font-size: 16px;">Total Sales: ₱ {{$thisMonthSales}}</span>
                                </i>
                            </div>
                            <div>
                                <i class="fa-brands fa-shopify">
                                    <span style="font-family:'Calibri'; font-size: 16px;">Total Expenses: ₱ {{$thisMonthExpenses}}</span>
                                </i>
                            </div>
                            <div>
                                <i class="fa-solid fa-cart-shopping">
                                    <span style="font-family:'Calibri'; font-size: 16px;">Total Orders: ₱ {{$thisMonthOrders}}</span>
                                </i>
                            </div>
                        </div>
                    </div>
                    <div id="thisYearLeft" class="filter-section-left" style="display: none;">
                        <div class="col-lg-12 mb-2 junctions">
                            <div>
                                <i class="fa-solid fa-hand-holding-dollar">
                                    <span style="font-family:'Calibri'; font-size: 16px;">Total Profit: ₱ {{$thisYearProfit}}</span>
                                </i>
                            </div>
                            <div>
                                <i class="fa-solid fa-money-bill-trend-up">
                                    <span style="font-family:'Calibri'; font-size: 16px;">Total Sales: ₱ {{$thisYearSales}}</span>
                                </i>
                            </div>
                            <div>
                                <i class="fa-brands fa-shopify">
                                    <span style="font-family:'Calibri'; font-size: 16px;">Total Expenses: ₱ {{$thisYearExpenses}}</span>
                                </i>
                            </div>
                            <div>
                                <i class="fa-solid fa-cart-shopping">
                                    <span style="font-family:'Calibri'; font-size: 16px;">Total Orders: ₱ {{$thisYearOrders}}</span>
                                </i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side Section -->
                <div class="col-lg-6" style="display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center;">
                    <select id="filterRight" class="form-select mb-1 comparedd select-no-arrow" style="width: 75%; color: white; background-color: #333; border-color: #555; border-bottom: 2px solid white; border-radius:0; font-weight: bold;">
                        <!-- Adjusted width -->
                        <option value="lastWeekRight" selected>Last Week</option>
                        <option value="lastMonthRight">Last Month</option>
                        <option value="lastYearRight">Last Year</option>
                    </select>
                    <div id="LastWeekRight" class="filter-section-right" style="display: block;">
                        <div class="col-lg-12 mb-2 junctions">
                            <div>
                                <i class="fa-solid fa-hand-holding-dollar">
                                    <span style="font-family:'Calibri'; font-size: 16px;">Total Profit: ₱ {{$lastWeekProfit}}</span>
                                </i>
                            </div>
                            <div>
                                <i class="fa-solid fa-money-bill-trend-up">
                                    <span style="font-family:'Calibri'; font-size: 16px;">Total Sales: ₱ {{$lastWeekSales}}</span>
                                </i>
                            </div>
                            <div>
                                <i class="fa-brands fa-shopify">
                                    <span style="font-family:'Calibri'; font-size: 16px;">Total Expenses: ₱ {{$lastWeekExpenses}}</span>
                                </i>
                            </div>
                            <div>
                                <i class="fa-solid fa-cart-shopping">
                                    <span style="font-family:'Calibri'; font-size: 16px;">Total Orders: ₱ {{$lastWeekOrders}}</span>
                                </i>
                            </div>
                        </div>
                    </div>
                    <div id="lastMonthRight" class="filter-section-right" style="display: none;">
                        <div class="col-lg-12 mb-2 junctions">
                            <div>
                                <i class="fa-solid fa-hand-holding-dollar">
                                    <span style="font-family:'Calibri'; font-size: 16px;">Total Profit: ₱ {{$lastMonthProfit}}</span>
                                </i>
                            </div>
                            <div>
                                <i class="fa-solid fa-money-bill-trend-up">
                                    <span style="font-family:'Calibri'; font-size: 16px;">Total Sales: ₱ {{$lastMonthSales}}</span>
                                </i>
                            </div>
                            <div>
                                <i class="fa-brands fa-shopify">
                                    <span style="font-family:'Calibri'; font-size: 16px;">Total Expenses: ₱ {{$lastMonthExpenses}}</span>
                                </i>
                            </div>
                            <div>
                                <i class="fa-solid fa-cart-shopping">
                                    <span style="font-family:'Calibri'; font-size: 16px;">Total Orders: ₱ {{$lastMonthOrders}}</span>
                                </i>
                            </div>
                        </div>
                    </div>
                    <div id="lastYearRight" class="filter-section-right" style="display: none;">
                        <div class="col-lg-12 mb-2 junctions">
                            <div>
                                <i class="fa-solid fa-hand-holding-dollar">
                                    <span style="font-family:'Calibri'; font-size: 16px;">Total Profit: ₱ {{$lastYearProfit}}</span>
                                </i>
                            </div>
                            <div>
                                <i class="fa-solid fa-money-bill-trend-up">
                                    <span style="font-family:'Calibri'; font-size: 16px;">Total Sales: ₱ {{$lastYearSales}}</span>
                                </i>
                            </div>
                            <div>
                                <i class="fa-brands fa-shopify">
                                    <span style="font-family:'Calibri'; font-size: 16px;">Total Expenses: ₱ {{$lastYearExpenses}}</span>
                                </i>
                            </div>
                            <div>
                                <i class="fa-solid fa-cart-shopping">
                                    <span style="font-family:'Calibri'; font-size: 16px;">Total Orders: ₱ {{$lastYearOrders}}</span>
                                </i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<div class="col-lg-1"></div>
</div>
</div>
--}}

<style>
    /* select.comparedd {
        background-color: transparent !important;
        color: white !important;
        text-align: center;
        border: none;
        outline: none;
    }

    select.comparedd option {
        background-color: #fff !important;
        color: #000 !important;
    }

    select.comparedd:focus {
        outline: none;
        box-shadow: none;
    }

    .form-select {
        color: #fff;
        background-color: #333;
        border-color: #555;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-image: url('data:image/svg+xml;charset=utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 4 5"><path fill="white" d="M2 0L0 2h4zM0 3l2 2 2-2z"/></svg>');
        background-repeat: no-repeat;
        background-position: right 10px center;
    } */
</style>


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


<?php /*
<script>
    // Left filter logic
    document.getElementById('left-filter-btn').addEventListener("change", function() {
        // Hide all left sections
        document.querySelectorAll(".left-filter-content").forEach((section) => {
            section.style.display = "none";
            console.log("hi" + section);
        });
        // Show the selected section for the left side
        const selectedFilterLeft = this.value;
        document.getElementById(selectedFilterLeft).style.display = "block";
    });

    // Right filter logic
    document.getElementById("filterRight").addEventListener("change", function() {
        // Hide all right sections
        document.querySelectorAll(".filter-section-right").forEach((section) => {
            section.style.display = "none";
        });
        // Show the selected section for the right side
        const selectedFilterRight = this.value;
        document.getElementById(selectedFilterRight).style.display = "block";
    });
</script> */ ?>