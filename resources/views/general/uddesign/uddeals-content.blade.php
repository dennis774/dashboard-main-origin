<!-- DASHBOARD PANEL -->
<div class="d-flex rounded-4 dashboard-panel">
    <div class="row d-flex flex-grow-1 m-0 column-gap-3 h-100 rounded-4 justify-content-center align-items-center text-white " style="padding-inline: 1.8%; padding-block: 2.5%;">

        <!-- LEFT COLUMN -->
        <div class="col-auto d-flex flex-column row-gap-1 p-0 px-2 pe-3 h-100" style="width: 74%;">

            <div class="row ps-2" style="height:30%;">
                {{-- LEFT COLUMN --}}
                @foreach ($deals as $deal)
                <div class="col-auto d-flex flex-column pe-0 align-items-start justify-content-around" style="width:55%;">
                    {{-- DEAL NAME --}}
                    <div class="col-12 d-flex">
                        <span class="fw-bold text-start" id="deal-name" style="font-family: Poppins; font-size: 1rem; letter-spacing: 0.5px;">Deal Name: </span>
                    </div>

                    {{-- CLIENT NAME --}}
                    <div class="col-12 d-flex">
                        <span class="uddeals-fields-text" id="client-name">Client Name:</span>
                    </div>

                    {{-- CONTACT NUMBER --}}
                    <div class="col-12 d-flex">
                        <span class="uddeals-fields-text" id="contact-number">Contact Number:</span>
                    </div>

                    {{-- EMAIL --}}
                    <div class="col-12 d-flex">
                        <span class="uddeals-fields-text" id="email">Email:</span>
                    </div>
                </div>

                {{-- RIGHT COLUMN --}}
                <div class="col d-flex flex-column pe-0 align-items-center justify-content-around">

                    {{-- DATE APPROVED --}}
                    <div class="col-12 d-flex">
                        <span class="uddeals-fields-text" id="date-approved">Date Approved: </span>
                    </div>

                    {{-- PRODUCTION DUE --}}
                    <div class="col-12 d-flex">
                        <span class="uddeals-fields-text" id="production-due">Production Due: </span>
                    </div>

                    {{-- PAYMENT METHOD --}}
                    <div class="col-12 d-flex">
                        <span class="uddeals-fields-text" id="payment-method">Payment Method:</span>
                    </div>

                    {{-- DATE CLOSED --}}
                    <div class="col-12 d-flex">
                        <span class="uddeals-fields-text" id="date-closed">Date Closed:</span>
                    </div>
                </div>
            </div>
            {{-- MIDDLE ROW --}}
            <div class="row" style="height:63%;">
                {{-- WHITE PANEL --}}
                <div class="col d-flex p-0 mt-2 ms-3 me-1 ps-2 rounded-4" style="background-color: #e9e9e8;">
                    {{-- ITEM DESCRIPTION --}}
                    <div class="w-100 scrollable-table overflow-y-scroll rounded-4" style="height: 265px;">
                        <table cellspacing="0" cellpadding="5" style="width: 100%; text-align: center;">
                            <thead class="sticky-top w-100" style="background-color: #e9e9e8">
                                <tr>
                                    <th class="col-auto uddeals-panel-text" style="width: 37%;">Item Description</th>
                                    <th class="col uddeals-panel-text">Quantity</th>
                                    <th class="col uddeals-panel-text">Unit Price</th>
                                    <th class="col uddeals-panel-text">Total Price</th>
                                </tr>
                            </thead>
                            <tbody id="deal-items-tbody" class="ms-3 overflow-y-scroll weather-column">
                                
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            {{-- GRAND TOTAL & STATUS --}}
            <div class="row ps-3" style="height:10%;">
                {{-- GRAND TOTAL --}}
                <div class="col d-flex flex-column align-items-center justify-content-around">

                    {{-- GRAND TOTAL TEXT --}}
                    <div class="col-12 d-flex align-items-end">
                        <span class="fw-bold" id="grand-total" style="font-family: Poppins; font-size: 1.2rem; letter-spacing: 1.5px;">Grand Total: </span>
                    </div>
                </div>

                {{-- STATUS --}}
                <div class="col d-flex flex-column align-items-center justify-content-around">

                    {{-- STATUS TEXT --}}
                    <div class="col-12 d-flex">
                        <span class="fw-bold" id="status" style="font-family: Poppins; font-size: 1.2rem; letter-spacing: 1.5px;">Status: </span>
                    </div>
                </div>
            </div>


        </div>
        <!-- END LEFT COLUMN -->

        <!-- LINE -->
        <div class="vr p-0 text-white opacity-75 align-self-center" style="width: 1px; min-height: 80%;"></div>

        <!-- RIGHT COLUMN -->
        <div class="col d-flex flex-column align-items-center row-gap-3 p-0 h-100">
            <!-- DEALS LIST-->
            <div class="col-12 d-flex ps-2 justify-content-start">
                <span class="uddesign-side-text" style="font-size: 1.1rem;">List of Deals</span>
            </div>
            <div class="row d-flex w-100 h-100 ps-4 align-items-center justify-content-evenly overflow-y-scroll">

                {{-- NOT FOUND --}}
                {{-- <span class="text-white-50 fst-italic fw-light uddesign-fields-text">
                    No deals found.
                </span> --}}
                <ol class="col d-flex flex-column h-100 p-0 m-0 align-items-start justify-content-start ">

                    @foreach ($deals as $deal)
                    <li class="ps-1 mb-1" style="font-family: Poppins; font-size: 0.85rem;" style="list-style-type: decimal;">
                        <a href="#" class="d-flex text-white text-start text-decoration-underline uddesign-side-text deal-link" data-deal-id="{{ $deal->id }}" style="font-size: 0.85rem;">
                            {{ $deal->deal_name }}
                        </a>
                    </li>
                    @endforeach
                </ol>

            </div>

        </div>
        <!-- END RIGHT COLUMN -->
    </div>
