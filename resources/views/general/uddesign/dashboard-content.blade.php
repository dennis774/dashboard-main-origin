<!-- DASHBOARD PANEL -->
<div class="d-flex rounded-4 dashboard-panel">
    <div class="row d-flex flex-grow-1 m-0 column-gap-3 h-100 rounded-4 justify-content-center align-items-center text-white " style="padding-inline: 2%; padding-block: 2.5%;">
        <!-- LEFT COLUMN -->
        <div class="col-auto p-0 h-100" style="width: 43%;">
            <!-- SALES -->
            <div class="row d-flex flex-grow-1 w-100 m-0 mb-2 align-items-center" style="height: 24%;;">
                <div class="col p-0" style="height: 100%;">
                    <div class="card rounded-4 flex-row h-100 w-100 dashboard-card">
                        <!-- DB LEFT SIDE -->
                        <div class="col d-flex flex-column align-items-center h-100" style="width: 50%;">
                            <div class="row mt-3 justify-content-start w-100">
                                <div class="col-12 align-items-center justify-content-center">
                                    <div class="card-title d-flex mb-0 align-items-center">
                                        <img src="{{ asset('assets/images/icons/total-expenses-icon.png') }}" style="height: 27px;" alt="Total Expenses Icon">
                                        <h5 class="card-title mb-0 ms-2 db-card-title">Total Sales</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- DB CARD CONTENT -->
                            <div class="row d-flex flex-grow-1 w-100 px-2 pb-3 align-items-center">
                                <div class="col align-self-middle text-start dashboard-total-text" style="width: 50%;">
                                    <span>{{number_format($totalSales,2)}}</span>
                                </div>
                            </div>
                        </div>
                        <!-- LINE -->
                        <div class="vr p-0 text-white opacity-75 align-self-center" style="width: 1.6px; min-height: 65%;"></div>
                        <!-- DB RIGHT SIDE -->
                        <div class="col d-flex flex-column py-3 ms-3 h-100 uddesign-side-text" style="width: 50%;">
                            <div class="col-12 d-flex flex-row align-items-center" style="height: 33%;">
                                <span class="me-1">Print/Photo:</span> {{number_format($totalPrintSales,2)}}
                            </div>
                            <div class="col-12 d-flex align-items-center" style="height: 33%;">
                                <span class="me-1">UdD Merch:</span> {{number_format($totalMerchSales,2)}}
                            </div>
                            <div class="col-12 d-flex align-items-center" style="height: 33%;">
                                <span class="me-1">Custom Deals:</span> {{number_format($totalCustomSales,2)}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- PROFIT -->
            <div class="row d-flex flex-grow-1 w-100 m-0 mb-2 align-items-center" style="height: 24%;">
                <div class="col p-0" style="height: 100%;">
                    <div class="card rounded-4 flex-row h-100 w-100 dashboard-card">
                        <!-- DB LEFT SIDE -->
                        <div class="col d-flex flex-column align-items-center h-100" style="width: 50%;">
                            <div class="row mt-3 justify-content-start w-100">
                                <div class="col-12 align-items-center justify-content-center">
                                    <div class="card-title d-flex mb-0 align-items-center">
                                        <img src="{{ asset('assets/images/icons/total-expenses-icon.png') }}" style="height: 27px;" alt="Total Expenses Icon">
                                        <h5 class="card-title mb-0 ms-2 db-card-title">Total Profit</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- DB CARD CONTENT -->
                            <div class="row d-flex flex-grow-1 w-100 px-2 pb-3 align-items-center">
                                <div class="col align-self-middle text-start dashboard-total-text" style="width: 50%;">
                                    <span>{{number_format($totalProfit,2)}}</span>
                                </div>
                            </div>
                        </div>
                        <!-- LINE -->
                        <div class="vr p-0 text-white opacity-75 align-self-center" style="width: 1.6px; min-height: 65%;"></div>
                        <!-- DB RIGHT SIDE -->
                        <div class="col d-flex flex-column py-3 ms-3 h-100 uddesign-side-text" style="width: 50%;">
                            <div class="col-12 d-flex flex-row align-items-center" style="height: 33%;">
                                <span class="me-1">Print/Photo:</span> {{number_format($totalPrintProfit,2)}}
                            </div>
                            <div class="col-12 d-flex align-items-center" style="height: 33%;">
                                <span class="me-1">UdD Merch:</span> {{number_format($totalMerchProfit,2)}}
                            </div>
                            <div class="col-12 d-flex align-items-center" style="height: 33%;">
                                <span class="me-1">Custom Deals:</span> {{number_format($totalCustomProfit,2)}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- EXPENSES -->
            <div class="row d-flex flex-grow-1 w-100 m-0 mb-2 align-items-center" style="height: 24%;">
                <div class="col p-0" style="height: 100%;">
                    <div class="card rounded-4 flex-row h-100 w-100 dashboard-card">
                        <!-- DB LEFT SIDE -->
                        <div class="col d-flex flex-column align-items-center h-100" style="width: 50%;">
                            <div class="row mt-3 justify-content-start w-100">
                                <div class="col-12 align-items-center justify-content-center">
                                    <div class="card-title d-flex mb-0 align-items-center">
                                        <img src="{{ asset('assets/images/icons/total-expenses-icon.png') }}" style="height: 27px;" alt="Total Expenses Icon">
                                        <h5 class="card-title mb-0 ms-2 db-card-title">Total Expenses</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- DB CARD CONTENT -->
                            <div class="row d-flex flex-grow-1 w-100 px-2 pb-3 align-items-center">
                                <div class="col align-self-middle text-start dashboard-total-text" style="width: 50%;">
                                    <span>{{number_format($totalExpenses,2)}}</span>
                                </div>
                            </div>
                        </div>
                        <!-- LINE -->
                        <div class="vr p-0 text-white opacity-75 align-self-center" style="width: 1.6px; min-height: 65%;"></div>
                        <!-- DB RIGHT SIDE -->
                        <div class="col d-flex flex-column py-3 ms-3 h-100 uddesign-side-text" style="width: 50%;">
                            <div class="col-12 d-flex flex-row align-items-center" style="height: 33%;">
                                <span class="me-1">Print/Photo:</span> {{number_format($totalPrintExpenses,2)}}
                            </div>
                            <div class="col-12 d-flex align-items-center" style="height: 33%;">
                                <span class="me-1">UdD Merch:</span> {{number_format($totalMerchExpenses,2)}}
                            </div>
                            <div class="col-12 d-flex align-items-center" style="height: 33%;">
                                <span class="me-1">Custom Deals:</span> {{number_format($totalCustomExpenses,2)}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- TARGET SALES -->
            <div class="row d-flex flex-grow-1 w-100 m-0 align-items-center" style="height: 24%;">
                <div class="col p-0" style="height: 100%;">
                    <div class="d-flex flex-column rounded-4 h-100 w-100 dashboard-card">
                        <!-- DB CARD TITLE -->
                        <div class="row justify-content-start h-100 w-100">
                            <div class="col-7 align-items-center justify-content-center">
                                <div class="col-12 d-flex mb-0 mt-3 align-items-center">
                                    {{-- CARD TITLE --}}
                                    <h5 class="mb-0 ms-2 db-card-title">Target Sales</h5>
                                </div>
                                <div class="col-12 d-flex h-100 w-100 px-3 column-gap-2 align-items-center" style="max-height: 70%;">
                                    <div class="col-7 align-self-middle text-start lh-1 dashboard-total-text">
                                    
                                    @if ($financialTargetSales)
                                        {{$financialTargetSales->amount}}<br>
                                        <span style="font-size: 0.65rem; font-weight: normal;">{{ $financialTargetSales->start_date }} - {{ $financialTargetSales->end_date }}</span>
                                    @else
                                        <p>No target sale found for display.</p>
                                        <span style="font-size: 8px;">No target sale found for display.</span>
                                    @endif
                                    
                                    </div>
                                    
                                </div>
                            </div>
                            {{-- TARGET SALES CHART --}}
                            <div class="col-5 d-flex justify-content-center align-items-center h-100" style="max-width: 80%;">
                                <canvas id="gaugeChart"></canvas>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- END TARGET SALES -->
        </div>
        <!-- END LEFT COLUMN -->

        <!-- RIGHT COLUMN -->
        <div class="col p-0 h-100">

            <!-- UDDESIGN PRINT SALES TITLE -->
            <div class="row m-0 align-items-center">
                <div class="col-12 d-flex h-100 p-0 justify-content-start">
                    <P class="text-align-left mb-2 ms-2 uddesign-right-title">Printing/Photocopy Sales, Profit, and Expenses</P>
                </div>
            </div>

            <!-- SALES PROFIT EXPENSES CARD-->
            <div class="row d-flex flex-grow-1 w-100 m-0 mb-3 column-gap-3 align-items-center" style="height: 41%;">
                <div class="col h-100 p-0">
                    <div class="card rounded-4 h-100 w-100 dashboard-card">
                        <!-- DB CARD CONTENT -->
                        <div class="row d-flex w-100 h-100 align-items-center">
                            <div class="col-12 h-100 align-self-middle">
                                <canvas id="PrintingChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- UDDESIGN MERCH SALES TITLE -->
            <div class="row m-0 align-items-center">
                <div class="col-12 d-flex h-100 p-0 justify-content-start">
                    <P class="text-align-left mb-2 ms-2 uddesign-right-title">UdD Merch Sales, Profit, and Expenses</P>
                </div>
            </div>

            <!-- UDDSEIGN MERCH SALES CARD -->
            <div class="row d-flex flex-grow-1 w-100 m-0 mb-3 column-gap-3 align-items-center" style="height: 42%;">
                <div class="col h-100 p-0">
                    <div class="card rounded-4 h-100 w-100 dashboard-card">
                        <div class="row h-100 w-100 justify-content-center align-items-center text-white">
                            <canvas id="MerchChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END RIGHT COLUMN -->
    </div>
</div>



{{-- SCRIPT FOR HALF DONUT CHART --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var ctx = document.getElementById('gaugeChart').getContext('2d');

        // Values for the chart
        var financialTargetAmount = {{ $targetSale->amount ?? 0 }};
        var financialTotalSales = {{ $financialTotalSales ?? 0 }};

        // Additional client-side null/NaN check
        if (isNaN(financialTargetAmount) || financialTargetAmount === null) {
            financialTargetAmount = 0;
        }
        if (isNaN(financialTotalSales) || financialTotalSales === null) {
            financialTotalSales = 0;
        }

        // Prevent division by zero and calculate percentage
        var percentage = financialTotalSales !== 0 ? (financialTargetAmount / financialTotalSales) * 100 : 0;

        console.log(financialTotalSales);
        console.log(financialTargetAmount);
        console.log(percentage);

        var gaugeChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    label: 'Actual Sales',
                    data: [percentage, 100 - percentage],
                    backgroundColor: ['#FFA500', '#FFFFFF'],
                    borderWidth: 0
                }]
            },
            options: {
                aspectRatio: 1.5,
                circumference: 180,
                rotation: 270,
                cutout: '60%',
                layout: {
                    padding: {
                        left: 10,
                        right: 10
                    },
                },
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        filter: (tooltipItem) => {
                            return tooltipItem.dataIndex === 0;
                        }
                    },
                    datalabels: {
                        display: true,
                        formatter: function(value, context) {
                            return context.chart.data.datasets[0].data[0] + '%';
                        },
                        color: '#000',
                        font: {
                            weight: 'bold',
                            size: 24
                        }
                    }
                }
            },
            // CENTER TEXT
            plugins: [{
                id: 'centerText',
                beforeDraw: (chart) => {
                    const { width } = chart;
                    const { height } = chart;
                    const ctx = chart.ctx;

                    ctx.restore();
                    const fontSize = (height / 100).toFixed(2);
                    ctx.font = `${fontSize}em Poppins`;
                    ctx.textBaseline = 'end';

                    const text = `${percentage}%`;
                    const textX = Math.round((width - ctx.measureText(text).width) / 2);
                    const textY = height/ 1.2;

                    ctx.fillStyle = '#FFF';
                    ctx.fillText(text, textX, textY);
                    ctx.save();
                }
            }]
        });
    });
