<!-- DASHBOARD PANEL -->
<div class="d-flex rounded-4 dashboard-panel">
    <div class="row d-flex flex-grow-1 m-0 column-gap-3 h-100 rounded-4 justify-content-center align-items-center text-white " style="padding-inline: 2%; padding-block: 2.5%;">

        <!-- LEFT COLUMN -->
        <div class="col-auto d-flex flex-column row-gap-3 p-0 h-100" style="width: 38%;">

            <!-- TOTAL EXPENSES & BUDGET ALLOCATION -->
            <div class="col-12" style="height: 47%;">
                <div class="col h-100 p-0">
                    <div class="d-flex flex-column row-gap-2 pb-3 rounded-4 justify-content-start h-100 w-100 main-dashboard-tile">
                        <!-- CARD TITLES -->
                        <div class="row mt-3 w-100">
                            <div class="col-6 d-flex justify-content-center db-card-title">
                                Target Sales
                            </div>
                            <div class="col-6 d-flex justify-content-center db-card-title">
                                Budget Allocated
                            </div>
                        </div>
                        <!-- CARD VALUES -->
                        <div class="row w-100">
                            <div class="col-6 d-flex justify-content-center fw-bold db-card-title" style="font-size: clamp(0.75rem, 1.6vw, 1.3rem);">
                                999,999,999.00
                            </div>
                            <div class="col-6 d-flex justify-content-center fw-bold db-card-title" style="font-size: clamp(0.75rem, 1.6vw, 1.3rem);">
                                100.00
                            </div>
                        </div>
                        <div class="row d-flex flex-grow-1 align-items-center justify-content-center">
                            Half Donut Chart
                        </div>
                    </div>
                </div>
            </div>

            <!-- RECENTLY PURCHASED -->
            <div class=" col d-flex flex-grow-1 w-100 m-0 align-items-center">
                <div class="col p-0" style="height: 100%;">
                    <div class="card rounded-0 h-100 w-100 bg-transparent text-white border-0" style="font-size: clamp(0.7rem, 1.8vw, 1.1rem); letter-spacing: 2px;">
                        <!-- DB CARD TITLE -->
                        <div class="row mt-3 justify-content-start w-100">
                            <div class="col-12 align-items-center justify-content-center">
                                <div class="card-title d-flex mb-0 align-items-center">
                                    <h5 class="card-title mb-0 ms-2 db-card-title">Recently Purchased:</h5>
                                </div>
                            </div>
                        </div>
                        <!-- DB CARD CONTENT -->
                        <div class="row d-flex flex-grow-1 w-100 px-3 pb-3 column-gap-3 align-items-center">
                            <div class="col-12 align-self-middle text-center db-card-title">
                                <span>List of products here</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- END TARGET SALES -->
        </div>
        <!-- END LEFT COLUMN -->


        <!-- RIGHT COLUMN -->
        <div class="col d-flex flex-column row-gap-3 p-0 h-100">
            <!-- EXPENSES TREND CARD-->
            <div class="col" style="height: 47%;">
                <div class="col h-100 p-0">
                    <div class="d-flex flex-column rounded-4 h-100 w-100 main-dashboard-tile">
                        <!-- DB CARD TITLE -->
                        <div class="col-12 d-flex mt-1 align-items-end justify-content-start" style="height: 15%;">
                            <span class="ms-3 db-card-title">Expense Trends</span>
                        </div>
                        <!-- DB CONTENT/CHART -->
                        <div class="col-12 d-flex align-items-center justify-content-center" style="height: 85%;">
                            Trend Chart
                        </div>
                    </div>
                </div>
            </div>

            <!-- EXPENSES BY CATEGORY CARD -->
            <div class="col">
                <div class="col h-100 p-0">
                    <div class="d-flex flex-column rounded-4 h-100 w-100 main-dashboard-tile">
                        <!-- DB CARD TITLE -->
                        <div class="col-12 d-flex mt-1 align-items-end justify-content-start" style="height: 15%;">
                            <span class="ms-3 db-card-title">Expense by Category</span>
                        </div>
                        <!-- DB CONTENT/CHART -->
                        <div class="col-12 d-flex align-items-center justify-content-center" style="height: 85%;">
                            Bar Chart
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END RIGHT COLUMN -->
    </div>
</div>




{{-- ORIGINAL CODE --}}
<?php
/*
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
                        <canvas id="myChart" width="400" height="200"></canvas>
                    </div>

                    <canvas id="expenseCategoryChart" width="400" height="200"></canvas>
                    <div>
                        <h3>Expense Breakdown by Type</h3>
                        <ul>
                            @foreach ($expenseData as $expense)
                                <li>{{ $expense->expenseType }}: ₱ {{ number_format($expense->price, 2) }}</li>
                            @endforeach
                        </ul>

                        <h4>Total Expense Amount: ₱ {{ number_format($totalExpenseAmount, 2) }}</h4>
                    </div>



                </div>
            </div>
        </div>
        <div class="col-lg-1"></div>
    </div>
    {{-- END OF CONTENTS--}}
</div>


<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($chartdata->pluck('date')),
            datasets: [{
                label: 'Print/Photo',
                data: @json($chartdata->pluck('print_expenses')),
                borderColor: 'blue',
                borderWidth: 1,
                fill: 'origin'
            }, {
                label: 'UdD Merch',
                data: @json($chartdata->pluck('merch_expenses')),
                borderColor: 'green',
                borderWidth: 1,
                fill: 'origin'
            }, {
                label: 'Custom Deals',
                data: @json($chartdata->pluck('custom_expenses')),
                borderColor: 'yellow',
                borderWidth: 1,
                fill: 'origin'
            }]
        },
        options: {
            scales: {
                x: {
                    ticks: {
                        color: 'white' // Set the color of the x-axis labels
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.2)' // Optionally lighten grid lines for better contrast
                    }
                },
                y: {
                    ticks: {
                        color: 'white' // Set the color of the y-axis labels
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.2)' // Optionally lighten grid lines for better contrast
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: 'white' // Set the color of the legend labels
                    }
                },
                title: {
                    display: true,
                    text: 'Your Chart Title', // Replace with your chart title
                    color: 'white' // Set the color of the chart title
                }
            }
        }
    });
</script>

<!-- Bar Chart for Expense Category -->
<script>
    const printCategoryCtx = document.getElementById('expenseCategoryChart').getContext('2d');
    const printCategoryChart = new Chart(printCategoryCtx, {
        type: 'bar',
        data: {
            labels: @json($chartExpenseData->pluck('expenseCategory')),
            datasets: [{
                label: 'Products Sold',
                data: @json($chartExpenseData->pluck('total_amount')),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: 'white' // Set Y-axis text color to white
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.2)' // Set horizontal grid line color
                    }
                },
                x: {
                    ticks: {
                        color: 'white' // Set X-axis text color to white
                    },
                    grid: {
                        display: false // Disable vertical grid lines
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: 'white' // Set legend text color to white
                    }
                },
                tooltip: {
                    bodyColor: 'white', // Tooltip text color
                    titleColor: 'white', // Tooltip title color
                    backgroundColor: 'rgba(0, 0, 0, 0.8)' // Optional: change tooltip background for better contrast
                }
            }
        }
    });
</script>
