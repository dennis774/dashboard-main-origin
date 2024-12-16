<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>UdDesign Dashboard</title>

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

<body class="dashboards-body">
    <header class="mb-2">
        <!-- NAVBAR -->
        @include('general.navbar')
    </header>

    <!-- DASHBOARD MAIN CONTAINER & SIDEBAR -->
    <div class="container d-flex justify-content-center align-items-center text-center db-container">
        <div class="d-flex rounded-5 py-2 position-absolute justify-content-center dashboard-side-nav">
            @include('general.uddesign.sidebar')
        </div>
        <!-- DASHBOARD CONTENTS -->
        @yield('content')

    </div>

    {{-- @include('general.footer') --}}


    <!-- BOOTSTRAP SCRIPT -->
    @include('general.footer')
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    @include('general.footer-script')

    <!-- BUSINESSES DROPDOWN SCRIPT -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var currentUrl = window.location.href;
            var dropdownItems = document.querySelectorAll('.business-item');

            dropdownItems.forEach(function(item) {
                if (currentUrl.includes(item.getAttribute('href'))) {
                    document.getElementById('nav-business-dropdown').textContent = item.getAttribute('data-name');
                }
            });
        });
    </script>

    <!-- Dropdown Arrow Animation -->
    <script>
        // TOP NAVBAR BUSINESS DROPDOWN ARROW
        let dropdown = document.querySelector('.dropdown-business-btn');
        dropdown.onclick = function() {
            dropdown.classList.toggle('active');
        }
    </script>



    <!-- Link to Icons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    @yield('scripts')
    @include('general.footer-script')
</body>

</html>



{{-- ORIGINAL CODE --}}
<?php /*<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Cap-Board</title>
        {{-- BOOTSTRAP --}}
        <script src="{{ url('assets/js/chart.umd.js') }}"></script>
        <link href="{{ url('assets/css/style.css') }}" rel="stylesheet" />
        <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
        {{-- END OF BOOTSTRAP --}} {{-- FONT AWESOME --}}
        <link rel="stylesheet" href="{{url('fontawesome/css/all.min.css')}}" />
        {{-- END OF FONT AWESOME --}}
    </head>
    <body>
        <div class="container-fluid">
            <!-- Navbar -->
            @include('general.navbar')
            <!-- /.navbar -->
            @yield('content') @include('general.footer')
        </div>
        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
        @yield('scripts') @include('general.footer-script')
    </body>
</html>
*/