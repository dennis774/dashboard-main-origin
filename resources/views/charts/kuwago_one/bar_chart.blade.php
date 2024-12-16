<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($chartdata->pluck('date')),
            datasets: [{
                label: 'Sales',
                data: @json($chartdata->pluck('sales')),
                backgroundColor: 'rgb(32, 93, 64)',
                borderWidth: 1,
                borderRadius: 5,
                fill: 'origin'
            }, {
                label: 'Profit',
                data: @json($chartdata->pluck('profit')),
                backgroundColor: 'rgb(223, 159, 20)',
                fill: 'origin',
                borderRadius: 5
            }, {
                label: 'Expenses',
                data: @json($chartdata->pluck('expenses')),
                backgroundColor: 'rgb(217, 217, 217)',
                borderWidth: 1,
                fill: 'origin',
                borderRadius: 5
            }]
        },
        options: {
            aspectRatio: 3,
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 10,
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
                            size: 9.5,
                            family: 'Poppins',
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
                }
            }
        }
    });
</script>