</script>



<script>
    // LEFT COMPARE VARIABLES
    const buttonLeft = document.querySelector('#left-filter-btn');
    const arrowLeft = document.querySelector('#left-dropdown-arrow');
    const selectLeft = document.querySelector('#left-dropdown-menu');
    const optionsLeft = document.querySelectorAll('.left-date-option');
    const selectLabelLeft = document.querySelector('#left-btn-label');
    const compareSectionsLeft = document.querySelectorAll('.left-filter-content');



    // LEFT FUNCTIONS
    buttonLeft.addEventListener('click', function(e) {
        e.preventDefault();
        arrowLeft.classList.toggle('active');
        toggleDropdownLeft();

    })


    function toggleDropdownLeft() {
        selectLeft.classList.toggle('hidden');
    }

    optionsLeft.forEach(function(option) {
        option.addEventListener('click', function(e) {
            setSelectedTitleLeft(e);

            compareSectionsLeft.forEach((section) => {
                section.style.display = "none";
            });

            const sectionToShow = document.getElementById(this.value);
            if (sectionToShow) {
                sectionToShow.style.display = "block";

                arrowLeft.classList.toggle('active');
            }

        })
    })

    function setSelectedTitleLeft(e) {
        const labelElement = document.querySelector(`label[for="${e.target.id}"]`).innerText;
        selectLabelLeft.innerText = labelElement;
        toggleDropdownLeft();
    }
