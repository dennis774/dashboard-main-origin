<!DOCTYPE html>
<html>
<head>
    <title>Kuwago One Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Kuwago One Dashboard</title>

    <!-- Display Target Sale Data -->
    @if ($targetSale)
        <h2>Target Sale</h2>
        <p>Business Type: {{ $targetSale->business_type }}</p>
        <p>Amount: {{ $targetSale->amount }}</p>
        <p>Start Date: {{ $targetSale->start_date }}</p>
        <p>End Date: {{ $targetSale->end_date }}</p>
        <p>Display Identifier: {{ $targetSale->display_identifier }}</p>
    @else
        <p>No target sale found for display.</p>
    @endif

    <!-- Create a canvas element for the chart -->
    <canvas id="gaugeChart" width="400" height="200"></canvas>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var ctx = document.getElementById('gaugeChart').getContext('2d');

            // Values for the chart
            var targetSaleAmount = {{ $targetSale->amount }};
            var totalSales = {{ $totalSales }};
            var percentage = (targetSaleAmount / totalSales) * 100;

            console.log('Target Sale Amount:', targetSaleAmount);
            console.log('Total Sales:', totalSales);
            console.log('Percentage:', percentage);

            var gaugeChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [percentage, 100 - percentage],
                        backgroundColor: ['#FFA500', '#FFFFFF'],
                        borderWidth: 0
                    }]
                },
                options: {
                    circumference: Math.PI,
                    rotation: Math.PI,
                    cutoutPercentage: 70,
                    tooltips: { enabled: false },
                    hover: { mode: null },
                    plugins: {
                        datalabels: {
                            display: true,
                            formatter: function(value, context) {
                                return context.chart.data.datasets[0].data[0].toFixed(2) + '%';
                            },
                            color: '#000',
                            font: {
                                weight: 'bold',
                                size: 24
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>