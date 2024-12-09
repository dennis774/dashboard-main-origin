{{-- START --}}

<!-- DASHBOARD PANEL -->
<div class="d-flex rounded-4 dashboard-panel">
    <div class="row d-flex flex-grow-1 m-0 h-100 rounded-4 justify-content-center align-items-center text-white " style="padding-inline: 2%; padding-block: 2%;">
        <!-- UPPER ROW/COLUMN -->
        <div class="col-12 d-flex flex-row column-gap-3 p-0" style="height: 49%; margin-bottom: 0%;">
            <!-- TOTAL SALES -->
            <div class="col-2" style="width: 20%">
                <div class="d-flex flex-column rounded-4 h-100 main-dashboard-tile">
                    <div class="col-12 d-flex mt-1 align-items-end justify-content-center" style="height: 15%;">
                        <span class="db-card-title">Total Sales</span>
                    </div>
                    <div class="col-12 d-flex align-items-start justify-content-center" style="height: 15%;">
                        <span class="dashboard-total-text" style="font-size: 1.4rem;">999,999,999.00</span>
                    </div>
                    <div class="col-12 d-flex align-items-center justify-content-center" style="height: 70%;">
                        Donut Chart
                    </div>
                </div>
            </div>
            <!-- SALES TREND -->
            <div class="col">
                <div class="d-flex flex-column rounded-4 h-100 main-dashboard-tile">
                    <div class="col-12 d-flex mt-1 align-items-end justify-content-start" style="height: 15%;">
                        <span class="ms-3 db-card-title">Sales Trends</span>
                    </div>
                    <div class="col-12 d-flex align-items-center justify-content-center" style="height: 85%;">
                        Trend Chart
                    </div>
                </div>
            </div>
            <!-- LEAST SELLING -->
            <div class="col-3 p-0" style="width: 26%">
                <div class="d-flex flex-column rounded-4 h-100 main-dashboard-tile">
                    <div class="col-12 d-flex mt-1 align-items-end justify-content-start" style="height: 15%;">
                        <span class="ms-3 db-card-title">Least-Selling Products</span>
                    </div>
                    <div class="col-12 d-flex align-items-center justify-content-center" style="height: 85%;">
                        List Items
                    </div>
                </div>
            </div>
        </div>
        <!-- END UPPER ROW/COLUMN -->

        <!-- BOTTOM ROW/COLUMN -->
        <div class="col-12 d-flex flex-row column-gap-3 p-0" style="height: 45%; margin-top: 1%;">
            <div class="col-7" style="width: 57%">
                <div class="d-flex flex-column rounded-4 h-100 main-dashboard-tile">
                    <div class="col-12 d-flex mt-1 align-items-end justify-content-start" style="height: 15%;">
                        <span class="ms-3 db-card-title">Sales by Category</span>
                    </div>
                    <div class="col-12 d-flex align-items-center justify-content-center" style="height: 85%;">
                        Bar Chart
                    </div>
                </div>
            </div>
            <div class="col p-0">
                <div class="d-flex flex-column rounded-4 h-100 main-dashboard-tile">
                    <div class="col-12 d-flex mt-1 align-items-end justify-content-start" style="height: 15%;">
                        <span class="ms-3 db-card-title">Top-Selling Products</span>
                    </div>
                    <div class="col-12 d-flex align-items-center justify-content-center" style="height: 85%;">
                        Horizontal Bar Chart
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END BOTTOM ROW/COLUMN -->
</div>
</div>







