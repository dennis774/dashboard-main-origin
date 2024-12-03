<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Deals</title>
        {{-- BOOTSTRAP --}}
        <script src="{{ url('assets/js/chart.umd.js') }}"></script>
        <link href="{{ url('assets/css/promos.css') }}" rel="stylesheet" />
        <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
        {{-- END OF BOOTSTRAP --}} {{-- FONT AWESOME --}}
        <link rel="stylesheet" href="{{url('fontawesome/css/all.min.css')}}" />
        {{-- END OF FONT AWESOME --}}
    </head>
    <style>
        
    div.uddeals{
        background: rgba(255, 255, 255, 0.2);
    border-radius: 15px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(25px);
    height: 405px;
    }
    div.dealDetails{
        border-right: 2px solid #fff;
    }
   
    .dealItems {
    color: #000;
    background: #fff;
    border-radius: 10px;
    height: 250px;
    overflow: hidden; /* Prevents scrollbar visibility */
    
}

.scrollable-table {
    height: 100%;
    overflow-y: scroll;
    scrollbar-width: none; /* For Firefox */
    -ms-overflow-style: none; /* For Internet Explorer and Edge */
}

/* Hide scrollbar for Webkit browsers */
.scrollable-table::-webkit-scrollbar {
    display: none;
}

/* Optional: Add padding inside the table */
table {
    border-collapse: collapse;
}

table th, table td {
    padding: 8px;
    text-align: left;
}
.scrollable-deals {
    max-height: 250px; /* Adjust as needed */
    overflow-y: scroll;
    padding-right: 10px; /* Space for hidden scrollbar */
    scrollbar-width: none; /* Firefox */
    -ms-overflow-style: none; /* Internet Explorer and Edge */
}

/* Hide scrollbar for WebKit browsers (Chrome, Safari) */
.scrollable-deals::-webkit-scrollbar {
    display: none;
}

/* Ensure ordered list styling is preserved */
ol {
    margin: 0;
    padding-left: 20px; /* Preserve space for list numbers */
}

ol li {
    padding: 8px 0;
}
.deal-link {
    color: #fff;
    text-decoration: none; /* Removes underline */
}

.deal-link:hover {
    text-decoration: underline; /* Optional: underline on hover for accessibility */
    color: #ddd; /* Lighter color on hover */
}
    </style>
<body>
    <div class="container-fluid">
        <!-- Navbar -->
        @include('general.navbar')
        <!-- /.navbar -->

        @include('general.uddesign.uddeals-content')
    </div>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</body>
</html>