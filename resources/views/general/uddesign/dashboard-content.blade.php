<!-- DASHBOARD PANEL -->
<div class="d-flex rounded-4 dashboard-panel">
    <div class="row d-flex flex-grow-1 m-0 column-gap-3 h-100 rounded-4 justify-content-center align-items-center text-white " style="padding-inline: 2%; padding-block: 2.5%;">
        <!-- LEFT COLUMN -->
        <div class="col-auto p-0 h-100" style="width: 43%;">
            <!-- SALES -->
            <div class="row d-flex flex-grow-1 w-100 m-0 mb-2 align-items-center" style="height: 24%;;">
                <div class="col p-0" style="height: 100%;">
                    <div class="card rounded-4 flex-row h-100 w-100 dashboard-card">
                        <!-- DB LEFT SIDE -->
                        <div class="col d-flex flex-column align-items-center h-100" style="width: 50%;">
                            <div class="row mt-3 justify-content-start w-100">
                                <div class="col-12 align-items-center justify-content-center">
                                    <div class="card-title d-flex mb-0 align-items-center">
                                        <img src="{{ asset('assets/images/icons/total-expenses-icon.png') }}" style="height: 27px;" alt="Total Expenses Icon">
                                        <h5 class="card-title mb-0 ms-2 db-card-title">Total Sales</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- DB CARD CONTENT -->
                            <div class="row d-flex flex-grow-1 w-100 px-2 pb-3 align-items-center">
                                <div class="col align-self-middle text-start dashboard-total-text" style="width: 50%;">
                                    <span id="totalSales">{{$totalSales}}</span>
                                </div>
                            </div>
                        </div>
                        <!-- LINE -->
                        <div class="vr p-0 text-white opacity-75 align-self-center" style="width: 1.6px; min-height: 65%;"></div>
                        <!-- DB RIGHT SIDE -->
                        <div class="col d-flex flex-column py-3 ms-3 h-100 uddesign-side-text" style="width: 50%;">
                            <div class="col-12 d-flex flex-row align-items-center" style="height: 33%;">
                                <span class="me-1">Print/Photo:</span> {{$totalPrintSales}}
                            </div>
                            <div class="col-12 d-flex align-items-center" style="height: 33%;">
                                <span class="me-1">UdD Merch:</span> {{$totalMerchSales}}
                            </div>
                            <div class="col-12 d-flex align-items-center" style="height: 33%;">
                                <span class="me-1">Custom Deals:</span> {{$totalCustomSales}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- PROFIT -->
            <div class="row d-flex flex-grow-1 w-100 m-0 mb-2 align-items-center" style="height: 24%;">
                <div class="col p-0" style="height: 100%;">
                    <div class="card rounded-4 flex-row h-100 w-100 dashboard-card">
                        <!-- DB LEFT SIDE -->
                        <div class="col d-flex flex-column align-items-center h-100" style="width: 50%;">
                            <div class="row mt-3 justify-content-start w-100">
                                <div class="col-12 align-items-center justify-content-center">
                                    <div class="card-title d-flex mb-0 align-items-center">
                                        <img src="{{ asset('assets/images/icons/total-expenses-icon.png') }}" style="height: 27px;" alt="Total Expenses Icon">
                                        <h5 class="card-title mb-0 ms-2 db-card-title">Total Profit</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- DB CARD CONTENT -->
                            <div class="row d-flex flex-grow-1 w-100 px-2 pb-3 align-items-center">
                                <div class="col align-self-middle text-start dashboard-total-text" style="width: 50%;">
                                    <span id="totalProfit">{{$totalProfit}}</span>
                                </div>
                            </div>
                        </div>
                        <!-- LINE -->
                        <div class="vr p-0 text-white opacity-75 align-self-center" style="width: 1.6px; min-height: 65%;"></div>
                        <!-- DB RIGHT SIDE -->
                        <div class="col d-flex flex-column py-3 ms-3 h-100 uddesign-side-text" style="width: 50%;">
                            <div class="col-12 d-flex flex-row align-items-center" style="height: 33%;">
                                <span class="me-1">Print/Photo:</span> {{$totalPrintProfit}}
                            </div>
                            <div class="col-12 d-flex align-items-center" style="height: 33%;">
                                <span class="me-1">UdD Merch:</span> {{$totalMerchProfit}}
                            </div>
                            <div class="col-12 d-flex align-items-center" style="height: 33%;">
                                <span class="me-1">Custom Deals:</span> {{$totalCustomProfit}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- EXPENSES -->
            <div class="row d-flex flex-grow-1 w-100 m-0 mb-2 align-items-center" style="height: 24%;">
                <div class="col p-0" style="height: 100%;">
                    <div class="card rounded-4 flex-row h-100 w-100 dashboard-card">
                        <!-- DB LEFT SIDE -->
                        <div class="col d-flex flex-column align-items-center h-100" style="width: 50%;">
                            <div class="row mt-3 justify-content-start w-100">
                                <div class="col-12 align-items-center justify-content-center">
                                    <div class="card-title d-flex mb-0 align-items-center">
                                        <img src="{{ asset('assets/images/icons/total-expenses-icon.png') }}" style="height: 27px;" alt="Total Expenses Icon">
                                        <h5 class="card-title mb-0 ms-2 db-card-title">Total Expenses</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- DB CARD CONTENT -->
                            <div class="row d-flex flex-grow-1 w-100 px-2 pb-3 align-items-center">
                                <div class="col align-self-middle text-start dashboard-total-text" style="width: 50%;">
                                    <span id="totalExpenses">{{$totalExpenses}}</span>
                                </div>
                            </div>
                        </div>
                        <!-- LINE -->
                        <div class="vr p-0 text-white opacity-75 align-self-center" style="width: 1.6px; min-height: 65%;"></div>
                        <!-- DB RIGHT SIDE -->
                        <div class="col d-flex flex-column py-3 ms-3 h-100 uddesign-side-text" style="width: 50%;">
                            <div class="col-12 d-flex flex-row align-items-center" style="height: 33%;">
                                <span class="me-1">Print/Photo:</span> {{$totalPrintExpenses}}
                            </div>
                            <div class="col-12 d-flex align-items-center" style="height: 33%;">
                                <span class="me-1">UdD Merch:</span> {{$totalMerchExpenses}}
                            </div>
                            <div class="col-12 d-flex align-items-center" style="height: 33%;">
                                <span class="me-1">Custom Deals:</span> {{$totalCustomExpenses}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- TARGET SALES -->
            <div class="row d-flex flex-grow-1 w-100 m-0 align-items-center" style="height: 24%;">
                <div class="col p-0" style="height: 100%;">
                    <div class="card rounded-4 h-100 w-100 dashboard-card">
                        <!-- DB CARD TITLE -->
                        <!-- <div class="row mt-3 justify-content-start w-100">
                            <div class="col-12 align-items-center justify-content-center">
                                <div class="card-title d-flex mb-0 align-items-center">
                                    <h5 class="card-title mb-0 ms-2 db-card-title">Target Sales</h5>
                                </div>
                            </div>
                        </div> -->
                        <!-- DB CARD CONTENT -->
                        <div class="row d-flex flex-grow-1 w-100 px-3 pb-3 column-gap-3 align-items-center">
                            <div class="col-7 align-self-middle text-start dashboard-total-text">
                                <p style="font-size: 8px;">Target Sales</p>

                                @if ($financialTargetSales)
                                <span style="font-size: 8px;">{{ $financialTargetSales->amount}}{{ $financialTargetSales->start_date }} - {{ $financialTargetSales->end_date }}</span>
                                @else
                                    <span style="font-size: 8px;">No target sale found for display.</span>
                                @endif
                                <span style="font-size: 8px;"><span id="percentage" ></span>%</span>
                            </div>
                            <div class="col">
                                <div id="salesChartContainer" style="width: 200px;height: 50px;margin: auto;">
                                    <canvas id="salesChart"  style="width: 100% !important; height: 100% !important;"></canvas>
                                </div>
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

            <!-- UDDESIGN PRINT SALES TITLE -->
            <div class="row m-0 align-items-center">
                <div class="col-12 d-flex h-100 p-0 justify-content-start">
                    <P class="text-align-left mb-2 ms-2 uddesign-right-title">Printing/Photocopy Sales, Profit, and Expenses</P>
                </div>
            </div>

            <!-- SALES PROFIT EXPENSES CARD-->
            <div class="row d-flex flex-grow-1 w-100 m-0 mb-3 column-gap-3 align-items-center" style="height: 41%;">
                <div class="col h-100 p-0">
                    <div class="card rounded-4 h-100 w-100 dashboard-card">
                        <!-- DB CARD CONTENT -->
                        <div class="row d-flex flex-grow-1 align-items-center">
                            <div class="col-12 align-self-middle">
                                <canvas id="PrintingChart" width="450" height="191"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- UDDESIGN MERCH SALES TITLE -->
            <div class="row m-0 align-items-center">
                <div class="col-12 d-flex h-100 p-0 justify-content-start">
                    <P class="text-align-left mb-2 ms-2 uddesign-right-title">UdD Merch Sales, Profit, and Expenses</P>
                </div>
            </div>

            <!-- UDDSEIGN MERCH SALES CARD -->
            <div class="row d-flex flex-grow-1 w-100 m-0 mb-3 column-gap-3 align-items-center" style="height:42%;">
                <div class="col h-100 p-0">
                    <div class="card rounded-4 h-100 w-100 dashboard-card">
                        <div class="row flex-grow-1 w-100 justify-content-center align-items-center text-white">
                        <canvas id="MerchChart" style="width: 100%; height: 191px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END RIGHT COLUMN -->
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var ctx = document.getElementById('salesChart').getContext('2d');

        // Values for the chart
        var financialTargetAmount = {{ $financialTargetSales->amount }};
        var financialTotalSales = {{ $financialTotalSales }};

        // Calculate percentage
        var percentage = (financialTotalSales / financialTargetAmount) * 100;

        // Display the percentage in the view
        document.getElementById('percentage').innerText = percentage.toFixed(2);

        var salesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [''],
                datasets: [
                    {
                        label: 'Total Sales',
                        data: [financialTotalSales],
                        backgroundColor: '#FFA500' // Orange color for Total Sales
                    },
                    {
                        label: 'Target Sales',
                        data: [financialTargetAmount],
                        backgroundColor: '#FFFFFF', // White color for Financial Target
                    }
                ]
            },
            options: {
                responsive: true,
                indexAxis: 'y', // Display the bar chart vertically (y-axis)
                plugins: {
                    legend: {
                        display: false,
                        position: 'top' // Display the legend at the top
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var label = tooltipItem.dataset.label || '';
                                return label + ': ' + tooltipItem.raw.toLocaleString();
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            display: false // Show the ticks on X-axis
                        }
                    },
                    y: {
                        beginAtZero: true // Ensure the Y-axis begins at zero
                    }
                }
            }
        });
    });
