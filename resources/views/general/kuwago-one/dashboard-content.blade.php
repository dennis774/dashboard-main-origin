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
                                                <i class="fa-solid fa-money-bill-trend-up" >
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
<style>
    select.comparedd {
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
    }
</style>

<script>
    // Left filter logic
    document.getElementById("filterLeft").addEventListener("change", function () {
        // Hide all left sections
        document.querySelectorAll(".filter-section-left").forEach((section) => {
            section.style.display = "none";
        });
        // Show the selected section for the left side
        const selectedFilterLeft = this.value;
        document.getElementById(selectedFilterLeft).style.display = "block";
    });

    // Right filter logic
    document.getElementById("filterRight").addEventListener("change", function () {
        // Hide all right sections
        document.querySelectorAll(".filter-section-right").forEach((section) => {
            section.style.display = "none";
        });
        // Show the selected section for the right side
        const selectedFilterRight = this.value;
        document.getElementById(selectedFilterRight).style.display = "block";
    });
</script>
