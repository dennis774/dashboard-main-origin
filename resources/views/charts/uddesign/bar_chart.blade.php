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
        const maxDataValue = Math.max(
            ...@json($chartdata->pluck('print_sales')),
            ...@json($chartdata->pluck('print_profit')),
            ...@json($chartdata->pluck('print_expenses'))
        );

        const dynamicMax = Math.ceil(maxDataValue * 1.1);

        var ctx = document.getElementById('PrintingChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($chartdata->pluck('date')),
                datasets: [{
                    label: 'Sales',
                    data: @json($chartdata->pluck('print_sales')),
                    backgroundColor: 'rgb(32, 93, 64)',
                    borderWidth: 1,
                    borderRadius: 5,
                    fill: 'origin'
                }, {
                    label: 'Profit',
                    data: @json($chartdata->pluck('print_profit')),
                    backgroundColor: 'rgb(223, 159, 20)',
                    fill: 'origin',
                    borderRadius: 5
                }, {
                    label: 'Expenses',
                    data: @json($chartdata->pluck('print_expenses')),
                    backgroundColor: 'rgb(217, 217, 217)',
                    borderWidth: 1,
                    fill: 'origin',
                    borderRadius: 5
                }]
            },
            options: {
            aspectRatio: 0.5,
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 15,
                    top: 5,
                    bottom: 5,
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: 'white',
                        font: {
                            size: 9.5,
                            family: 'Poppins',
                        }
                    },
                    grid: {
                        color: 'white',
                        lineWidth: 0.1
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
                            // Truncate long labels
                            const labels = @json($chartdata->pluck('date'));
                            const maxLabelLength = 5;
                            const label = labels[index] || '';
                            return label.length > maxLabelLength ? label.substring(0, maxLabelLength) + '...' : label;
                        }
                    },
                    grid: {
                        lineWidth: 0
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        font: {
                            size: 10,          
                            family: 'Poppins',    
                            },  
                        color: 'white',
                        usePointStyle: true, 
                        pointStyle: 'rect'
                    }
                },
                tooltip: {
                    bodyColor: 'white',
                    titleColor: 'white',
                    backgroundColor: 'rgba(0, 0, 0, 0.8)'
                },
                bgColor:{
                    backgroundColor: 'rgba(224, 224, 224, 0.8)',
                    applyBackground: false
                }
            }
            },
            plugins:[bgColor]
        });

        // MERCH CHART
        var ctx = document.getElementById('MerchChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($chartdata->pluck('date')),
                datasets: [{
                    label: 'Sales',
                    data: @json($chartdata->pluck('merch_sales')),
                    backgroundColor: 'rgb(32, 93, 64)',
                    borderWidth: 1,
                    borderRadius: 5,
                    fill: 'origin'
                }, {
                    label: 'Profit',
                    data: @json($chartdata->pluck('merch_profit')),
                    backgroundColor: 'rgb(223, 159, 20)',
                    fill: 'origin',
                    borderRadius: 5
                }, {
                    label: 'Expenses',
                    data: @json($chartdata->pluck('merch_expenses')),
                    backgroundColor: 'rgb(217, 217, 217)',
                    borderWidth: 1,
                    fill: 'origin',
                    borderRadius: 5
                }]
            },
            options: {
            aspectRatio: 0.5,
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 15,
                    top: 5,
                    bottom: 5,
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: 'white',
                        font: {
                            size: 9.5,
                            family: 'Poppins',
                        }
                    },
                    grid: {
                        color: 'white',
                        lineWidth: 0.1
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
                            // Truncate long labels
                            const labels = @json($chartdata->pluck('date'));
                            const maxLabelLength = 5;
                            const label = labels[index] || '';
                            return label.length > maxLabelLength ? label.substring(0, maxLabelLength) + '...' : label;
                        }
                    },
                    grid: {
                        lineWidth: 0
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        font: {
                            size: 10,          
                            family: 'Poppins',    
                            },  
                        color: 'white',
                        usePointStyle: true, 
                        pointStyle: 'rect'
                    }
                },
                tooltip: {
                    bodyColor: 'white',
                    titleColor: 'white',
                    backgroundColor: 'rgba(0, 0, 0, 0.8)'
                },
                bgColor:{
                    backgroundColor: 'rgba(224, 224, 224, 0.8)',
                    applyBackground: false
                }
            }
        },
        plugins: [bgColor]
        });
    });
    
</script>