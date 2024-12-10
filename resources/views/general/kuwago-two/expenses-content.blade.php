{{-- START --}}

<!-- DASHBOARD PANEL -->
<div class="d-flex rounded-4 dashboard-panel">
    <div class="row d-flex flex-grow-1 m-0 column-gap-3 h-100 rounded-4 justify-content-center align-items-center text-white " style="padding-inline: 2%; padding-block: 2.5%;">

        <!-- LEFT COLUMN -->
        <div class="col-auto d-flex flex-column row-gap-3 p-0 h-100" style="width: 45%;">

            <!-- TOTAL EXPENSES & BUDGET ALLOCATION -->
            <div class="col-12" style="height: 27%;">
                <div class="col h-100 p-0">
                    <div class="d-flex flex-column px-3 pb-3 rounded-4 h-100 w-100 main-dashboard-tile">
                        <div class="row d-flex flex-grow-1 w-100">
                            <!-- TOTAL EXPENSES -->
                            <div class="col" style="width: 30%;">
                                <!-- DB CARD TITLE -->
                                <div class="col-12 d-flex mt-2 align-items-end justify-content-start" style="height: 30%;">
                                    <span class="db-card-title">Total Expenses</span>
                                </div>
                                <!-- DB CONTENT/CHART -->
                                <div class="col-12 d-flex align-items-center justify-content-start" style="height: 65%;">
                                    <span class="fw-bold" style="letter-spacing: 0.005rem;">9,999,999.00</span>
                                </div>
                            </div>
                            <!-- HALF CIRCLE -->
                            <div class="col" style="width: 38%;">
                                <div class="d-flex mt-2 h-100 align-items-center justify-content-center">
                                    <span class="db-card-title">ARC CHART</span>
                                </div>
                            </div>
                            <!-- BUDGET ALLOCATED -->
                            <div class="col" style="width: 30%;">
                                <!-- DB CARD TITLE -->
                                <div class="col-12 d-flex mt-2 align-items-end justify-content-end" style="height: 30%;">
                                    <span class="db-card-title">Budget Allocated</span>
                                </div>
                                <!-- DB CONTENT/CHART -->
                                <div class="col-12 d-flex align-items-center justify-content-end" style="height: 65%;">
                                    <span class="fw-bold" style="letter-spacing: 0.005rem;">9,999,999.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RECENTLY PURCHASED -->
            <div class="row d-flex flex-grow-1 w-100 m-0 align-items-center" style="height: 70%;">
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
                            <h3>Expense Breakdown by Type</h3>
                                    <ul>
                                        @foreach ($chartExpenseData as $expense)
                                            <li>{{ $expense->expenseCategory }}: ₱ {{ number_format($expense->total_amount, 2) }}</li>
                                        @endforeach
                                    </ul>

                                    <h4>Total Expense Amount: ₱ {{ number_format($totalExpenseAmount, 2) }}</h4>

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
            <div class="col-12" style="height: 45%;">
                <div class="col h-100 p-0">
                    <div class="d-flex flex-column rounded-4 h-100 w-100 main-dashboard-tile">
                        <!-- DB CARD TITLE -->
                        <div class="col-12 d-flex mt-1 align-items-end justify-content-start" style="height: 15%;">
                            <span class="ms-3 db-card-title">Expense Trends</span>
                        </div>
                        <!-- DB CONTENT/CHART -->
                        <div class="col-12 d-flex align-items-center justify-content-center" style="height: 85%;">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- EXPENSES BY CATEGORY CARD -->
            <div class="col-12" style="height: 52%;">
                <div class="col h-100 p-0">
                    <div class="d-flex flex-column rounded-4 h-100 w-100 main-dashboard-tile">
                        <!-- DB CARD TITLE -->
                        <div class="col-12 d-flex mt-1 align-items-end justify-content-start" style="height: 15%;">
                            <span class="ms-3 db-card-title">Expenses by Category</span>
                        </div>
                        <!-- DB CONTENT/CHART -->
                        <div class="col-12 d-flex align-items-center justify-content-center" style="height: 85%;">
                            Bar Chart
                            <canvas id="expenseCategoryChart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END RIGHT COLUMN -->
    </div>
</div>




{{-- EXPENSE TREND CHART SCRIPT --}}



<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($chartdata->pluck('date')),
            datasets: [{
                label: 'Expenses',
                data: @json($chartdata->pluck('expenses')),
                borderColor: 'green',
                borderWidth: 5,
                fill: 'origin'
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
                        color: 'rgba(255, 255, 255, 0.2)' // Set color for horizontal grid lines
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
