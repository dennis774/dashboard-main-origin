<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Edit Deals</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        {{--
        <link href="{{ url('assets/css/style.css') }}" rel="stylesheet" />
        --}}
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
            backdrop-filter: blur(25px);
        }

        input.updateDeals:focus {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.6);
            color: #fff;
            outline: none;
            box-shadow: none;
        }

        input.updateDeals {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.6);
            color: #fff;
            outline: none;
            box-shadow: none;
            /* border-radius: 10px; */
        }

        input.updateDeals::placeholder {
            color: #fff;
            opacity: 0.5;
            /* Adjust opacity for better visibility */
        }

        select.updateDeals {
            box-shadow: none;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.6);
            color: #fff;
        }
        select.updateDeals:focus {
            box-shadow: none;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.6);
            color: #fff;
        }

        option {
            color: #000;
            /* Options within the dropdown should have readable text */
            background: rgba(255, 255, 255, 0.2);
            /* Ensure contrast for visibility */
        }
        .input-row {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .input-field {
            flex: 1 1 200px; /* Allows for flexible resizing */
               }

        .input-field label {
            display: block;
            margin-bottom: 5px;
        }

        .input-field input {
            width: 100%;
            padding: 5px;
            box-sizing: border-box;
            border-radius: 7px; 
        }

        div.dealItemsInput{
    border-radius: 5px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }
       
button.saveDeal{
            background: rgba(255, 255, 255, 0.2);
        color: #fff;
        border: 1px solid rgba(255, 255, 255, 0.3);
        padding: 7px 15px;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        }
        button.saveDeal:hover {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.6);
    box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
    color: #fff;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mt-4 d-flex justify-content-start">
                <a href="javascript:history.back()" class="backtoIndex">
                    <i class="fa-solid fa-arrow-left text-white text"></i>
                </a>
            </div>
            <div class="col-lg-4 mt-4 d-flex justify-content-center">
                <h2 class="text-center" style="color: #fff; font-size: 35px;">Edit Deal</h2>
            </div>
            <div class="col-lg-4"></div>
        </div>

        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="container text-white text">
                    <form action="{{ route('deals.update', $deal->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="col-lg-12">
                                    <label for="deal_name" class="form-label">Deal Name:</label>
                                    <input type="text" class="form-control updateDeals" name="deal_name" value="{{ $deal->deal_name }}" required />
                                </div>

                                <div class="col-lg-12">
                                    <label for="client_name" class="form-label">Client Name:</label>
                                    <input type="text" class="form-control updateDeals" name="client_name" value="{{ $deal->client_name }}" required />
                                </div>

                                <div class="col-lg-12">
                                    <label for="contact_number" class="form-label">Contact Number:</label>
                                    <input type="text" class="form-control updateDeals" name="contact_number" value="{{ $deal->contact_number }}" required />
                                </div>

                                <div class="col-lg-12">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" class="form-control updateDeals" name="email" value="{{ $deal->email }}" required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="date_approved" class="form-label">Date Approved:</label>
                                            <input type="date" class="form-control updateDeals" name="date_approved" value="{{ $deal->date_approved }}" required />
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="production_due_date" class="form-label">Due Date:</label>
                                            <input type="date" class="form-control updateDeals" name="production_due_date" value="{{ $deal->production_due_date }}" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <label for="payment_method" class="form-label">Payment Method:</label>
                                    <select class="form-control updateDeals" name="payment_method" required>
                                        <option value="Cash" {{ $deal->payment_method == 'Cash' ? 'selected' : '' }}>Cash</option>
                                        <option value="GCash" {{ $deal->payment_method == 'GCash' ? 'selected' : '' }}>GCash</option>
                                        <option value="Cash_GCash" {{ $deal->payment_method == 'Cash_GCash' ? 'selected' : '' }}>Cash_GCash</option>
                                    </select>
                                </div>

                                <div class="col-lg-12">
                                    <label for="date_closed" class="form-label">Date Closed:</label>
                                    <input type="date" class="form-control updateDeals" name="date_closed" value="{{ $deal->date_closed }}" required />
                                </div>

                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="cash" class="form-label">Cash:</label>
                                            <input type="number" class="form-control updateDeals" step="1" name="cash" value="{{ $deal->cash }}" required />
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="gcash" class="form-label">GCash:</label>
                                            <input type="number" class="form-control updateDeals" step="1" name="gcash" value="{{ $deal->gcash }}" required />
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="cash_gcash" class="form-label">Cash_Gcash:</label>
                                            <input type="number" class="form-control updateDeals" step="1" name="cash_gcash" value="{{ $deal->cash_gcash }}" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container mt-3 p-2">
                            <div class="row dealItemsInput">
                                <div id="items">
                                    @foreach($deal->items as $index => $item)
                                    <div class="item-inputs" id="item-{{ $index }}">
                                        <div class="input-row">
                                            <div class="input-field">
                                                <label class="form-label">Item Description:</label>
                                                <input type="text" name="items[{{ $index }}][description]" value="{{ $item->description }}" class="form-label updateDeals" required><br>
                                            </div>

                                            <div class="input-field">
                                                <label class="form-label">Quantity:</label>
                                                <input type="number" name="items[{{ $index }}][quantity]" value="{{ $item->quantity }}" class="form-label updateDeals" required><br>
                                            </div>

                                            <div class="input-field">
                                                <label class="form-label">Unit Price:</label>
                                                <input type="number" name="items[{{ $index }}][unit_price]" value="{{ $item->unit_price }}" class="form-label updateDeals" step="1" required><br>
                                            </div>

                                            <div class="input-field">
                                                <label class="form-label">Total Price:</label>
                                                <input type="number" name="items[{{ $index }}][total_price]" value="{{ $item->total_price }}" class="form-label updateDeals" step="1" required><br>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                      
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="grand_price" class="form-label">Grand Total:</label>
                                <input type="number" class="form-control updateDeals" step="1" name="grand_price" value="{{ $deal->grand_price }}" required />
                            </div>
                            <div class="col-lg-6">
                                <label for="status" class="form-label">Status:</label>
                                <select class="form-control updateDeals" name="status" required>
                                    <option value="Open" {{ $deal->status == 'Open' ? 'selected' : '' }}>Open</option>
                                    <option value="Processing" {{ $deal->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="Closed" {{ $deal->status == 'Closed' ? 'selected' : '' }}>Closed</option>
                                    <option value="On-Hold" {{ $deal->status == 'On-Hold' ? 'selected' : '' }}>On-Hold</option>
                                    <option value="Cancelled" {{ $deal->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-12 mb-3 d-flex justify-content-center">
                                <button type="submit" class="saveDeal">Update Deal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
</body>

</html>