</div>

{{-- <script>
    // Add event listeners to the deal links
    document.querySelectorAll('.deal-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            // Hide all deal details
            document.querySelectorAll('.deal-details').forEach(detail => {
                detail.style.display = 'none';
            });

            document.getElementById('deal-name').textContent = `Deal Name: {{ $deals }}`;

            // Show the clicked deal's details
            const dealId = this.getAttribute('data-deal-id');
            document.getElementById('deal-details-' + dealId).style.display = 'block';
        });
    });
</script> --}}

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Select all links with the 'deal-link' class
        const dealLinks = document.querySelectorAll('.deal-link');
        const deals = @json($deals);
        

        deals.sort((a, b) => a.id - b.id);
        
        console.log(deals);

        console.log(deals[5].deal_name);

        dealLinks.forEach(function(dealLink) {
            // Add click event listener to each deal link
            dealLink.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default link behavior (e.g., page refresh)
                
                const dealId = dealLink.getAttribute('data-deal-id'); // Get the deal ID from the clicked link
                
                console.log('Clicked Deal ID:', dealId); // Output the deal ID to the console
                document.getElementById('deal-name').textContent = "Deal Name: " + deals[dealId-1].deal_name;
                document.getElementById('client-name').textContent = "Client Name: " + deals[dealId-1].client_name;
                document.getElementById('contact-number').textContent = "Contact Number: " + deals[dealId-1].contact_number;
                document.getElementById('email').textContent = "Email: " + deals[dealId-1].email;
                document.getElementById('date-approved').textContent = "Date Approved: " + deals[dealId-1].date_approved;
                document.getElementById('production-due').textContent = "Production Due: " + deals[dealId-1].production_due_date;
                document.getElementById('payment-method').textContent = "Payment Method: " + deals[dealId-1].payment_method.replace(/_/g, ' & ');
                document.getElementById('date-closed').textContent = "Date Closed: " + deals[dealId-1].date_closed;
                document.getElementById('grand-total').textContent = "Grand Total: " + deals[dealId-1].grand_price;
                document.getElementById('status').textContent = "Status: " + deals[dealId-1].status;

                const dealItems = deals[dealId-1].items;

                console.log("hi" + dealItems);
                
                const dealItemsTbody = document.getElementById('deal-items-tbody');
                dealItemsTbody.innerHTML = '';

                dealItems.forEach(item => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td class="col-auto uddeals-panel-content">${item.description}</td>
                        <td class="col uddeals-panel-content">${item.quantity}</td>
                        <td class="col uddeals-panel-content">${item.unit_price}</td>
                        <td class="col uddeals-panel-content">${item.total_price}</td>
                    `;
                    dealItemsTbody.appendChild(row);
                });
                
            });
        });
    });
</script>










{{-- <div class="container content-container">
    <div class="row mb-5">
        <div class="col-lg-1"></div>
        <div class="col-lg-1">
            <div class="container">
                <div class="row">
                    @include('general.uddesign.sidebar')
                </div>
            </div>
        </div>

        <div class="col-lg-9 p-2 uddeals text-white text">
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
</div> --}}
