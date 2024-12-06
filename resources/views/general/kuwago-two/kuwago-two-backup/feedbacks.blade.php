<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Cap-Board</title>
        {{-- BOOTSTRAP --}}
        <script src="{{ url('assets/js/chart.umd.js') }}"></script>
        {{-- <link href="{{ url('assets/css/style.css') }}" rel="stylesheet" /> --}}
        <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
        {{-- END OF BOOTSTRAP --}} {{-- FONT AWESOME --}}
        <link rel="stylesheet" href="{{url('fontawesome/css/all.min.css')}}" />
        {{-- END OF FONT AWESOME --}}
        
    </head>
    <style>
        

        body {
        background-image: url("https://t4.ftcdn.net/jpg/07/94/30/45/360_F_794304521_O4o0Y5UrvKtDxBNHY9utMowV2VhuhRpk.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        min-height: 100vh;
    }
    div.feebackSection {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(25px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    div.CustomName {
        font-size: 18px;
    }

    div.CommentsSection::-webkit-scrollbar,
    div.SuggestionsSection::-webkit-scrollbar,
    div.ComplaintsSection::-webkit-scrollbar {
        width: 5px;
        /* Width of the scrollbar */
    }

    div.CommentsSection::-webkit-scrollbar-track,
    div.SuggestionsSection::-webkit-scrollbar-track,
    div.ComplaintsSection::-webkit-scrollbar-track {
        background-color: #ffffff;
        /* Hide the track */
    }

    div.CommentsSection::-webkit-scrollbar-thumb,
    div.SuggestionsSection::-webkit-scrollbar-thumb,
    div.ComplaintsSection::-webkit-scrollbar-thumb {
        background-color: #ffffff;
        /* White color for the thumb */
        border-radius: 10px;
        /* Optional: Rounded corners */
    }

    /* For Firefox */
    div.CommentsSection,
    div.SuggestionsSection,
    div.ComplaintsSection {
        scrollbar-width: thin;
        scrollbar-color: rgba(0, 0, 0, 0.2) transparent;
        /* Color of scrollbar and track */
    }

    button.filterFeedback {
        background-color: #ffffff;

    }

    button.filterFeedback:hover {
        background-color: #ffffff;

    }

    </style>
    <body>
        <div class="container-fluid">
            <!-- Navbar -->
            @include('general.navbar')
            <!-- /.navbar -->

            @include('general.kuwago-two.feedbacks-content')
        </div>
        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    </body>
</html>