</script>   



<!-- UNUSED -->
<?php /*
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
*/ ?>

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


{{-- ORIGINAL CODE --}}
<?php /*
<div class="container text-center content-container">
    <div class="row mb-5">
        {{-- START OF SIDE BAR --}}
        <div class="col-lg-1"></div>
        <div class="col-lg-1">
            <div class="container">
                <div class="row">
                    @include('general.uddesign.sidebar')
                </div>
            </div>
        </div>
        {{-- END OF SIDE BAR --}} {{-- START OF CONTENTS--}}
        <div class="col-lg-9 p-3 contents">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12 mb-2 card-box">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <i class="fa-solid fa-chart-line"></i>
                                            <p>Total Sales</p>
                                            <p>₱{{ $totalSales }}</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <div>Print/Photo: ₱{{$totalPrintSales}}</div>
                                            <div>UdD Merch: ₱{{$totalMerchSales}}</div>
                                            <div>Custom Deals: ₱{{$totalCustomSales}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2 card-box">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <i class="fa-solid fa-coins"></i>
                                            <p>Total Profit</p>
                                            <p>₱{{ $totalProfit }}</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <div>Print/Photo: ₱{{$totalPrintProfit}}</div>
                                            <div>UdD Merch: ₱{{$totalMerchProfit}}</div>
                                            <div>Custom Deals: ₱{{$totalCustomProfit}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2 card-box">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <i class="fa-solid fa-money-bill"></i>
                                            <p>Total Expenses</p>
                                            <p>₱{{ $totalExpenses }}</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <div>Print/Photo: ₱{{$totalPrintExpenses}}</div>
                                            <div>UdD Merch: ₱{{$totalMerchExpenses}}</div>
                                            <div>Custom Deals: ₱{{$totalCustomExpenses}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 card-box">
                                <p>Target Sales</p>
                                <p><i class="fa-solid fa-peso-sign"></i>5,000.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12 mb-2 card-boxChart">
                                <canvas id="PrintingChart" width="400" height="191"></canvas>
                            </div>
                            <div class="col-lg-12 card-boxChart">
                                <canvas id="MerchChart" width="400" height="191"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-1"></div>
    </div>
    {{-- END OF CONTENTS--}}
</div>
*/ ?>