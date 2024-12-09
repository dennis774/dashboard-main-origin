{{-- START --}}
<div class="container text-center content-container">
    <div class="row mb-5">
        {{-- START OF SIDE BAR --}}
        <div class="col-lg-1"></div>
        <div class="col-lg-1">
            <div class="container">
                <div class="row">
                    @include('general.kuwago-one.sidebar')
                </div>
            </div>
        </div>
        {{-- END OF SIDE BAR --}} {{-- START OF CONTENTS--}}
        <div class="col-lg-9 p-3 kuwago1Main">
            <div class="row">
                <div class="col-lg-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 totalExpense">
                                <div class="col-lg-12 d-flex align-items-center mt-2">
                                   <h6>Total Expenses Here with Budget Allocation</h6>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <h6 class="d-flex justify-content-start" style="color: #fff;">Recently Purchased</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 recentPur">
                                List of Products Here
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 chartsKuwago1" style="height: 265px; position: relative;">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="container expensesbyCat">
                                <div class="col-lg-12 ">Category Chart here</div>
                            </div>
                        </div>
                    </div>      
                </div>
            </div>
        </div>
        <div class="col-lg-1"></div>
    </div>
    {{-- END OF CONTENTS--}}
</div>
{{-- END--}}


<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($chartdata->pluck('date')),
            datasets: [{
                label: 'Expenses',
                data: @json($chartdata->pluck('expenses')),
                borderColor: 'green',
                borderWidth: 5,
                fill: 'origin'
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: 'white' // Set Y-axis text color to white
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.2)' // Set color for horizontal grid lines
                    }
                },
                x: {
                    ticks: {
                        color: 'white' // Set X-axis text color to white
                    },
                    grid: {
                        display: false // Disable vertical grid lines
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
