<script>
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
                        beginAtZero: true
                    }
                }
            }
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
                        beginAtZero: true
                    }
                }
            }
        });
    });
    
</script>
