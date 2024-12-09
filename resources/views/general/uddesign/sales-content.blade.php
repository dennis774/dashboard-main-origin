{{-- START --}}
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
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6 style="color: #fff;">Total Sales</h6>
                                    <p style="color: #fff;">₱{{ $totalSales }}</p>
                                    <p style="color: #fff;">Print/Photo: ₱{{ $totalPrintSales }}</p>
                                    <p style="color: #fff;">UdD Merch: ₱{{ $totalMerchSales }}</p>
                                    <p style="color: #fff;">Closed Deals: ₱{{ $totalCustomSales }}</p>
                                </div>
                                <div class="col-lg-6">
                                    <canvas id="donutChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <canvas id="myChart2" width="400" height="200"></canvas>

                    </div>
                </div>
                <div class="container mt-2">
                <div class="row">
                    <div class="col-lg-4 chartsKuwago1">
                        <h6>Sales By Category Here</h6>
                        <canvas id="printCategoryChart"></canvas>
                    </div>
                    <div class="col-lg-5 chartsKuwago1">
                        <h6>Sales By Category Here</h6>
                        <canvas id="categoryChart"></canvas>
                    </div>
                    <div class="col-lg-3 topSelling">
                        <h6>Top Selling Products</h6>
                        <canvas id="topDishesChart"></canvas>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-1"></div>
    </div>
</div>

<script>
    // Doughnut Chart: Cash vs Gcash
    const totalCash = @json($totalCash);
    const totalGcash = @json($totalGcash);

    const xValues = ["Cash", "Gcash"];
    const yValues = [totalCash, totalGcash];
    const barColors = ["#b91d47", "#00aba9"];

    new Chart("donutChart", {
        type: "doughnut",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            plugins: {
                legend: {
                    labels: {
                        color: 'white' // Legend text color
                    }
                },
                tooltip: {
                    titleColor: 'white', // Tooltip title text
                    bodyColor: 'white', // Tooltip body text
                }
            },
            title: {
                display: true,
                text: "Cash vs Gcash",
                fontColor: "white" // Title text color
            }
        }
    });
</script>

<script>
    // Line Chart: Print/Photo, UdD Merch, Custom Deals
    var ctx = document.getElementById('myChart2').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($chartdata->pluck('date')),
            datasets: [{
                label: 'Print/Photo',
                data: @json($chartdata->pluck('print_sales')),
                borderColor: 'blue',
                borderWidth: 1,
                fill: 'origin'
            }, {
                label: 'UdD Merch',
                data: @json($chartdata->pluck('merch_sales')),
                borderColor: 'green',
                borderWidth: 1,
                fill: 'origin'
            }, {
                label: 'Custom Deals',
                data: @json($chartdata->pluck('custom_sales')),
                borderColor: 'yellow',
                borderWidth: 1,
                fill: 'origin'
            }]
        },
        options: {
            plugins: {
                legend: {
                    labels: {
                        color: 'white' // Legend text color
                    }
                },
                tooltip: {
                    titleColor: 'white', // Tooltip title text
                    bodyColor: 'white' // Tooltip body text
                }
            },
            scales: {
                x: {
                    ticks: {
                        color: 'white' // X-axis labels color
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.2)' // Optional: light white grid lines
                    }
                },
                y: {
                    ticks: {
                        color: 'white' // Y-axis labels color
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.2)' // Optional: light white grid lines
                    },
                    beginAtZero: true
                }
            }
        }
    });
</script>

<!-- Bar Chart for Print Category -->
<script>
    const printCategoryCtx = document.getElementById('printCategoryChart').getContext('2d');
    const printCategoryChart = new Chart(printCategoryCtx, {
        type: 'bar',
        data: {
            labels: @json($printCategoryData->pluck('printcategory')),
            datasets: [{
                label: 'Products Sold',
                data: @json($printCategoryData->pluck('total_pcs')),
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


<!-- Bar Chart for Merch Category -->
<script>
    const categoryCtx = document.getElementById('categoryChart').getContext('2d');
    const categoryChart = new Chart(categoryCtx, {
        type: 'bar',
        data: {
            labels: @json($chartCategoryData->pluck('merchcategory')),
            datasets: [{
                label: 'Products Sold',
                data: @json($chartCategoryData->pluck('total_pcs')),
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

<!-- Bar Chart for Top 5 Dishes -->
<script>
    const topDishesCtx = document.getElementById('topDishesChart').getContext('2d');
    const topDishesChart = new Chart(topDishesCtx, {
        type: 'bar',
        data: {
            labels: @json($topMerches->pluck('merch')),
            datasets: [{
                label: 'Total PCS',
                data: @json($topMerches->pluck('total_pcs')),
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y', // Display bar chart with y-axis representation
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: 'white'
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.2)'
                    }
                },
                x: {
                    ticks: {
                        color: 'white'
                    },
                    grid: {
                        display: false
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: 'white'
                    }
                },
                tooltip: {
                    bodyColor: 'white',
                    titleColor: 'white',
                    backgroundColor: 'rgba(0, 0, 0, 0.8)'
                }
            }
        }
    });
</script>
