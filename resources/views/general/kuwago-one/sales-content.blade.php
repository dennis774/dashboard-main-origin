{{-- START --}}
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
                    <p style="font-weight: bold;">₱{{$totalSales}}</p>
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
