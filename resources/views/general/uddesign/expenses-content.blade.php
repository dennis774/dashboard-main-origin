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