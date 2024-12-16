<!-- DASHBOARD PANEL -->
<div class="d-flex rounded-4 exec-dashboard-panel">
    <div class="row d-flex flex-grow-1 m-0 column-gap-3 h-100 rounded-4 justify-content-center align-items-center text-white " style="padding-inline: 1.5%; padding-block: 1.5%;">

        <!-- LEFT COLUMN -->
        <div class="col-auto d-flex flex-column row-gap-2 p-0 h-100" style="width: 74%;">

            {{-- UPPER ROW --}}
            <div class="row d-flex flex-grow-1" style="height: 50%">
                <div class="col d-flex flex-column align-items-center">
                    {{-- OVERALL SALES --}}
                    <div class="row mb-1" style="height: 10%; font-size: 1.1rem; letter-spacing:1px;">
                        Overall Sales
                    </div>
                    <div class="row d-flex justify-content-center align-items-center fw-bold lh-1" style="height: 20%; font-size: 1.85rem; letter-spacing:1.5px; color: #7ed957;">
                    {{ number_format($totals['totalSales'],2) }}
                    </div>
                    <div class="row d-flex justify-content-center align-items-center" style="height: 10%; font-size: 0.9rem; letter-spacing:1px;">
                        Predicted: {{ round(array_sum(array_column($prediction_data, 'Total Sales Prediction'))) }}
                    </div>
                    <div class="row d-flex flex-grow-1 w-100 align-items-center justify-content-center" style="height: 100%">
                        <canvas id="SalesChart" class="p-0"></canvas>
                    </div>
                </div>

                {{-- OVERALL PROFIT --}}
                <div class="col d-flex flex-column align-items-center">
                    <div class="row" style="height: 10%; font-size: 1.1rem; letter-spacing:1px;">
                        Overall Profit
                    </div>
                    <div class="row d-flex justify-content-center align-items-center fw-bold" style="height: 20%; font-size: 1.85rem; letter-spacing:1.5px; color: #7ed957;">
                        {{ number_format($totals['totalProfit'],2) }}
                    </div>
                    <div class="row d-flex justify-content-center align-items-center" style="height: 10%; font-size: 0.9rem; letter-spacing:1px;">
                        Predicted: {{ round(array_sum(array_column($prediction_data, 'Total Profit Prediction'))) }}
                    </div>
                    <div class="row d-flex flex-grow-1 w-100 align-items-center justify-content-center" style="height: 100%">
                        <canvas id="ProfitChart" class="p-0"></canvas>
                    </div>
                </div>

                {{-- OVERALL EXPENSE --}}
                <div class="col d-flex flex-column align-items-center">
                    <div class="row" style="height: 10%; font-size: 1.1rem; letter-spacing:1px;">
                        Overall Expense
                    </div>
                    <div class="row d-flex justify-content-center align-items-center fw-bold" style="height: 20%; font-size: 1.85rem; letter-spacing:1.5px; color: #7ed957;">
                        {{ number_format($totals['totalExpenses'],2) }}
                    </div>
                    <div class="row d-flex justify-content-center align-items-center" style="height: 10%; font-size: 0.9rem; letter-spacing:1px;">
                        Predicted: {{ round(array_sum(array_column($prediction_data, 'Total Expenses Prediction'))) }}
                    </div>
                    <div class="row d-flex flex-grow-1 w-100 align-items-center justify-content-center" style="height: 100%">
                        <canvas id="ExpenseChart" class="p-0"></canvas>
                    </div>
                </div>
            </div>

            <hr class="border-1 m-1 opacity-100" style="width: 99%;">

            {{-- LOWER ROW --}}
            <div class="row d-flex flex-grow-1">

                {{-- ORDERS --}}
                <div class="col-auto d-flex flex-column px-2" style="width: 39%;">
                    <div class="col-12 d-flex">
                        <div class="col-7 d-flex justify-content-start fw-bold" style="font-size: 1.1rem; color: #6e82e1;">Kuwago Orders: {{ number_format($chartData['Kuwago1']['ordersCount']) }}</div>
                        <div class="col-auto d-flex justify-content-start fw-bold" style="font-size: 1.1rem;">Predicted: +600</div>
                    </div>
                    <div class="col-12 d-flex flex-grow-1 align-items-center justify-content-center">
                    <canvas id="TopDishesChart"></canvas>

                    </div>
                </div>

                {{-- <div class="vr p-0 text-white opacity-75 align-self-center" style="width: 1px; min-height: 100%;"></div> --}}

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
                            {{ round($jsonData1['current']['temperature_2m'])  }}&deg;
                        </span>
                    </div>

                    {{-- WIND --}}
                    <div class="row d-flex m-0 mt-3 w-100">
                        <div class="col-auto d-flex justify-content-center w-100">
                            <img src="{{ asset('assets/images/icons/wind-img-icon.png') }}" style="height: 20px;" alt="Wind Icon">
                            <span class="ms-1" style="font-size: 0.85rem; letter-spacing: 1px;">Northwest, {{ round($jsonData1['current']['wind_speed_10m'], 2) }} km/hr</span>
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
                    
                    {{-- AI FORECAST --}}
                    <ul class="text-start ps-1 h-100 mb-0 overflow-y-scroll weather-column" id="ai-forecast" style="font-size: 0.75rem; text-align: justify; text-justify: auto; display:block;">
                        {{-- FORECAST ITEMS --}}
                        <li class="ms-3 mb-2">
                            Sales Projected to increase by 5% tomorrow due to good weather condition
                        </li>
                        
                        <li class="ms-3 mb-2">
                            Sales Projected to increase by 5% tomorrow due to good weather condition
                        </li>

                        <li class="ms-3 mb-2">
                            Sales Projected to increase by 5% tomorrow due to good weather condition
                        </li>

                        <li class="ms-3 mb-2">
                            Sales Projected to increase by 5% tomorrow due to good weather condition
                        </li>

                        <li class="ms-3 mb-2">
                            Sales Projected to increase by 5% tomorrow due to good weather condition
                        </li>
                    </ul>

                    {{-- WEATHER FORECAST --}}
                    <div class="text-start p-0 h-100 mb-0 overflow-y-scroll weather-column" id="weather-forecast" style="font-size: 0.75rem; text-align: justify; text-justify: auto; display: none;">
                        {{-- FORECAST ITEMS --}}
                        <div class="col-12 pb-3 d-flex flex-row">
                            {{-- CLOUD ICON --}}
                            <div class="col-auto d-flex align-items-center justify-content-center" style="width:23%;">
                                {{ $simpleWeatherDescription[2] }}
                            </div>

                            {{-- DATE & WEATHER --}}
                            <div class="col-auto" style="width: 57.5%;">
                                <div class="col-12 d-flex flex-column justify-content-center align-items-start">
                                    <span class="fw-medium lh-1" style="font-size:0.7rem; letter-spacing:0.5px;">{{ $forecastDate[1] }}</span>
                                </div>

                                <div class="col-12 d-flex flex-column justify-content-center align-items-start">
                                    <span class="text-white opacity-75 fw-normal" style="font-size:0.7rem; ">{{ $weatherDescription[1] }}</span>
                                </div>
                            </div>
                            {{-- LINE --}}
                            <div class="vr text-white opacity-100" style="width: 1px; "></div>

                            {{-- TEMPERATURE --}}
                            <div class="col-auto d-flex align-items-center justify-content-center" style="width:18.5%;">
                                <span style="font-size: 1.05rem;">{{ round($jsonData2["daily"]["temperature_2m_max"][1]) }}&deg;</span>
                            </div>
                        </div>
                        <div class="col-12 pb-3 d-flex flex-row">
                            {{-- CLOUD ICON --}}
                            <div class="col-auto d-flex align-items-center justify-content-center" style="width:23%;">
                            {{ $simpleWeatherDescription[3] }}
                            </div>

                            {{-- DATE & WEATHER --}}
                            <div class="col-auto" style="width: 57.5%;">
                                <div class="col-12 d-flex flex-column justify-content-center align-items-start">
                                    <span class="fw-medium lh-1" style="font-size:0.7rem; letter-spacing:0.5px;">{{ $forecastDate[2] }}</span>
                                </div>

                                <div class="col-12 d-flex flex-column justify-content-center align-items-start">
                                    <span class="text-white opacity-75 fw-normal" style="font-size:0.7rem; ">{{ $weatherDescription[2] }}</span>
                                </div>
                            </div>
                            {{-- LINE --}}
                            <div class="vr text-white opacity-100" style="width: 1px; "></div>

                            {{-- TEMPERATURE --}}
                            <div class="col-auto d-flex align-items-center justify-content-center" style="width:18.5%;">
                                <span style="font-size: 1.05rem;">{{ round($jsonData2["daily"]["temperature_2m_max"][2]) }}&deg;</span>
                            </div>
                        </div>
                        <div class="col-12 pb-3 d-flex flex-row">
                            {{-- CLOUD ICON --}}
                            <div class="col-auto d-flex align-items-center justify-content-center" style="width:23%;">
                            {{ $simpleWeatherDescription[4] }}
                            </div>

                            {{-- DATE & WEATHER --}}
                            <div class="col-auto" style="width: 57.5%;">
                                <div class="col-12 d-flex flex-column justify-content-center align-items-start">
                                    <span class="fw-medium lh-1" style="font-size:0.7rem; letter-spacing:0.5px;">{{ $forecastDate[3] }}</span>
                                </div>

                                <div class="col-12 d-flex flex-column justify-content-center align-items-start">
                                    <span class="text-white opacity-75 fw-normal" style="font-size:0.7rem; ">{{ $weatherDescription[3] }}</span>
                                </div>
                            </div>
                            {{-- LINE --}}
                            <div class="vr text-white opacity-100" style="width: 1px; "></div>

                            {{-- TEMPERATURE --}}
                            <div class="col-auto d-flex align-items-center justify-content-center" style="width:18.5%;">
                                <span style="font-size: 1.05rem;">{{ round($jsonData2["daily"]["temperature_2m_max"][3]) }}&deg;</span>
                            </div>
                        </div>
                        <div class="col-12 pb-3 d-flex flex-row">
                            {{-- CLOUD ICON --}}
                            <div class="col-auto d-flex align-items-center justify-content-center" style="width:23%;">
                            {{ $simpleWeatherDescription[5] }}
                            </div>

                            {{-- DATE & WEATHER --}}
                            <div class="col-auto" style="width: 57.5%;">
                                <div class="col-12 d-flex flex-column justify-content-center align-items-start">
                                    <span class="fw-medium lh-1" style="font-size:0.7rem; letter-spacing:0.5px;">{{ $forecastDate[4] }}</span>
                                </div>

                                <div class="col-12 d-flex flex-column justify-content-center align-items-start">
                                    <span class="text-white opacity-75 fw-normal" style="font-size:0.7rem; ">{{ $weatherDescription[4] }}</span>
                                </div>
                            </div>
                            {{-- LINE --}}
                            <div class="vr text-white opacity-100" style="width: 1px; "></div>

                            {{-- TEMPERATURE --}}
                            <div class="col-auto d-flex align-items-center justify-content-center" style="width:18.5%;">
                                <span style="font-size: 1.05rem;">{{ round($jsonData2["daily"]["temperature_2m_max"][4]) }}&deg;</span>
                            </div>
                        </div>
                        <div class="col-12 pb-3 d-flex flex-row">
                            {{-- CLOUD ICON --}}
                            <div class="col-auto d-flex align-items-center justify-content-center" style="width:23%;">
                            {{ $simpleWeatherDescription[6] }}
                            </div>

                            {{-- DATE & WEATHER --}}
                            <div class="col-auto" style="width: 57.5%;">
                                <div class="col-12 d-flex flex-column justify-content-center align-items-start">
                                    <span class="fw-medium lh-1" style="font-size:0.7rem; letter-spacing:0.5px;">{{ $forecastDate[5] }}</span>
                                </div>

                                <div class="col-12 d-flex flex-column justify-content-center align-items-start">
                                    <span class="text-white opacity-75 fw-normal" style="font-size:0.7rem; ">{{ $weatherDescription[5] }}</span>
                                </div>
                            </div>
                            {{-- LINE --}}
                            <div class="vr text-white opacity-100" style="width: 1px; "></div>

                            {{-- TEMPERATURE --}}
                            <div class="col-auto d-flex align-items-center justify-content-center" style="width:18.5%;">
                                <span style="font-size: 1.05rem;">{{ round($jsonData2["daily"]["temperature_2m_max"][5]) }}&deg;</span>
                            </div>
                        </div>
                        <div class="col-12 pb-3 d-flex flex-row">
                            {{-- CLOUD ICON --}}
                            <div class="col-auto d-flex align-items-center justify-content-center" style="width:23%;">
                            {{ $simpleWeatherDescription[7] }}
                            </div>

                            {{-- DATE & WEATHER --}}
                            <div class="col-auto" style="width: 57.5%;">
                                <div class="col-12 d-flex flex-column justify-content-center align-items-start">
                                    <span class="fw-medium lh-1" style="font-size:0.7rem; letter-spacing:0.5px;">{{ $forecastDate[6] }}</span>
                                </div>

                                <div class="col-12 d-flex flex-column justify-content-center align-items-start">
                                    <span class="text-white opacity-75 fw-normal" style="font-size:0.7rem; ">{{ $weatherDescription[6] }}</span>
                                </div>
                            </div>
                            {{-- LINE --}}
                            <div class="vr text-white opacity-100" style="width: 1px; "></div>

                            {{-- TEMPERATURE --}}
                            <div class="col-auto d-flex align-items-center justify-content-center" style="width:18.5%;">
                                <span style="font-size: 1.05rem;">{{ round($jsonData2["daily"]["temperature_2m_max"][6]) }}&deg;</span>
                            </div>
                        </div>
                        <div class="col-12 pb-3 d-flex flex-row">
                            {{-- CLOUD ICON --}}
                            <div class="col-auto d-flex align-items-center justify-content-center" style="width:23%;">
                            {{ $simpleWeatherDescription[8] }}
                            </div>

                            {{-- DATE & WEATHER --}}
                            <div class="col-auto" style="width: 57.5%;">
                                <div class="col-12 d-flex flex-column justify-content-center align-items-start">
                                    <span class="fw-medium lh-1" style="font-size:0.7rem; letter-spacing:0.5px;">{{ $forecastDate[7] }}</span>
                                </div>

                                <div class="col-12 d-flex flex-column justify-content-center align-items-start">
                                    <span class="text-white opacity-75 fw-normal" style="font-size:0.7rem; ">{{ $weatherDescription[7] }}</span>
                                </div>
                            </div>
                            {{-- LINE --}}
                            <div class="vr text-white opacity-100" style="width: 1px; "></div>

                            {{-- TEMPERATURE --}}
                            <div class="col-auto d-flex align-items-center justify-content-center" style="width:18.5%;">
                                <span style="font-size: 1.05rem;">{{ round($jsonData2["daily"]["temperature_2m_max"][7]) }}&deg;</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            
            {{-- CHECK WEATHER --}}
            <div class="row d-flex w-100 px-1 pb-0 align-items-end justify-content-end" id="check-weather-btn" style="height: 10%">
                <a href="#" class="text-white text-end opacity-75" id="check-btn" style="font-size: 0.75rem; display:block;">Check Weather</a>
                <a href="#" class="text-white text-end opacity-75" id="back-btn" style="font-size: 0.75rem; display:none;">Back</a>
            </div>

        </div>
        <!-- END RIGHT COLUMN -->
    </div>
