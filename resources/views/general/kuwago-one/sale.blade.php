<!DOCTYPE html>
<html>
<head>
    <title>Kuwago One Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #salesChartContainer {
            width: 300px; /* Adjust the width as needed */
            height: 150px; /* Adjust the height as needed */
            margin: auto;
        }

        #salesChart {
            width: 100% !important;
            height: 100% !important;
        }
    </style>
</head>
<body>
    <h1>Kuwago One Dashboard</h1>

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
<div>
    <div class="col-12">
        <div class="row">
            <div class="col-6">
                <div id="salesChartContainer">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
            <div class="col-6">
                <!-- Other content -->
            </div>
        </div>
    </div>
</div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var ctx = document.getElementById('salesChart').getContext('2d');

            // Values for the chart
            var targetSaleAmount = {{ $targetSale->amount }};
            var totalSales = {{ $totalSales }};

            var salesChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Sales'],
                    datasets: [
                        {
                            label: 'Total Sales',
                            data: [totalSales],
                            backgroundColor: '#FFA500' // Orange color for Total Sales
                        },
                        {
                            label: 'Target Sale',
                            data: [targetSaleAmount],
                            backgroundColor: '#FFFFFF', // White color for Target Sale
                            borderColor: '#000000',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    indexAxis: 'y', // Display the bar chart vertically
                    plugins: {
                        legend: {
                            display: true
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    var label = tooltipItem.dataset.label || '';
                                    return label + ': ' + tooltipItem.raw.toLocaleString();
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            stacked: true, // Enable stacking on X-axis
                            beginAtZero: true
                        },
                        y: {
                            stacked: true // Enable stacking on Y-axis
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
