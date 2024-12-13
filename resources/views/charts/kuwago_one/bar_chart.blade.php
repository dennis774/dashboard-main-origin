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
                fill: 'origin'
            }, {
                label: 'Profit',
                data: @json($chartdata->pluck('profit')),
                backgroundColor: 'rgb(223, 159, 20)',
                fill: 'origin'
            }, {
                label: 'Expenses',
                data: @json($chartdata->pluck('expenses')),
                backgroundColor: 'rgb(217, 217, 217)',
                borderWidth: 1,
                fill: 'origin'
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: 'white'
                    }
                },
                x: {
                    ticks: {
                        color: 'white'
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        font: {
                            size: 10,          
                            family: 'Helvetica Text Now, sans-serif',    
                            weight: 'semibold'     
                            },  
                        color: 'white',
                        boxWidth: 13,
                        bodHeight: 17
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
