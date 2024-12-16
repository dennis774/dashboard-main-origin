<!-- DASHBOARD PANEL -->
<div class="d-flex rounded-4 exec-dashboard-panel">
    <div class="row d-flex flex-grow-1 m-0 column-gap-3 h-100 rounded-4 justify-content-center align-items-center text-white " style="padding-inline: 1.5%; padding-block: 1.5%;">

        <!-- LEFT COLUMN -->
        <div class="col-auto d-flex flex-column row-gap-2 p-0 h-100" style="width: 74%;">

            {{-- UPPER ROW --}}
            <div class="row d-flex flex-grow-1" style="height: 45%">
                <div class="col d-flex flex-column align-items-center">
                    {{-- OVERALL SALES --}}
                    <div class="row mb-1" style="height: 10%; font-size: 1.1rem; letter-spacing:1px;">
                        Overall Sales
                    </div>
                    <div class="row d-flex justify-content-center align-items-center fw-bold lh-1" style="height: 20%; font-size: 1.85rem; letter-spacing:1.5px; color: #7ed957;">
                    {{ $totals['totalSales'] }}
                    </div>
                    <div class="row d-flex justify-content-center align-items-center" style="height: 10%; font-size: 0.9rem; letter-spacing:1px;">
                        Predicted: +300,000
                    </div>
                    <div class="row d-flex flex-grow-1 w-100 align-items-center justify-content-center" style="height: 100%">
                        <canvas id="SalesChart"></canvas>
                    </div>
                </div>

                {{-- OVERALL PROFIT --}}
                <div class="col d-flex flex-column align-items-center">
                    <div class="row" style="height: 10%; font-size: 1.1rem; letter-spacing:1px;">
                        Overall Profit
                    </div>
                    <div class="row d-flex justify-content-center align-items-center fw-bold" style="height: 20%; font-size: 1.85rem; letter-spacing:1.5px; color: #7ed957;">
                    {{ $totals['totalProfit'] }}
                    </div>
                    <div class="row d-flex justify-content-center align-items-center" style="height: 10%; font-size: 0.9rem; letter-spacing:1px;">
                        Predicted: +300,000
                    </div>
                    <div class="row d-flex flex-grow-1 w-100 align-items-center justify-content-center" style="height: 100%">
                        <canvas id="ProfitChart"></canvas>
                    </div>
                </div>

                {{-- OVERALL EXPENSE --}}
                <div class="col d-flex flex-column align-items-center">
                    <div class="row" style="height: 10%; font-size: 1.1rem; letter-spacing:1px;">
                        Overall Expense
                    </div>
                    <div class="row d-flex justify-content-center align-items-center fw-bold" style="height: 20%; font-size: 1.85rem; letter-spacing:1.5px; color: #7ed957;">
                    {{ $totals['totalExpenses'] }}
                    </div>
                    <div class="row d-flex justify-content-center align-items-center" style="height: 10%; font-size: 0.9rem; letter-spacing:1px;">
                        Predicted: +300,000
                    </div>
                    <div class="row d-flex flex-grow-1 w-100 align-items-center justify-content-center" style="height: 100%">
                        <canvas id="ExpenseChart"></canvas>
                    </div>
                </div>
            </div>

            <hr class="border-1 m-1 opacity-100" style="width: 99%;">

            {{-- LOWER ROW --}}
            <div class="row d-flex flex-grow-1">

                {{-- ORDERS --}}
                <div class="col-auto d-flex flex-column px-4" style="width: 39%;">
                    <div class="col-12 d-flex">
                        <div class="col-7 d-flex justify-content-start fw-bold" style="font-size: 1.1rem; color: #6e82e1;">Kuwago Orders: 400</div>
                        <div class="col-auto d-flex justify-content-start fw-bold" style="font-size: 1.1rem;">Predicted: +600</div>
                    </div>
                    <div class="col-12 d-flex flex-grow-1 align-items-center justify-content-center">
                    <canvas id="TopDishesChart"></canvas>

                    </div>
                </div>

                <div class="vr p-0 text-white opacity-75 align-self-center" style="width: 1px; min-height: 100%;"></div>

                {{-- UDDESIGN CUSTOM DEALS --}}
                <div class="col d-flex flex-column">
                    {{-- TITLE --}}
                    <div class="row d-flex w-100 fw-bold justify-content-center align-items-start" style="font-size: 1.65rem; letter-spacing: 1.5px;">
                        UdDesign Custom Deals
                    </div>

                    {{-- TOTALS --}}
                    <div class="col-12 d-flex flex-grow-1 py-2 px-0">
                        <div class="col-12 d-flex flex-grow-1 mb-2 mt-1 rounded-4 align-items-center justify-content-center dashboard-card" style="font-size: 1rem; letter-spacing:1px;">
                            {{-- OPEN --}}
                            @foreach ($dealData as $deal)
                            <div class="col d-flex flex-column align-items-center justify-content-center h-100">
                                <div class="col-auto d-flex align-items-center justify-content-center" style="height: 27%;">
                                {{ ucfirst($deal->status) }}
                                </div>
                                <div class="col-12 d-flex align-items-center justify-content-center fw-bold" style="font-size: 3.3rem; letter-spacing:0.5px; color: #df9f14;">
                                {{ $deal->count }}
                                </div>
                            </div>
                            @endforeach
                            <div class="vr position-absolute opacity-50" style="left:20%; top:47%; width: 1.5px; height: 35%;"></div>
                            <div class="vr position-absolute opacity-50" style="left:40%; top:47%; width: 1.5px; height: 35%;"></div>
                            <div class="vr position-absolute opacity-50" style="left:60%; top:47%; width: 1.5px; height: 35%;"></div>
                            <div class="vr position-absolute opacity-50" style="left:80%; top:47%; width: 2px; height: 35%;"></div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- END LEFT COLUMN -->

        <!-- LINE -->
        <div class="vr p-0 text-white opacity-75 align-self-center" style="width: 1px; min-height: 100%;"></div>

        <!-- RIGHT COLUMN -->
        <div class="col d-flex flex-column align-items-center p-0 h-100">

            <!-- WEATHER CARD-->
            <div class="row d-flex w-100 px-1 pb-3 align-items-center" style="height: 60%">
                <div class="rounded-4 bg-primary w-100 h-100 weather-card">
                    {{-- DATE AND TIME --}}
                    <div class="row d-flex mt-3 mb-3">
                        <div class="col d-flex p-0 ps-3 align-items-center justify-content-start">
                            <span style="font-size: 0.8rem; letter-spacing: 1px;">{{ $date }}</span>
                        </div>
                        <div class="col-4 d-flex p-0 ps-2">
                            <span style="font-size: 0.8rem; letter-spacing: 1px;">{{ $time }}</span>
                        </div>
                    </div>

                    {{-- TEMPERATURE --}}
                    <div class="row d-flex justify-content-center">
                        <span class="text-center ps-5" style="font-size: 6.5rem;">
                            {{ round($jsonData["current"]["temperature_2m"]) }}&deg;
                        </span>
                    </div>

                    {{-- WIND --}}
                    <div class="row d-flex m-0 mt-3 w-100">
                        <div class="col-auto d-flex justify-content-center w-100">
                            <img src="{{ asset('assets/images/icons/wind-img-icon.png') }}" style="height: 20px;" alt="Wind Icon">
                            <span class="ms-1" style="font-size: 0.85rem; letter-spacing: 1px;">Northwest, {{ round($jsonData["current"]["wind_speed_10m"], 2) }} km/hr</span>
                        </div>
                    </div>
                    
                </div>
            </div>

            {{-- NEXT DAY FORECAST --}}
            <div class="row d-flex w-100 px-1 pb-3 align-items-center" style="height: 30%">
                {{-- TITLE --}}
                <div class="row d-flex w-100 mb-2 pe-0 justify-content-start align-items-center">
                    <span class="text-start ps-1">The Next Day Forecast</span>
                </div>

                {{-- CONTENT --}}

                <div class="row d-flex w-100 h-100 pe-0 justify-content-center align-items-start">
                    {{-- <span class="d-flex align-items-center justify-content-center h-100 fst-italic fw-light text-white opacity-50">No forecasts found.</span> --}}
                    <div class="text-start p-0 h-100 mb-0 overflow-y-scroll weather-column" style="font-size: 0.75rem; text-align: justify; text-justify: auto;">
                        {{-- FORECAST ITEMS --}}
                        
                </div>
            </div>
            

            
            {{-- CHECK WEATHER --}}
            <div class="row d-flex w-100 px-1 pb-0 align-items-end justify-content-end" style="height: 10%">
                <a href="{{ route('general.executive.dashboard') }}" class="text-white text-end opacity-75" style="font-size: 0.75rem;">Back</a>
            </div>

        </div>
        <!-- END RIGHT COLUMN -->
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Sales Chart
        var salesCtx = document.getElementById('SalesChart').getContext('2d');
        var salesChart = new Chart(salesCtx, {
            type: 'bar',
            data: {
                labels: ['Uddesign', 'Kuwago1', 'Kuwago2'],
                datasets: [{
                    label: 'Sales',
                    data: [@json($chartData['Uddesign']['sales']), @json($chartData['Kuwago1']['sales']), @json($chartData['Kuwago2']['sales'])],
                    backgroundColor: ['rgba(0, 128, 0, 0.5)', 'rgba(0, 128, 0, 0.5)', 'rgba(0, 128, 0, 0.5)'], // Use rgba for transparency
                    borderColor: ['rgba(0, 128, 0, 1)', 'rgba(0, 128, 0, 1)', 'rgba(0, 128, 0, 1)'],
                    borderWidth: 1
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

        // Profit Chart
        var profitCtx = document.getElementById('ProfitChart').getContext('2d');
        var profitChart = new Chart(profitCtx, {
            type: 'bar',
            data: {
                labels: ['Uddesign', 'Kuwago1', 'Kuwago2'],
                datasets: [{
                    label: 'Profit',
                    data: [@json($chartData['Uddesign']['profit']), @json($chartData['Kuwago1']['profit']), @json($chartData['Kuwago2']['profit'])],
                    backgroundColor: ['rgba(255, 255, 0, 0.5)', 'rgba(255, 255, 0, 0.5)', 'rgba(255, 255, 0, 0.5)'],
                    borderColor: ['rgba(255, 255, 0, 1)', 'rgba(255, 255, 0, 1)', 'rgba(255, 255, 0, 1)'],
                    borderWidth: 1
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

        // Expense Chart
        var expenseCtx = document.getElementById('ExpenseChart').getContext('2d');
        var expenseChart = new Chart(expenseCtx, {
            type: 'bar',
            data: {
                labels: ['Uddesign', 'Kuwago1', 'Kuwago2'],
                datasets: [{
                    label: 'Expenses',
                    data: [@json($chartData['Uddesign']['expenses']), @json($chartData['Kuwago1']['expenses']), @json($chartData['Kuwago2']['expenses'])],
                    backgroundColor: ['rgba(255, 255, 255, 0.5)', 'rgba(255, 255, 255, 0.5)', 'rgba(255, 255, 255, 0.5)'],
                    borderColor: ['rgba(255, 255, 255, 1)', 'rgba(255, 255, 255, 1)', 'rgba(255, 255, 255, 1)'],
                    borderWidth: 1
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







<script>
    document.addEventListener("DOMContentLoaded", function () {
        var ctx = document.getElementById('TopDishesChart').getContext('2d');

        // Full data from the server
        var dishData1 = @json($chartData['Kuwago1']['topDishes1']);
        var dishData2 = @json($chartData['Kuwago2']['topDishes2']);

        // Combine data from both sources
        var combinedData = dishData1.concat(dishData2);

        // Sum total_pcs for dishes with the same name
        var dishMap = combinedData.reduce(function (acc, dish) {
            if (acc[dish.dish]) {
                acc[dish.dish] += dish.total_pcs;
            } else {
                acc[dish.dish] = dish.total_pcs;
            }
            return acc;
        }, {});

        // Convert dishMap to an array of objects and sort by total_pcs
        var sortedDishes = Object.keys(dishMap).map(function (key) {
            return { dish: key, total_pcs: dishMap[key] };
        }).sort(function (a, b) {
            return b.total_pcs - a.total_pcs;
        }).slice(0, 5); // Take top 5

        // Prepare labels and data for the chart
        var labels = sortedDishes.map(function (item) {
            return item.dish;
        });
        var dishData = sortedDishes.map(function (item) {
            return item.total_pcs;
        });

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Top 5 Dishes',
                    data: dishData,
                    backgroundColor: 'rgba(0, 128, 0, 0.5)', // Use rgba for transparency
                    borderColor: 'rgba(0, 128, 0, 1)',
                    borderWidth: 1
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