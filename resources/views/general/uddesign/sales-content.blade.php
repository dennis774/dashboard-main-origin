<!-- DASHBOARD PANEL -->
<div class="d-flex rounded-4 dashboard-panel">
    <div class="row d-flex flex-grow-1 m-0 h-100 rounded-4 justify-content-center align-items-center text-white " style="padding-inline: 2%; padding-block: 2%;">
        <!-- UPPER ROW/COLUMN -->
        <div class="col-12 d-flex flex-row column-gap-3 p-0" style="height: 48%; margin-bottom: 0%;">
            <!-- TOTAL SALES & PAYMENT METHOD -->
            <div class="col" style="width: 46%">
                <div class="d-flex flex-row rounded-4 h-100 main-dashboard-tile">
                    <!-- TOTAL SALES -->
                    <div class="col d-flex flex-column align-items-center h-100" style="width: 55%;">
                        <div class="col-12 d-flex mt-2 align-items-end justify-content-center" style="height: 15%;">
                            <span class="uddesign-right-title">Total Sales</span>
                        </div>
                        <div class="col-12 d-flex mb-4 align-items-start justify-content-center" style="height: 13%;">
                            <span class="dashboard-total-text" style="font-size: 1.4rem;">999,999,999.00</span>
                        </div>
                        <div class="col-12 d-flex flex-column ps-4 mt-1 align-items-center justify-content-start" style="height: 60%;">
                            <div class="col-12 d-flex flex-row mb-2 align-items-center uddesign-side-text" style="font-size: clamp(0.75rem, 1.6vw, 0.9rem); letter-spacing: 1.5px;">
                                <span class="me-1">Print/Photo:</span> 1.00
                            </div>
                            <div class="col-12 d-flex mb-2 align-items-center uddesign-side-text" style="font-size: clamp(0.75rem, 1.6vw, 0.9rem); letter-spacing: 1.5px;">
                                <span class="me-1">UdD Merch:</span> 500.00
                            </div>
                            <div class="col-12 d-flex align-items-center uddesign-side-text" style="font-size: clamp(0.75rem, 1.6vw, 0.9rem); letter-spacing: 1.5px;">
                                <span class="me-1">Custom Deals:</span> 999.00
                            </div>
                        </div>
                    </div>
                    <div class="vr p-0 text-white opacity-75 align-self-center" style="width: 1px; min-height: 75%;"></div>

                    <!-- PAYMENT METHODS -->
                    <div class="col-auto d-flex flex-column align-items-center h-100" style="width: 45%;">
                        <div class="col-12 d-flex mt-2 align-items-end justify-content-center" style="height: 15%;">
                            <span class="uddesign-right-title">Payment Methods</span>
                        </div>
                        <div class="col-12 d-flex align-items-center justify-content-center" style="height: 70%;">
                        <canvas id="donutChart"></canvas>
                        </div>
                    </div>

                </div>
            </div>
            <!-- SALES TREND -->
            <!-- <div class="col">
                <div class="d-flex flex-column rounded-4 h-100 main-dashboard-tile">
                    <div class="col-12 d-flex mt-1 align-items-end justify-content-start" style="height: 15%;">
                        <span class="ms-3 db-card-title">Sales Trends</span>
                    </div>
                    <div class="col-12 d-flex align-items-center justify-content-center" style="height: 85%;">
                        Trend Chart
                    </div>
                </div>
            </div> -->
            <!-- SALES TREND -->
            <div class="col-3 p-0" style="width: 52%">
                <div class="d-flex flex-column rounded-4 h-100 main-dashboard-tile">
                    <div class="col-12 d-flex mt-1 align-items-end justify-content-start" style="height: 15%;">
                        <span class="ms-3 fw-bold db-card-title">Sales Trends</span>
                    </div>
                    <div class="col-12 d-flex align-items-center justify-content-center" style="height: 85%;">
                    <canvas id="myChart2" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- END UPPER ROW/COLUMN -->

        <!-- BOTTOM ROW/COLUMN -->
        <div class="col-12 d-flex flex-row column-gap-3 p-0" style="height: 46%; margin-top: 1%;">
            <!-- SALES BY CATEGORY -->
            <div class="col-7" style="width: 57%">
                <div class="d-flex flex-column rounded-4 h-100 main-dashboard-tile">
                    <div class="col-12 d-flex mt-1 align-items-end justify-content-start" style="height: 15%;">
                        <span class="ms-3 db-card-title">Sales by Category</span>
                    </div>
                    <div class="col-12 d-flex align-items-center justify-content-center" style="height: 85%;">
                        <!-- LEFT CHART -->
                        <div class="col-auto d-flex flex-grow flex-column align-items-center h-100" style="width: 30%;">
                            <div class="col-12 d-flex flex-grow-1 align-items-center justify-content-center" style="height: 70%;">
                                Bar Chart Left
                            </div>
                        </div>

                        <!-- RIGHT CHART -->
                        <div class="col d-flex flex-column align-items-center h-100">
                            <div class="col-12 d-flex flex-grow-1  align-items-center justify-content-center" style="height: 70%;">
                                <canvas id="categoryChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- TOP SELLING UDD MERCH -->
            <div class="col p-0">
                <div class="d-flex flex-column rounded-4 h-100 main-dashboard-tile">
                    <div class="col-12 d-flex mt-1 align-items-end justify-content-start" style="height: 15%;">
                        <span class="ms-3 db-card-title">Top-Selling Products</span>
                    </div>
                    <div class="col-12 d-flex align-items-center justify-content-center" style="height: 85%;">
                        <canvas id="topDishesChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END BOTTOM ROW/COLUMN -->
</div>
</div>

<script>
    // Doughnut Chart: Cash vs Gcash
    const totalCash = @json($totalCash);
    const totalGcash = @json($totalGcash);

    const xValues = ["Cash", "Gcash"];
    const yValues = [totalCash, totalGcash];
    const barColors = ["#b91d47", "#00aba9"];

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
                },
                bgColor:{
                    backgroundColor: 'rgb(210, 210, 210)',
                    applyBackground: false
                }
            },
            plugins: [bgColor],
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
                },
                bgColor:{
                    backgroundColor: 'rgb(177, 177, 177)',
                    applyBackground: false
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
        },
        plugins: [bgColor]
    });
</script>

<!-- Bar Chart for Category -->
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
                },
                bgColor:{
                    backgroundColor: 'rgb(177, 177, 177)',
                    applyBackground: false
                }
            }
        },
        plugins: [bgColor]
    });
</script>


<!-- Bar Chart for Category -->
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
                },
                bgColor:{
                    backgroundColor: 'rgb(177, 177, 177)',
                    applyBackground: false
                }
            }
        },
        plugins: [bgColor]
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
                },
                bgColor:{
                    backgroundColor: 'rgb(177, 177, 177)'   ,
                    applyBackground: false
                }
            }
        },
        plugins: [bgColor]
    });
</script>














{{-- ORIGINAL CODE --}}
<?php
/*
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
*/ ?>