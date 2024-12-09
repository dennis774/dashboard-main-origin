<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>LCMK Dashboard</title>

    {{-- GOOGLE FONT - POPPINS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    {{-- CUSTOM FONT --}}
    <link rel="stylesheet" href="{{ asset('assets/css/helvetica-font.css') }}">

    {{-- CHART --}}
    <script src="{{ url('assets/js/chart.umd.js') }}"></script>

    {{-- BOOTSTRAP --}}
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    {{-- CSS --}}
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet" />

    {{-- FONT AWESOME --}}
    <link rel="stylesheet" href="{{url('fontawesome/css/all.min.css')}}" />
</head>

<body class="account-body">
    <div class="container">
        @yield('content')
    </div>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>


</html>



<?php
/*
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Cap-Board</title>
    {{-- BOOTSTRAP --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    {{-- END OF BOOTSTRAP --}} {{-- FONT AWESOME --}}
    <link rel="stylesheet" href="{{url('fontawesome/css/all.min.css')}}" />
    {{-- END OF FONT AWESOME --}}
</head>

<body class="account-body">
    <div class="container-fluid">
        @yield('content')
    </div>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
*/ ?>