<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Executive Dashboard</title>

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
    <div class="d-flex justify-content-center align-items-center text-center db-container">

            <!-- <div>
                <h3>Deal Breakdown by Status</h3>
                <ul>
                    @foreach ($data as $deal)
                        <li>{{ ucfirst($deal->status) }}: {{ $deal->count }}</li>
                    @endforeach
                </ul>
            </div> -->

        <!-- DASHBOARD CONTENTS -->
        @yield('content')

    </div>
        @include('general.footer')


    <!-- BOOTSTRAP SCRIPT -->
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>

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