<?php /*
<div class="container text-center content-container">
    <div class="row mb-5">
        {{-- START OF SIDE BAR --}}
<div class="col-lg-1"></div>
<div class="col-lg-1">
    <div class="container">
        <div class="row">
            @include('general.kuwago-one.sidebar')
        </div>
    </div>
</div>
{{-- END OF SIDE BAR --}}
{{-- START OF CONTENTS --}}
<div class="col-lg-9 p-3 kuwago1Sales">
    <div class="row">
        <div class="col-lg-2 donutChart p-2 mx-3">
            <p>Total Sales</p>
            <p style="font-weight: bold;">₱{{number_format($totalSales,2)}}</p>
            <div class="chart-container d-flex justify-content-center">
                <canvas id="myChart1"></canvas>
            </div>
        </div>
        <div class="col-lg-6 salesChartKuwago1">
            <canvas id="myChart2"></canvas>
        </div>
        <div class="col-lg-4 kuwagoLeastSelling mx-3">
            <h6>Least Selling Products Here</h6>
        </div>
    </div>

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-7 salesByCat">
                <h6>Sales By Category Here</h6>
            </div>
            <div class="col-lg-5 topSelling">Top Selling Products</div>
        </div>
    </div>
</div>
<div class="col-lg-1"></div>
</div>
</div>
-->


{{--
<!-- 
<script>
    const totalCash = @json($totalCash);
    const totalGcash = @json($totalGcash);

    const xValues = ["Cash", "Gcash"];
    const yValues = [totalCash, totalGcash];

    const barColors = ["#b91d47", "#00aba9"];

    new Chart("myChart1", {
        type: "doughnut",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            maintainAspectRatio: false, // Allow responsive resizing
            plugins: {
                legend: {
                    display: false // Hide legend
                },
                title: {
                    display: false // Remove title
                }
            }
        }
    });
</script>

<script>
    var ctx = document.getElementById('myChart2').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($chartdata - > pluck('date')),
            datasets: [{
                label: 'Sales',
                data: @json($chartdata - > pluck('sales')),
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
</script>  */ ?>



{{-- ORIGINAL CODE --}}
<?php /*
<div class="container text-center content-container">
    <div class="row mb-5">
        {{-- START OF SIDE BAR --}}
        <div class="col-lg-1"></div>
        <div class="col-lg-1">
            <div class="container">
                <div class="row">
                    @include('general.kuwago-two.sidebar')
                </div>
            </div>
        </div>
        {{-- END OF SIDE BAR --}} {{-- START OF CONTENTS--}}
        <div class="col-lg-9 p-3 kuwago1Sales">
            <div class="row">
                <div class="col-lg-2 donutChart p-2 mx-3"> 
                    <p>Total Sales</p>
                    <p style="font-weight: bold;">₱{{number_format($totalSales, 2)}}</p>
                    <div class="chart-container d-flex justify-content-center">
                        <canvas id="myChart1"></canvas>
                    </div>
                </div>
                <div class="col-lg-6 salesChartKuwago2"> 
                    <canvas id="myChart2"></canvas>
                </div>
                <div class="col-lg-4 kuwagoLeastSelling mx-3">
                    <h6>Least Selling Products Here</h6>
                </div>
            </div>

           <div class="container mt-2">
            <div class="row">
                <div class="col-lg-7 salesByCat">
                    <h6>Sales By Category Here</h6>
                </div>
                <div class="col-lg-5 topSelling">Top Selling Products</div>
            </div>
           </div>
            
        </div>
        <div class="col-lg-1"></div>
    </div>
</div>






<script>
    const totalCash = @json($totalCash);
        const totalGcash = @json($totalGcash);

        const xValues = ["Cash", "Gcash"];
        const yValues = [totalCash, totalGcash];

        const barColors = ["#b91d47", "#00aba9"];

        new Chart("myChart1", {
            type: "doughnut",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                maintainAspectRatio: false, // Allow responsive resizing
                plugins: {
                    legend: {
                        display: false // Hide legend
                    },
                    title: {
                        display: false // Remove title
                    }
                }
            }
        });
</script>

<script>
    var ctx = document.getElementById('myChart2').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($chartdata->pluck('date')),
            datasets: [{
                label: 'Sales',
                data: @json($chartdata->pluck('sales')),
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
                        color: 'rgba(255, 255, 255, 0.2)' // Disable horizontal grid lines
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


*/ ?>