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
                            <span class="dashboard-total-text" style="font-size: 1.4rem;">{{number_format($totalSales,2)}}</span>
                        </div>
                        <div class="col-12 d-flex flex-column ps-4 mt-1 align-items-center justify-content-start" style="height: 60%;">
                            <div class="col-12 d-flex flex-row mb-2 align-items-center uddesign-side-text" style="font-size: clamp(0.75rem, 1.6vw, 0.9rem); letter-spacing: 1.5px;">
                                <span class="me-1">Print/Photo:</span> {{number_format($totalPrintSales,2)}}
                            </div>
                            <div class="col-12 d-flex mb-2 align-items-center uddesign-side-text" style="font-size: clamp(0.75rem, 1.6vw, 0.9rem); letter-spacing: 1.5px;">
                                <span class="me-1">UdD Merch:</span> {{number_format($totalMerchSales,2)}}
                            </div>
                            <div class="col-12 d-flex align-items-center uddesign-side-text" style="font-size: clamp(0.75rem, 1.6vw, 0.9rem); letter-spacing: 1.5px;">
                                <span class="me-1">Custom Deals:</span> {{number_format($totalCustomSales,2)}}
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
                                <canvas id="printCategoryChart"></canvas>
                            </div>
                        </div>

                        <!-- RIGHT CHART -->
                        <div class="col d-flex flex-column align-items-center h-100" style="width: 45%;">
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


{{-- DONUT CHART --}}
<script>
    const totalCash = @json($totalCash);
    const totalGcash = @json($totalGcash);

    const xValues = ["Cash ", "GCash"];
    const yValues = (totalCash === 0 && totalGcash === 0) ? [0.5, 0.5] : [totalCash, totalGcash];

    const barColors = ["#df9f14", "#e9e9e8"];

    new Chart("donutChart", {
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
            aspectRatio: 0.9,
            layout: {
                padding: {
                    left: 13,
                    right: 13
                },
            },
            plugins: {
                legend: {
                    display: true,
                        position: 'bottom', 
                        align: 'center',
                        labels: {
                            color: 'white',
                            font: {
                                size: 9.5,
                                family: 'Poppins'
                            },
                            usePointStyle: true, 
                            pointStyle: 'rect',
                            boxWidth: 15,
                            padding: 0, 
                        }
                },
                title: {
                    display: false // Remove title
                }
            }
        }
    });
</script>

{{-- SALES TRENDS --}}
<script>
    const ctx2 = document.getElementById('myChart2').getContext('2d');
    const myChart2 = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: @json($chartdata->pluck('date')),
            datasets: [{
                label: 'Printing/Photocopy ',
                data: @json($chartdata->pluck('print_sales')),
                borderColor: 'rgba(108, 229, 232, 1)',
                borderWidth: 2,
                fill: false,
                pointRadius: 5, 
                pointBackgroundColor: 'rgba(108, 229, 232, 1)',
                pointBorderColor: 'rgba(108, 229, 232, 1)', 
            },{
                label: 'UdD Merch',
                data: @json($chartdata->pluck('merch_sales')),
                borderColor: 'rgb(126, 217, 87)',
                borderWidth: 2,
                fill: false,
                pointRadius: 5, 
                pointBackgroundColor: 'rgb(126, 217, 87)',
                pointBorderColor: 'rgb(126, 217, 87)', 
            }]
        },
        options: {
            aspectRatio: 2.8,
            maintainAspectRatio: false,
            elements: {
                point: {
                    
                }
            },
            layout: {
                padding: {
                    left: 15,
                    right: 20,
                    top: 5,
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
                        },
                        callback: function(value, index) {
                            const labels = @json($chartdata->pluck('date'));
                            const maxLabelLength = 5;
                            const label = labels[index] || '';
                            return label.length > maxLabelLength ? label.substring(0, maxLabelLength) + '...' : label;
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
                    display: true,
                    position: 'top', 
                    align: 'end',
                    labels: {
                        color: 'white',
                        font: {
                            size: 9.5,
                            family: 'Poppins',
                            weight: 'bold'
                        },
                        usePointStyle: true, 
                        pointStyle: 'circle',
                        boxWidth: 15,
                        padding: 3, 
                    }
                }
            }
        }
    });
</script>


<!-- PRINT PHOTO Category -->
<script>
    const printCategoryCtx = document.getElementById('printCategoryChart').getContext('2d');
    const printCategoryChart = new Chart(printCategoryCtx, {
        type: 'bar',
        data: {
            labels: @json($printCategoryData->pluck('printcategory')),
            datasets: [{
                label: 'Products Sold',
                data: @json($printCategoryData->pluck('total_pcs')),
                backgroundColor: 'rgba(108, 229, 232, 1)',
                borderColor: 'rgba(108, 229, 232, 1)',
                borderWidth: 1
            }]
        },
        options: {
            aspectRatio: 1,
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
                            size: 9,
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
                        padding: 9,
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
                    bodyColor: 'white',
                    titleColor: 'white',
                    titleFont: {
                        size: 12,
                    },
                    bodyFont: {
                        size: 10,
                        family: 'Poppins'
                    },
                    backgroundColor: 'rgba(0, 0, 0, 0.8)'
                    
                }
            }
        }
    });
</script>




<!-- OTHER CATEGORY -->
<script>
    const categoryCtx = document.getElementById('categoryChart').getContext('2d');
    const categoryChart = new Chart(categoryCtx, {
        type: 'bar',
        data: {
            labels: @json($chartCategoryData->pluck('merchcategory')),
            datasets: [{
                label: 'Products Sold',
                data: @json($chartCategoryData->pluck('total_pcs')),
                backgroundColor: 'rgba(108, 229, 232, 1)',
                borderColor: 'rgba(108, 229, 232, 1)',
                borderWidth: 1
            }]
        },
        options: {
            aspectRatio: 2,
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
                            size: 9,
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
                            size: 8,
                            family: 'Poppins',
                        },
                        callback: function(value, index) {
                            const labels = @json($chartCategoryData->pluck('merchcategory'));
                            const maxLabelLength = 5;
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
                    bodyColor: 'white',
                    titleColor: 'white',
                    titleFont: {
                        size: 12,
                    },
                    bodyFont: {
                        size: 10,
                        family: 'Poppins'
                    },
                    backgroundColor: 'rgba(0, 0, 0, 0.8)'
                    
                }
            }
        }
    });
</script>


<!-- TOP SELLING -->
<script>
    const topDishesCtx = document.getElementById('topDishesChart').getContext('2d');
    const topDishesChart = new Chart(topDishesCtx, {
        type: 'bar',
        data: {
            labels: @json($topMerches->pluck('merch')),
            datasets: [{
                label: 'Order Quantity',
                data: @json($topMerches->pluck('total_pcs')),
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
                            const labels = @json($topMerches->pluck('merch'));
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







