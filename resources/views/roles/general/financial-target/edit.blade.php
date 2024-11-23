<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Manage Users</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- <link href="{{ url('assets/css/style1.css') }}" rel="stylesheet" /> --}}
    <script src="{{ url('assets/js/chart.js') }}"></script>
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{url('fontawesome/css/all.min.css')}}" />
</head>
<style>
     body{
    background-image: url('https://t4.ftcdn.net/jpg/07/94/30/45/360_F_794304521_O4o0Y5UrvKtDxBNHY9utMowV2VhuhRpk.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    backdrop-filter: blur(25px); /* Optional: adds blur effect */
    min-height: 100vh; /* Ensures it covers the full viewport height */
}
h3.targetHeader{
    color: #fff;
}
i.backTarget{
    color: #fff;
}
    /* Style for the form container */
form {
    background: rgba(255, 255, 255, 0.1); /* Transparent background */
    padding: 20px;
    color: #fff; /* White text color */
}


/* Style for labels */
form label {
    color: #fff; /* White color for labels */
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


button.editTargetSale{
    
    background: rgba(255, 255, 255, 0.2);
    color: #fff;
    border: 1px solid rgba(255, 255, 255, 0.3);
    padding: 10px 20px;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 100%;
}

button.editTargetSale:hover {
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
                <a href="{{url('/targetSales')}}"><i class="fa-solid fa-arrow-left backTarget"></i></a>
            </div>
            <div class="col-lg-4 mt-4 d-flex justify-content-center ">
                <h3 class="targetHeader">Financial Targets</h3>
            </div>
            <div class="col-lg-4 mt-4 d-flex justify-content-end ">
            </div>
        </div>


     


        <div class="row mt-5">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <form action="{{ route('targetSales.update', $targetSale) }}" method="POST">
                    @csrf
                    @method('PUT')
                   
                    <div class="form-group mb-3">
                        <label for="business_type">Business Type</label>
                        <select name="business_type" id="business_type" class="form-control" required>
                            <option value="UdDesign" {{ $targetSale->business_type == 'UdDesign' ? 'selected' : '' }}>UdDesign</option>
                            <option value="Kuwago1" {{ $targetSale->business_type == 'Kuwago1' ? 'selected' : '' }}>Kuwago1</option>
                            <option value="Kuwago2" {{ $targetSale->business_type == 'Kuwago2' ? 'selected' : '' }}>Kuwago2</option>
                        </select>
                    </div>
       
                    <div class="form-group mb-3">
                        <label for="amount">Amount</label>
                        <input type="number" name="amount" id="amount" class="form-control" value="{{ $targetSale->amount }}" required>
                    </div>
       
                    <div class="form-group mb-3">
                        <label for="start_date">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $targetSale->start_date->format('Y-m-d') }}" required>
                    </div>
       
                    <div class="form-group mb-3">
                        <label for="end_date">End Date</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $targetSale->end_date->format('Y-m-d') }}" required>
                    </div>
       
                    <div class="button-container">
                        <button type="submit" class="btn editTargetSale mt-3">Update</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-3"></div>
        </div>


    </div>
   
</body>
</html>
