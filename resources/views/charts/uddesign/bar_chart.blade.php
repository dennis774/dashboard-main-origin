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
        var ctx = document.getElementById('PrintingChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($chartdata->pluck('date')),
                datasets: [{
                    label: 'Sales',
                    data: @json($chartdata->pluck('print_sales')),
                    backgroundColor: 'rgba(0, 128, 0, 0.5)', // Use rgba for transparency
                    borderColor: 'rgba(0, 128, 0, 1)',
                    borderWidth: 1,
                },{
                    label: 'Profit',
                    data: @json($chartdata->pluck('print_profit')),
                    backgroundColor: 'rgba(255, 255, 0, 0.5)',
                    borderColor: 'rgba(255, 255, 0, 1)',
                    borderWidth: 1,
                },{
                    label: 'Expenses',
                    data: @json($chartdata->pluck('print_expenses')),
                    backgroundColor: 'rgba(255, 255, 255, 0.5)',
                    borderColor: 'rgba(255, 255, 255, 1)',
                    borderWidth: 1,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'white' // Color of the y-axis labels
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
                    bgColor:{
                        backgroundColor: 'gray',
                        applyBackground: false
                    }
                }
            },
            plugins: [bgColor]
        });


        var ctx = document.getElementById('MerchChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($chartdata->pluck('date')),
                datasets: [{
                    label: 'Sales',
                    data: @json($chartdata->pluck('merch_sales')),
                    backgroundColor: 'rgba(0, 128, 0, 0.5)', // Use rgba for transparency
                    borderColor: 'rgba(0, 128, 0, 1)',
                    borderWidth: 1,
                },{
                    label: 'Profit',
                    data: @json($chartdata->pluck('merch_profit')),
                    backgroundColor: 'rgba(255, 255, 0, 0.5)',
                    borderColor: 'rgba(255, 255, 0, 1)',
                    borderWidth: 1,
                },{
                    label: 'Expenses',
                    data: @json($chartdata->pluck('merch_expenses')),
                    backgroundColor: 'rgba(255, 255, 255, 0.5)',
                    borderColor: 'rgba(255, 255, 255, 1)',
                    borderWidth: 1,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'white' // Color of the y-axis labels
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
                    bgColor:{
                        backgroundColor: 'gray',
                        applyBackground: false
                    }
                }
            },
            plugins: [bgColor]
        });
    });
    
</script>