</script>

<script>
    // RIGHT COMPARE VARIABLES
    const buttonRight = document.querySelector('#right-filter-btn');
    const arrowRight = document.querySelector('#right-dropdown-arrow');
    const selectRight = document.querySelector('#right-dropdown-menu');
    const optionsRight = document.querySelectorAll('.right-date-option');
    const selectLabelRight = document.querySelector('#right-btn-label');
    const compareSectionsRight = document.querySelectorAll('.right-filter-content');

    // RIGHT FUNCTIONS
    buttonRight.addEventListener('click', function(e) {
        e.preventDefault();
        arrowRight.classList.toggle('active');
        toggleDropdownRight();

    })

    function toggleDropdownRight() {
        selectRight.classList.toggle('hidden');
    }

    optionsRight.forEach(function(option) {
        option.addEventListener('click', function(e) {
            setSelectedTitleRight(e);

            compareSectionsRight.forEach((section) => {
                section.style.display = "none";
            });

            const sectionToShow = document.getElementById(this.value);
            console.log(this.value);
            if (sectionToShow) {
                sectionToShow.style.display = "block";
                arrowRight.classList.toggle('active');
            }

        })
    })

    function setSelectedTitleRight(e) {
        const labelElement = document.querySelector(`label[for="${e.target.id}"]`).innerText;
        selectLabelRight.innerText = labelElement;
        toggleDropdownRight();
    }
</script>

