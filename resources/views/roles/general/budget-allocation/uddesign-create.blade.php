<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Create UdDesign Budget Allocation</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- <link href="{{ url('assets/css/style1.css') }}" rel="stylesheet" /> --}}
    {{-- GOOGLE FONT - POPPINS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <script src="{{ url('assets/js/chart.js') }}"></script>
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{url('fontawesome/css/all.min.css')}}" />
</head>
<style>
    body{
        background: url("/assets/images/settings-bg-img.png") no-repeat center
        center fixed;
    backdrop-filter: blur(25px);
    background-size: cover;
    min-height: 100vh;
    margin: 0;
    padding: 0;
    font-family: "Poppins";
    position: relative;
    }
    h3.createHeader, h3.targetHeader{
        color: #fff;
    }
    i.backTarget{
        color: #fff;
    }


    /* Style for the form container */
    form {
        padding: 20px;
        color: #fff; /* White text color */
    
    }


    /* Style for labels */
    form label {
        color: #fff; /* White color for labels */
        font-weight: bold;
    }


    /* Style for form control elements */
    form .form-control {
        background: transparent; /* Transparent background */
        color: #fff; /* White text color */
        border: none; /* Remove border */
        border-bottom: 1px solid #fff; /* White underline */
        border-radius: 0; /* Remove border radius */
        box-shadow: none; /* Remove default shadow */
    }


    /* Style for form control elements on focus */
    form .form-control:focus {
        box-shadow: none; /* Remove focus shadow */
        outline: none; /* Remove outline */
        border-bottom: 1px solid #fff; /* Keep white underline on focus */
        background: transparent;
    }


    /* Style for the submit button */
    button.createBudAlloc{

        background: rgba(255, 255, 255, 0.2);
        color: #fff;
        border: 1px solid rgba(255, 255, 255, 0.3);
        padding: 10px 20px;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
    }

    button.createBudAlloc:hover {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.6);
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
    }


    .button-container {
        text-align: center; /* Center-aligns the button */
        margin-top: 15px; /* Optional: Adds space above the button */
    }
</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mt-4 ">
                <a href="{{ route('targetSales.index') }}"><i class="fa-solid fa-arrow-left backTarget"></i></a>
            </div>
            <div class="col-lg-4 mt-4 d-flex justify-content-center ">
                <h3 class="targetHeader">UdD Budget Allocation</h3>
            </div>
            <div class="col-lg-4 mt-4 d-flex justify-content-end ">
            </div>
        </div>
        <div class="row mt-5">
           
            <div class="col-lg-12 d-flex justify-content-center">
                <h3 class="createHeader">UdDesign Budget Allocation</h3>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <form action="{{ route('uddesign-budget.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="amount">Amount</label>
                        <input type="number" name="amount" id="amount" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="start_date">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="form-control custom-date" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="end_date">End Date</label>
                        <input type="date" name="end_date" id="end_date" class="form-control custom-date" required>
                    </div>                    
                    <div class="button-container">
                        <button type="submit" class="btn createBudAlloc mt-3">Create Allocation</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</body>
</html>