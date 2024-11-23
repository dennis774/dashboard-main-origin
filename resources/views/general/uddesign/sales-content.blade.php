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
                                    <p style="color: #fff">₱{{ $totalSales }}</p>
                                    <p style="color: #fff">Print/Photo: ₱{{ $totalPrintSales }}</p>
                                    <p style="color: #fff">UdD Merch: ₱{{ $totalMerchSales }}</p>
                                    <p style="color: #fff">Closed Deals: ₱{{ $totalCustomSales }}</p>
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
                    
                </div>
            </div>
        </div>
        <div class="col-lg-1"></div>
    </div>
</div>
