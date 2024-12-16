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
                        <span class="dashboard-total-text" style="font-size: 1.4rem;">{{number_format($totalSales,2)}}</span>
                    </div>
                    <div class="col-12 d-flex align-items-center justify-content-center" style="height: 70%;">
                        <canvas id="myChart1"></canvas>
                    </div>
                </div>
            </div>
            <!-- SALES TREND -->
            <div class="col">
                <div class="d-flex flex-column rounded-4 h-100 main-dashboard-tile">
                    <div class="col-12 d-flex mt-1 mb-2 align-items-end justify-content-start" style="height: 15%;">
                        <span class="ms-3 db-card-title">Sales Trends</span>
                    </div>
                    <div class="col-12 d-flex align-items-center justify-content-center" style="height: 78%;">
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>
            </div>
            <!-- LEAST SELLING -->
            <div class="col-3 p-0" style="width: 26%">
                <div class="d-flex flex-column rounded-4 h-100 main-dashboard-tile">
                    <div class="col-12 d-flex mt-1 mb-3 align-items-end justify-content-start" style="height: 15%;">
                        <span class="ms-3 db-card-title">Least-Selling Products</span>
                    </div>
                    <div class="col-12 d-flex ps-2 align-items-start justify-content-start" style="height: 85%;">
                        <ol>
                            @if($bottomDishes->isNotEmpty())
                                @foreach($bottomDishes as $dish)
                                    <li class="text-start justify-content-between mb-2" style="font-size:0.85rem; letter-spacing: 0.5px;">
                                        {{ $dish->dish }}: {{$dish->total_pcs}}
                                    </li>
                                @endforeach
                            @else
                                <div class="d-flex justify-content-center">
                                    <span class="fw-light fst-italic text-center" style="font-size: 0.75rem;">No dishes available.</span>
                                </div>
                                
                            @endif
                        </ol>
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
                        <canvas id="categoryChart"></canvas>
                    </div>
                </div>
            </div>
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


<!-- Donut Chart for  cash or gcash-->
<script>
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

<!-- Line Chart for sales -->
<script>
    const ctx2 = document.getElementById('myChart2').getContext('2d');
    const myChart2 = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: @json($chartdata->pluck('date')),
            datasets: [{
                label: 'Sales',
                data: @json($chartdata->pluck('sales')),
                borderColor: 'green',
                borderWidth: 2,
                fill: false // Disable fill under the line
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
                    backgroundColor: 'gray',
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
            labels: @json($chartCategoryData->pluck('category')),
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
                    backgroundColor: 'gray',
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
            labels: @json($topDishes->pluck('dish')),
            datasets: [{
                label: 'Total PCS',
                data: @json($topDishes->pluck('total_pcs')),
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
                    backgroundColor: 'gray',
                    applyBackground: false
                }
            }
        },
        plugins: [bgColor]
    });
</script>


<!-- Donut Chart for  cash or gcash-->
<script>
    const totalCash = @json($totalCash);
    const totalGcash = @json($totalGcash);

    const xValues = ["Cash", "GCash"];
    const yValues = (totalCash === 0 && totalGcash === 0) ? [0.5, 0.5] : [totalCash, totalGcash];

    const barColors = ["#df9f14", "#e9e9e8"];

    new Chart("myChart1", {
        type: "doughnut",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                borderWidth: 0,
                data: yValues
            }]
        },
        options: {
            cutout: '50%',
            aspectRatio: 0.8,
            layout: {
                padding: {
                    left: 10,
                    right: 10
                },
            },
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

<!-- SALES TREND CHART -->
<script>
    const ctx2 = document.getElementById('myChart2').getContext('2d');
    const myChart2 = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: @json($chartdata->pluck('date')),
            datasets: [{
                label: 'Sales',
                data: @json($chartdata->pluck('sales')),
                borderColor: 'rgba(108, 229, 232, 1)',
                borderWidth: 2,
                fill: false 
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
                    left: 15,
                    right: 35,
                    top: 20,
                    bottom:5
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

<!-- SALES BY CATEGORY CHART -->
<script>
    const categoryCtx = document.getElementById('categoryChart').getContext('2d');
    const categoryChart = new Chart(categoryCtx, {
        type: 'bar',
        data: {
            labels: @json($chartCategoryData->pluck('category')),
            datasets: [{
                label: 'Products Sold',
                data: @json($chartCategoryData->pluck('total_pcs')),
                backgroundColor: 'rgba(108, 229, 232, 1)',
                borderColor: 'rgba(108, 229, 232, 1)',
                borderWidth: 1
            }]
        },
        options: {
            aspectRatio: 3.3,
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
                        color: 'rgba(255, 255, 255, 0.2)' // Set horizontal grid line color
                    }
                },
                x: {
                    ticks: {
                        color: 'white',
                        font: {
                            size: 9,
                            family: 'Poppins',
                        },
                        callback: function(value, index) {
                            const labels = @json($chartCategoryData->pluck('category'));
                            const maxLabelLength = 7;
                            const label = labels[index] || '';
                            return label.length > maxLabelLength ? label.substring(0, maxLabelLength) + '...' : label;
                        }
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
                }
            }
        }
    });
</script>

<!-- TOP SELLING CHART -->
<script>
    const topDishesCtx = document.getElementById('topDishesChart').getContext('2d');
    const topDishesChart = new Chart(topDishesCtx, {
        type: 'bar',
        data: {
            labels: @json($topDishes->pluck('dish')),
            datasets: [{
                label: 'Order Quantity',
                data: @json($topDishes->pluck('total_pcs')),
                backgroundColor: ['#df9f14','#cdad69','#dcffef','#4ff6a7','#205d40'],
                borderColor: ['#df9f14','#cdad69','#dcffef','#4ff6a7','#205d40'],
                borderWidth: 1,
                categoryPercentage: 0.95,
                barPercentage: 0.95,
            }]
        },
        options: {
            indexAxis: 'y',
            aspectRatio: 2.4,
            layout: {
                padding: {
                    left: 5,
                    right: 25,
                    top: 10,
                    bottom: 10
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: 'white',
                        font: {
                            size: 9,
                            family:'Poppins',
                        },
                        callback: function(value, index) {
                            // Truncate long labels
                            const labels = @json($topDishes->pluck('dish'));
                            const maxLabelLength = 11;
                            const label = labels[index] || '';
                            return label.length > maxLabelLength ? label.substring(0, maxLabelLength) + '...' : label;
                        }
                    },
                    grid: {
                        lineWidth: 0
                    }
                },
                x: {
                    ticks: {
                        color: 'white',
                        font: {
                            size: 9,
                            family:'Poppins',
                        }
                        
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.2)',
                        lineWidth: 0.5
                    }
                }
            },
            plugins: {
                legend: {
                    display: false,
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
