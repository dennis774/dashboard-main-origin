<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Manage Deals</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- <link href="{{ url('assets/css/promos.css') }}" rel="stylesheet" /> --}}
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
   <div class="container">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-1"></div>

        <div class="col-lg-9 mt-5 p-2 uddeals text-white text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 dealDetails">
                        @foreach ($deals as $deal)
                            <div class="deal-details" id="deal-details-{{ $deal->id }}" style="display: none;">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div style="font-size:18px;"><b>Deal Name: {{ $deal->deal_name }}</b></div>
                                        <div>Client Name: {{ $deal->client_name }}</div>
                                        <div>Contact #: {{ $deal->contact_number }}</div>
                                        <div>Email: {{ $deal->email }}</div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div>Date Approved: {{ $deal->date_approved }}</div>
                                        <div>Production Due: {{ $deal->production_due_date }}</div>
                                        <div>Payment Method: {{ $deal->payment_method }}</div>
                                        <div>Date Closed: {{ $deal->date_closed }}</div>
                                    </div>
                                </div>
                
                                <div class="container mt-2 pb-2 dealItems">
                                    <div class="scrollable-table">
                                        <table cellspacing="0" cellpadding="5" style="width: 100%; text-align: center;">
                                            <thead>
                                                <tr>
                                                    <th>Description</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Price</th>
                                                    <th>Total Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($deal->items as $item)
                                                    <tr>
                                                        <td>{{ $item['description'] }}</td>
                                                        <td>{{ $item['quantity'] }}</td>
                                                        <td>{{ $item['unit_price'] }}</td>
                                                        <td>{{ $item['total_price'] }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                
                                <div class="row mt-2">
                                    <div class="col-lg-4">
                                        <div>Grand Total: ₱ {{ number_format($deal->grand_price, 2) }}</div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div>Status: {{ $deal->status }}</div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <a href="{{ route('deals.edit', $deal->id) }}"><i class="fa-regular fa-pen-to-square text-white text" style="font-size: 18px;"></i></a>
                                            </div>
                                            <div class="col-lg-6 text-white text">
                                                <form action="{{ route('deals.destroy', $deal->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="background: none; border: none; padding: 0;">
                                                        <i class="fa-regular fa-trash-can" style="color: white; font-size: 18px;"></i>
                                                    </button>
                                                </form>                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div> 
                    <div class="col-lg-3 dealsList">
                        <div class="row">
                            <div class="col-lg-6">
                                <h2>Deals List</h2>
                            </div>
                            <div class="col-lg-6 d-flex justify-content-end">
                                <a href="{{route('deals.create')}}">
                                    <i class="fa-solid fa-plus text-white text"></i>
                                </a>
                            </div>
                        </div>
                        <div class="scrollable-deals">
                            <ol>
                                @foreach ($deals as $deal)
                                    <li>
                                        <a href="#" class="deal-link" data-deal-id="{{ $deal->id }}" style="color: #fff;">{{ $deal->deal_name }}</a>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>                    

                </div>
            </div>
        </div>
        <div class="col-lg-1"></div>
    </div>
   </div>
</body>
<script>
    // Add event listeners to the deal links
    document.querySelectorAll('.deal-link').forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();

            // Hide all deal details
            document.querySelectorAll('.deal-details').forEach(detail => {
                detail.style.display = 'none';
            });

            // Show the clicked deal's details
            const dealId = this.getAttribute('data-deal-id');
            document.getElementById('deal-details-' + dealId).style.display = 'block';
        });
    });
</script>

</html>




































{{-- <body>
    
        <a href="{{ route('deals.create') }}">Create New Deal</a>
    
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif
    
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Deal Name</th>
                    <th>Client Name</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Date Approved</th>
                    <th>Production Due Date</th>
                    <th>Payment Method</th>
                    <th>Cash</th>
                    <th>GCash</th>
                    <th>Cash + GCash</th>
                    <th>Date Closed</th>
                    <th>Items</th> <!-- New header for Items -->
                    <th>Grand Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deals as $deal)
                    <tr>
                        <td>{{ $deal->id }}</td>
                        <td>{{ $deal->deal_name }}</td>
                        <td>{{ $deal->client_name }}</td>
                        <td>{{ $deal->contact_number }}</td>
                        <td>{{ $deal->email }}</td>
                        <td>{{ $deal->date_approved }}</td>
                        <td>{{ $deal->production_due_date }}</td>
                        <td>{{ $deal->payment_method }}</td>
                        <td>{{ $deal->cash }}</td>
                        <td>{{ $deal->gcash }}</td>
                        <td>{{ $deal->cash_gcash }}</td>
                        <td>{{ $deal->date_closed }}</td>
                        <td>
                            <ul>
                                @foreach ($deal->items as $item)
                                    <li>
                                        Description: {{ $item['description'] }} <br>
                                        Quantity: {{ $item['quantity'] }} <br>
                                        Unit Price: {{ $item['unit_price'] }} <br>
                                        Total Price: {{ $item['total_price'] }} <br>
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ $deal->grand_price }}</td>
                        <td>{{ $deal->status }}</td>
                        <td>
                            <a href="{{ route('deals.edit', $deal->id) }}">Edit</a>
                            <form action="{{ route('deals.destroy', $deal->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body> --}}
