<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($chartdata->pluck('date')),
            datasets: [{
                label: 'Sales',
                data: @json($chartdata->pluck('sales')),
                backgroundColor: 'green',
                borderColor: 'green',
                borderWidth: 1,
                fill: 'origin'
            }, {
                label: 'Profit',
                data: @json($chartdata->pluck('profit')),
                backgroundColor: 'yellow',
                borderColor: 'yellow',
                borderWidth: 1,
                fill: 'origin'
            }, {
                label: 'Expenses',
                data: @json($chartdata->pluck('expenses')),
                backgroundColor: 'white',
                borderColor: 'white',
                borderWidth: 1,
                fill: 'origin'
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: 'white' // Set Y-axis text color to white
                    }
                },
                x: {
                    ticks: {
                        color: 'white' // Set X-axis text color to white
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
