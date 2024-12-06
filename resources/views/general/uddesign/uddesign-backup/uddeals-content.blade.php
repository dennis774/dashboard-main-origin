<div class="container content-container">
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
                            <div class="col-lg-5">
                                <h2>Deals List</h2>
                            </div>
                            <div class="col-lg-4">
                                <form action="{{ route('general.uddesign.uddeals') }}" method="GET">
                                    <select name="sort" class="form-control createDeals" onchange="this.form.submit()">
                                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest to Oldest</option>
                                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest to Newest</option>
                                    </select>
                                </form>
                            </div>
                            <div class="col-lg-3 d-flex justify-content-end">
                                <a href="{{ route('deals.create') }}">
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