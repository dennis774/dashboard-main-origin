{{-- START --}}
<div class="container text-center content-container">
    <div class="row mb-5">
        {{-- START OF SIDE BAR --}}
        <div class="col-lg-1"></div>
        <div class="col-lg-1">
            <div class="container">
                <div class="row">
                    @include('general.uddesign.sidebar')
                </div>
            </div>
        </div>
        {{-- END OF SIDE BAR --}} {{-- START OF CONTENTS--}}
        <div class="col-lg-9 p-3 contents">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12 mb-2 card-box">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <i class="fa-solid fa-chart-line"></i>
                                            <p>Total Sales</p>
                                            <p>₱{{ $totalSales }}</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <div>Print/Photo: ₱{{$totalPrintSales}}</div>
                                            <div>UdD Merch: ₱{{$totalMerchSales}}</div>
                                            <div>Custom Deals: ₱{{$totalCustomSales}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2 card-box">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <i class="fa-solid fa-coins"></i>
                                            <p>Total Profit</p>
                                            <p>₱{{ $totalProfit }}</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <div>Print/Photo: ₱{{$totalPrintProfit}}</div>
                                            <div>UdD Merch: ₱{{$totalMerchProfit}}</div>
                                            <div>Custom Deals: ₱{{$totalCustomProfit}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2 card-box">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <i class="fa-solid fa-money-bill"></i>
                                            <p>Total Expenses</p>
                                            <p>₱{{ $totalExpenses }}</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <div>Print/Photo: ₱{{$totalPrintExpenses}}</div>
                                            <div>UdD Merch: ₱{{$totalMerchExpenses}}</div>
                                            <div>Custom Deals: ₱{{$totalCustomExpenses}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 card-box">
                                <p>Target Sales</p>
                                <p><i class="fa-solid fa-peso-sign"></i>5,000.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12 mb-2 card-boxChart">
                                <canvas id="PrintingChart" width="400" height="191"></canvas>
                            </div>
                            <div class="col-lg-12 card-boxChart">
                                <canvas id="MerchChart" width="400" height="191"></canvas>
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



