<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Executive Page 1</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- <link href="{{ url('assets/css/style.css') }}" rel="stylesheet" /> --}}
    <script src="{{ url('assets/js/chart.js') }}"></script>
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{ url('fontawesome/css/all.min.css') }}" />
</head>

<style>
    body {
        background-image: url("https://t4.ftcdn.net/jpg/07/94/30/45/360_F_794304521_O4o0Y5UrvKtDxBNHY9utMowV2VhuhRpk.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        min-height: 100vh;
    }

    div.executive-card {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(25px);
        border-radius: 15px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    }

    div.chartHere {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 15px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    }

    div.weather {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 15px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    }

    div.customDeals {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 15px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    }

    div.prediction {
        border-right: 2px solid #fff;
    }

    div.upper {
        border-bottom: 2px solid #fff;
        margin: 0px auto 0;  
    }

    div.sections{
        border-right: 2px solid #fff;
    }
    
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10 mt-5 executive-card pt-3 pb-3 px-1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 prediction">
                            <div class="row">
                                <div class="col-lg-4 overallSales"
                                    style="text-align: center; line-height: 0.8; color:white;">
                                    <p>Overall Sales</p>
                                    <p style="color:#ACE1AF; font-size:20px; font-weight:bold;">300,000</p>
                                    <p>Predicted: 400,000</p>
                                    <div class="container chartHere" style="height:200px;">Chart Here
                                    </div>

                                </div>
                                <div class="col-lg-4 overallProfit"
                                    style="text-align: center; line-height: 0.8; color:white;">
                                    <p>Overall Sales</p>
                                    <p style="color:#ACE1AF; font-size:20px; font-weight:bold;">300,000</p>
                                    <p>Predicted: 400,000</p>
                                    <div class="container chartHere" style="height:200px;">Chart Here
                                    </div>

                                </div>
                                <div class="col-lg-4 overallExpenses"
                                    style="text-align: center; line-height: 0.8; color:white;">
                                    <p>Overall Sales</p>
                                    <p style="color:#ACE1AF; font-size:20px; font-weight:bold;">300,000</p>
                                    <p>Predicted: 400,000</p>
                                    <div class="container chartHere" style="height:200px;">Chart Here
                                    </div>

                                </div>
                            </div>

                            <div class="row upper">
                                <div class="col-lg-12 mt-2">
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-lg-5" style="color: white;">
                                    <div class="row">
                                        <div class="col-lg-7" style="color: #424874; font-weight:bold;">
                                            <p>Kuwago Orders: 400</p>
                                        </div>
                                        <div class="col-lg-5">
                                            <p>Predicted: 600</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="chartHere" style="height:200px;">Chart Here</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-7" style="color: white;">

                                    <div class="col-lg-12">
                                        <p style="font-size:25px; font-weight:bold; text-align:center;">Custom Deals</p>
                                    </div>

                                    <div class="customDeals pt-2 px-2" style="height: 185px;">
                                        <div class="row justify-content-between text-center">
                                            <div class="col-lg-2" style="font-size: 15px;">
                                                <div class="d-flex align-items-center justify-content-center">Open</div>
                                                <div class="d-flex align-items-center justify-content-center">09</div>
                                            </div>
                                    
                                            <div class="col-lg-2 d-flex align-items-center justify-content-center" style="font-size: 15px;">
                                                <div>Processing</div>
                                                
                                            </div>
                                    
                                            <div class="col-lg-2 d-flex align-items-center justify-content-center" style="font-size: 15px;">
                                                <div>Closed</div>
                                            </div>
                                    
                                            <div class="col-lg-2 d-flex align-items-center justify-content-center" style="font-size: 15px;">
                                                <div>On-Hold</div>
                                            </div>
                                    
                                            <div class="col-lg-2 d-flex align-items-center justify-content-center" style="font-size: 15px;">
                                                <div>Cancel</div>
                                            </div>
                                        </div>
                                      
                                    </div>
                                    

                                </div>
                            </div>
                        </div>
                     
                        <div class="col-lg-3 forecast text-white text">
                            <div class="col-lg-12 weather" style="height:280px;">Weather Here</div>
                            <div class="col-lg-12 mt-1 text-white text">
                                <h5>The next Day Forecast</h5>
                                <ul>
                                    <li>Random Text</li>
                                    <li>Random Text</li>
                                    <li>Random Text</li>
                                    <li>Random Text</li>
                                    <li>Random Text</li>
                                    <li>Random Text</li>
                                    <li>Random Text</li>
                                    <li>Random Text</li>
                                </ul>
                            </div>
                            <div class="col-lg-12 d-flex justify-content-end">
                                <a href="{{route('general.executive.page2')}}" class="text-white text">Check Weather</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
</body>

</html>
