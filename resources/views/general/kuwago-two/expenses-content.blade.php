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
                            @if($budgetAllocation)
                                <!-- TOTAL EXPENSES -->
                                <div class="col" style="width: 30%;">
                                    <!-- DB CARD TITLE -->
                                    <div class="col-12 d-flex mt-2 align-items-end justify-content-start" style="height: 30%;">
                                        <span class="db-card-title">Total Expenses</span>
                                    </div>
                                    <!-- DB CONTENT/CHART -->
                                    <div class="col-12 d-flex align-items-center justify-content-start" style="height: 65%;">
                                        <span class="fw-bold" style="letter-spacing: 0.005rem;">{{number_format($budgetExpenses,2)}}</span>
                                    </div>
                                </div>
                                <!-- HALF CIRCLE -->
                                <div class="col" style="width: 38%;">
                                    <div class="d-flex mt-2 h-100 align-items-center justify-content-center">
                                        <canvas id="arcChart"></canvas>
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
                                        <span class="fw-bold" style="letter-spacing: 0.005rem;">{{ number_format($budgetAllocation->amount,2) }}</span>
                                    </div>
                                </div>
                            @else
                                <span style="font-size: 8px;">No target sale found for display.</span>
                            @endif
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
                            <div class="col-12 align-self-middle text-center justify-content-center db-card-title">
                                {{-- <span>List of products here</span> --}}
                                <div class="d-flex mt-2 text-start overflow-y-scroll weather-column" style="height:220px; max-height: 220px;">
                                    <ul style="font-size: 0.9rem;">
                                        @foreach ($chartExpenseData as $expense)
                                            <li class="lh-lg">{{ $expense->expenseCategory }}: {{ number_format($expense->total_amount, 2) }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <span class="d-flex justify-content-center mt-2" style="font-size: 1.2rem;">Total Expense Amount: {{ number_format($totalExpenseAmount, 2) }}</span>
                                
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
                            <canvas id="expenseCategoryChart"></canvas>
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
const bgColor = {
        id: 'bgColor',
        beforeDraw: (Chart, steps, options) => {
            const {ctx, width, height} = Chart;
            if(options.applyBackground){
                ctx.fillStyle = options.backgroundColor;
                ctx.fillRect(0, 0, width, height)
                ctx.restore();
            }
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        var ctx = document.getElementById('arcChart').getContext('2d');

        // Values for the chart
        var budgetAllocation = {{ $budgetAllocation->amount ?? 0 }};
        var budgetExpenses = {{ $budgetExpenses ?? 0 }};

        // Additional client-side null/NaN check
        if (isNaN(budgetAllocation) || budgetAllocation === null) {
            budgetAllocation = 0;
        }
        if (isNaN(budgetExpenses) || budgetExpenses === null) {
            budgetExpenses = 0;
        }

        // Prevent division by zero and calculate percentage
        // Calculate percentage and limit it to a maximum of 100%
        var percentage = budgetAllocation !== 0 ? Math.min((budgetExpenses / budgetAllocation) * 100, 100) : 0;
        var remainingAmount = Math.max(budgetAllocation - budgetExpenses, 0);


        var gaugeChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    label: 'Target Sales',
                    data: [budgetExpenses, remainingAmount],
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
                            size: 10,
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

<!-- EXPENSES TREND CHART -->
<script>
    const ctx2 = document.getElementById('myChart').getContext('2d');
    const myChart2 = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: @json($chartdata->pluck('date')),
            datasets: [{
                label: 'Expenses',
                data: @json($chartdata->pluck('expenses')),
                borderColor: 'rgba(108, 229, 232, 1)',
                borderWidth: 2,
                fill: false // Disable fill under the line
            }]
        },
        options: {
            aspectRatio: 3,
            elements: {
                point: {
                    radius: 5, 
                    backgroundColor: 'rgba(108, 229, 232, 1)',
                    borderColor: 'rgba(108, 229, 232, 1)', 
                }
            },
            layout: {
                padding: {
                    left: 10,
                    right: 10,
                    top: 20,
                    bottom: 10
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: 'white',
                        font: {
                            size: 10,
                            family: 'Poppins',
                        }
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.2)'
                    }
                },
                x: {
                    ticks: {
                        color: 'white',
                        font: {
                            size: 9,
                            family: 'Poppins',
                        }
                    },
                    grid: {
                        lineWidth: 0,
                        drawOnChartArea: false,
                        color: 'white',
                    }
                }
            },
            plugins: {
                legend: {
                    display: false,
                }
            }
        }
    });
</script>

<!-- EXPENSES BY CATEGORY CHART -->
<script>
    const printCategoryCtx = document.getElementById('expenseCategoryChart').getContext('2d');
    const printCategoryChart = new Chart(printCategoryCtx, {
        type: 'bar',
        data: {
            labels: @json($chartExpenseData->pluck('expenseCategory')),
            datasets: [{
                label: 'Products Sold',
                data: @json($chartExpenseData->pluck('total_amount')),
                backgroundColor: 'rgba(108, 229, 232, 1)',
                borderColor: 'rgba(108, 229, 232, 1)',
                borderWidth: 1
            }]
        },
        options: {
            aspectRatio: 3,
            layout: {
                padding: {
                    left: 15,
                    right: 15,
                    top: 20,
                    bottom: 10
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: 'white',
                        font: {
                            size: 10,
                            family: 'Poppins',
                        }
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.2)' // Set horizontal grid line color
                    }
                },
                x: {
                    ticks: {
                        color: 'white',
                        font: {
                            size: 8,
                            family: 'Poppins',
                        },
                    },
                    grid: {
                        lineWidth: 0,
                    }
                }
            },
            plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                    bodyColor: 'white', // Tooltip text color
                    titleColor: 'white', // Tooltip title color
                    backgroundColor: 'rgba(0, 0, 0, 0.8)' // Optional: change tooltip background for better contrast
                },
                bgColor:{
                    backgroundColor: 'gray',
                    applyBackground: false
                }
            }
        },
        plugins: [bgColor]
    });
</script>