</div>

{{-- SCRIPT FOR FORECASTS DIVS --}}
<script>
    const aiForecastDiv = document.getElementById('ai-forecast');
    const weatherDiv = document.getElementById('weather-forecast');
    const checkButton = document.getElementById('check-btn');
    const backButton = document.getElementById('back-btn');

    checkButton.addEventListener('click', function() {

        aiForecastDiv.style.display = 'none';
        weatherDiv.style.display = 'block'
        checkButton.style.display = 'none';
        backButton.style.display = 'block';
   
    });

    backButton.addEventListener('click', function() {

        aiForecastDiv.style.display = 'block';
        weatherDiv.style.display = 'none'
        checkButton.style.display = 'block';
        backButton.style.display = 'none';

    });
</script>

{{-- SCRIPT FOR CHARTS --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // SALES CHART
        var salesCtx = document.getElementById('SalesChart').getContext('2d');
        var salesChart = new Chart(salesCtx, {
            type: 'bar',
            data: {
                labels: ['UdDesign', 'Kuwago 1', 'Kuwago 2'],
                datasets: [{
                    label: 'Actual',
                    data: [@json($chartData['Uddesign']['sales']), @json($chartData['Kuwago1']['sales']), @json($chartData['Kuwago2']['sales'])],
                    backgroundColor: ['rgba(105, 186, 70, 1)', 'rgba(105, 186, 70, 1)', 'rgba(105, 186, 70, 1)'], 
                    borderColor: ['rgba(105, 186, 70, 1)', 'rgba(105, 186, 70, 1)', 'rgba(105, 186, 70, 1)'],
                    borderWidth: 1,
                    borderRadius: 7
                }, {
                    label: 'Predicted',
                    // AI PREDICTION DATA HERE
                    data: [@json($chartData['Uddesign']['sales']), @json($chartData['Kuwago1']['sales']), @json($chartData['Kuwago2']['sales'])],
                    backgroundColor: ['rgba(255,255,255, 1)', 'rgba(255,255,255, 1)', 'rgba(255,255,255, 1)'], 
                    borderColor: ['rgba(255,255,255, 1)', 'rgba(255,255,255, 1)', 'rgba(255,255,255, 1)'],
                    borderWidth: 1,
                    borderRadius: 7
                }]
            },
            options: {
                // STYLING FOR X and Y AXIS LABELS
                layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 5,
                        bottom: 5
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'white'
                        },
                        grid: {
                            color: 'rgba(106, 103, 114, 1)',
                            lineWidth: 0.7
                        }
                    },

                    x: {
                        ticks: {
                            color: 'white'
                        },
                        grid: {
                            lineWidth: 0
                        }
                    }
                },
                // STYLING FOR TOP LEGEND
                plugins: {
                    legend: {
                        display: true,
                        position: 'top', 
                        align: 'center',
                        labels: {
                            color: 'white',
                            font: {
                                size: 11,
                                family: 'Poppins'
                            },
                            usePointStyle: true, 
                            pointStyle: 'rect'
                        }
                    }
                }
            }
        });

        // PROFIT CHART
        var profitCtx = document.getElementById('ProfitChart').getContext('2d');
        var profitChart = new Chart(profitCtx, {
            type: 'bar',
            data: {
                labels: ['UdDesign', 'Kuwago 1', 'Kuwago 2'],
                datasets: [{
                    label: 'Actual',
                    data: [@json($chartData['Uddesign']['profit']), @json($chartData['Kuwago1']['profit']), @json($chartData['Kuwago2']['profit'])],
                    backgroundColor: ['rgba(105, 186, 70, 1)', 'rgba(105, 186, 70, 1)', 'rgba(105, 186, 70, 1)'], 
                    borderColor: ['rgba(105, 186, 70, 1)', 'rgba(105, 186, 70, 1)', 'rgba(105, 186, 70, 1)'],
                    borderWidth: 1,
                    borderRadius: 7
                }, {
                    label: 'Predicted',
                    // AI PREDICTION DATA HERE
                    data: [@json($chartData['Uddesign']['profit']), @json($chartData['Kuwago1']['profit']), @json($chartData['Kuwago2']['profit'])],
                    backgroundColor: ['rgba(255,255,255, 1)', 'rgba(255,255,255, 1)', 'rgba(255,255,255, 1)'], 
                    borderColor: ['rgba(255,255,255, 1)', 'rgba(255,255,255, 1)', 'rgba(255,255,255, 1)'],
                    borderWidth: 1,
                    borderRadius: 7
                }]
            },
            options: {
                // STYLING FOR X and Y AXIS LABELS
                layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 5,
                        bottom: 5
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'white'
                        },
                        grid: {
                            color: 'rgba(106, 103, 114, 1)',
                            lineWidth: 0.7
                        }
                    },

                    x: {
                        ticks: {
                            color: 'white'
                        },
                        grid: {
                            lineWidth: 0
                        }
                    }
                },
                // STYLING FOR TOP LEGEND
                plugins: {
                    legend: {
                        display: true,
                        position: 'top', 
                        align: 'center',
                        labels: {
                            color: 'white',
                            font: {
                                size: 11,
                                family: 'Poppins'
                            },
                            usePointStyle: true, 
                            pointStyle: 'rect'
                        }
                    }
                }
            }
        });

        // EXPENSES CHART
        var expenseCtx = document.getElementById('ExpenseChart').getContext('2d');
        var expenseChart = new Chart(expenseCtx, {
            type: 'bar',
            data: {
                labels: ['UdDesign', 'Kuwago 1', 'Kuwago 2'],
                datasets: [{
                    label: 'Actual',
                    data: [@json($chartData['Uddesign']['expenses']), @json($chartData['Kuwago1']['expenses']), @json($chartData['Kuwago2']['expenses'])],
                    backgroundColor: ['rgba(105, 186, 70, 1)', 'rgba(105, 186, 70, 1)', 'rgba(105, 186, 70, 1)'], 
                    borderColor: ['rgba(105, 186, 70, 1)', 'rgba(105, 186, 70, 1)', 'rgba(105, 186, 70, 1)'],
                    borderWidth: 1,
                    borderRadius: 7
                }, {
                    label: 'Predicted',
                    // AI PREDICTION DATA HERE
                    data: [@json($chartData['Uddesign']['expenses']), @json($chartData['Kuwago1']['expenses']), @json($chartData['Kuwago2']['expenses'])],
                    backgroundColor: ['rgba(255,255,255, 1)', 'rgba(255,255,255, 1)', 'rgba(255,255,255, 1)'], 
                    borderColor: ['rgba(255,255,255, 1)', 'rgba(255,255,255, 1)', 'rgba(255,255,255, 1)'],
                    borderWidth: 1,
                    borderRadius: 7
                }]
            },
            options: {
                // STYLING FOR X and Y AXIS LABELS
                layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 5,
                        bottom: 5
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'white'
                        },
                        grid: {
                            color: 'rgba(106, 103, 114, 1)',
                            lineWidth: 0.7
                        }
                    },

                    x: {
                        ticks: {
                            color: 'white'
                        },
                        grid: {
                            lineWidth: 0
                        }
                    }
                },
                // STYLING FOR TOP LEGEND
                plugins: {
                    legend: {
                        display: true,
                        position: 'top', 
                        align: 'center',
                        labels: {
                            color: 'white',
                            font: {
                                size: 11,
                                family: 'Poppins'
                            },
                            usePointStyle: true, 
                            pointStyle: 'rect'
                            
                        }
                    }
                }
            }
        });
    });
