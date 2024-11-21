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
                                    <p>₱{{$totalSales}}</p>
                                </div>
                            </div>

                            <div class="col-lg-6 card-boxKuwago1">
                                <div class="col-lg-12 d-flex align-items-center mt-2">
                                    <i class="fa-solid fa-hand-holding-dollar kuwago1Icons">
                                        <span style="font-family: serif; font-size: 18px;">Total Profit</span>
                                    </i>
                                </div>
                                <div class="col-lg-12d-flex align-items-center mt-3" style="font-size: 25px; font-weight: bold;">
                                    <p>₱{{$totalProfit}}</p>
                                </div>
                            </div>

                            <div class="col-lg-6 card-boxKuwago1">
                                <div class="col-lg-12 d-flex align-items-center mt-2">
                                    <i class="fa-brands fa-shopify kuwago1Icons">
                                        <span style="font-family: serif; font-size: 18px;">Total Expenses</span>
                                    </i>
                                </div>
                                <div class="col-lg-12d-flex align-items-center mt-3" style="font-size: 25px; font-weight: bold;">
                                    <p>₱{{$totalExpenses}}</p>
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
                                        <span style="font-family: serif; font-size: 18px;">Target Sales</span>
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

                    <div class="col-lg-12 card-box">
                        <div class="container">
                            <div class="row mt-0">
                                <div class="col-lg-6 leftData">
                                    <div style="font-weight:bold; font-size:20px;">This week</div>
                                    <div class="mb-1" style="font-size:15px;"><i class="fas fa-dollar-sign"></i> Total Profit: ₱ {{$thisWeekProfit}}</div>
                                    <div class="mb-1" style="font-size:15px;"><i class="fas fa-chart-line"></i> Total Sales: ₱ {{$thisWeekSales}}</div>
                                    <div class="mb-1" style="font-size:15px;"><i class="fas fa-money-bill-wave"></i> Total Expenses: ₱ {{$thisWeekExpenses}}</div>
                                    <div class="mb-1" style="font-size:15px;"><i class="fas fa-shopping-cart"></i> Total Orders: {{$thisWeekOrders}}</div>
                                </div>
                                <div class="col-lg-6 rightData">
                                    <div style="font-weight:bold; font-size:20px;">Last Week</div>
                                    <div class="mb-1" style="font-size:15px;"><i class="fas fa-dollar-sign"></i> Total Profit: ₱ {{$lastWeekProfit}}</div>
                                    <div class="mb-1" style="font-size:15px;"><i class="fas fa-chart-line"></i> Total Sales: ₱ {{$lastWeekSales}}</div>
                                    <div class="mb-1" style="font-size:15px;"><i class="fas fa-money-bill-wave"></i> Total Expenses: ₱ {{$lastWeekExpenses}}</div>
                                    <div class="mb-1" style="font-size:15px;"><i class="fas fa-shopping-cart"></i> Total Orders: {{$lastWeekOrders}}</div>
                                    
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