</script>

{{-- ORDERS CHART --}}
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
                    label: 'Actual',    
                    data: dishData,
                    backgroundColor: 'rgba(59, 86, 209, 1)',
                    borderColor: 'rgba(59, 86, 209, 1)',
                    borderWidth: 1,
                }, {
                    label: 'Predicted',
                    // AI PREDICTION DATA HERE
                    data: dishData,
                    backgroundColor: 'rgba(255,255,255, 1)',
                    borderColor: 'rgba(255,255,255, 1)',
                    borderWidth: 1,
                }]
            },
            options: {
                // STYLING FOR X and Y AXIS LABELS
                indexAxis: 'y',
                layout: {
                    padding: {
                        left: 13,
                        right: 13,
                        top: 5,
                        bottom: 5
                    },
                },
                scales: {
                    y: {
                        stacked: true,
                        ticks: {
                            color: 'white',
                            font: {
                                size: 9,
                                family: 'Poppins',
                            },
                            callback: function(value, index) {
                            const maxLabelLength = 7;
                            const label = labels[index] || '';
                            return label.length > maxLabelLength ? label.substring(0, maxLabelLength) + '...' : label;
                        }
                        },
                        grid: {
                            lineWidth: 0
                        }
                    },
                    x: {
                        stacked: true,
                        beginAtZero: true,
                        ticks: {
                            color: 'white',
                            font: {
                                size: 10,
                            }
                        },
                        grid: {
                            color: 'rgba(106, 103, 114, 1)',
                            lineWidth: 0.7
                        },
                    }
                },
                // STYLING FOR TOP LEGEND
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            }
        });


    });
</script>