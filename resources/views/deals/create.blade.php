<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Create Deals</title>
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

        input.createDeals:focus {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.6);
            color: #fff;
            outline: none;
            box-shadow: none;
        }

        input.createDeals {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.6);
            color: #fff;
            outline: none;
            box-shadow: none;
            /* border-radius: 10px; */
        }

        input.createDeals::placeholder {
            color: #fff;
            opacity: 0.5;
            /* Adjust opacity for better visibility */
        }

        select.createDeals {
            box-shadow: none;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.6);
            color: #fff;
        }
        select.createDeals:focus {
            box-shadow: none;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.6);
            color: #fff;
        }

        option {
            color: #000;
            background: rgba(255, 255, 255, 0.2);
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
        button.addDeal{
            background: rgba(255, 255, 255, 0.2);
        color: #fff;
        border: 1px solid rgba(255, 255, 255, 0.3);
        padding: 7px 15px;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        }
        button.addDeal:hover {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.6);
    box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
    color: #fff;
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

   
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mt-4 d-flex justify-content-start">
                    <a href="javascript:history.back()" class="backtoIndex">
                        <i class="fa-solid fa-arrow-left text-white text"></i>
                    </a>
                </div>
                <div class="col-lg-4 mt-4 d-flex justify-content-center">
                    <h2 class="text-center" style="color: #fff; font-size: 35px;">Create a New Deal</h2>
                </div>
                <div class="col-lg-4"></div>
            </div>
    
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="container text-white text">
                        <form action="{{ route('deals.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="col-lg-12">
                                        <label for="deal_name" class="form-label">Deal Name:</label>
                                        <input type="text" class="form-control createDeals" name="deal_name" placeholder="Deal Name..." required />
                                    </div>
    
                                    <div class="col-lg-12">
                                        <label for="client_name" class="form-label">Client Name:</label>
                                        <input type="text" class="form-control createDeals" name="client_name" placeholder="Client Name..." required />
                                    </div>
    
                                    <div class="col-lg-12">
                                        <label for="contact_number" class="form-label">Contact Number:</label>
                                        <input type="text" class="form-control createDeals" name="contact_number" placeholder="Contact Numbers..." required />
                                    </div>
    
                                    <div class="col-lg-12">
                                        <label for="email" class="form-label">Email:</label>
                                        <input type="email" class="form-control createDeals" name="email" placeholder="Email..." required />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="date_approved" class="form-label">Date Approved:</label>
                                                <input type="date" class="form-control createDeals" name="date_approved" placeholder="Date Approved..." required />
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="production_due_date" class="form-label">Due Date:</label>
                                                <input type="date" class="form-control createDeals" name="production_due_date" placeholder="Due Date..." required />
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-lg-12">
                                        <label for="payment_method" class="form-label">Payment Method:</label>
                                        <select class="form-control createDeals" name="payment_method" required>
                                            <option value="Cash">Cash</option>
                                            <option value="GCash">GCash</option>
                                            <option value="Cash_GCash">Cash_GCash</option>
                                        </select>
                                    </div>
    
                                    <div class="col-lg-12">
                                        <label for="date_closed" class="form-label">Date Closed:</label>
                                        <input type="date" class="form-control createDeals" name="date_closed" placeholder="Date Closed..." required />
                                    </div>
    
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label for="cash" class="form-label">Cash:</label>
                                                <input type="number" class="form-control createDeals" step="1" name="cash" placeholder="..." required />
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="gcash" class="form-label">GCash:</label>
                                                <input type="number" class="form-control createDeals" step="1" name="gcash" placeholder="..." required />
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="cash_gcash" class="form-label">Cash_Gcash:</label>
                                                <input type="number" class="form-control createDeals" step="1" name="cash_gcash" placeholder="..." required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="container mt-3 p-2">
                                <div class="row dealItemsInput">
                                    <div id="items">
                                        <div class="item-inputs" id="item-0">
                                            <div class="input-row">
                                                <div class="input-field">
                                                    <label class="form-label">Item Description:</label>
                                                    <input type="text" name="items[0][description]" class="form-label createDeals" required><br>
                                                </div>
    
                                                <div class="input-field">
                                                    <label class="form-label">Quantity:</label>
                                                    <input type="number" name="items[0][quantity]" class="form-label createDeals" required><br>
                                                </div>
    
                                                <div class="input-field">
                                                    <label class="form-label">Unit Price:</label>
                                                    <input type="number" name="items[0][unit_price]" class="form-label createDeals" step="1" required><br>
                                                </div>
    
                                                <div class="input-field">
                                                    <label class="form-label">Total Price:</label>
                                                    <input type="number" name="items[0][total_price]" class="form-label createDeals" step="1" required><br>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <button type="button" id="add-item-btn" class="addDeal">Add Another Item</button><br><br>
                                </div>
                            </div>   
    
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="grand_price" class="form-label">Grand Total:</label>
                                    <input type="number" class="form-control createDeals" step="1" name="grand_price" placeholder="..." required />
                                </div>
                                <div class="col-lg-6">
                                    <label for="status" class="form-label">Status:</label>
                                    <select class="form-control createDeals" name="status" required>
                                        <option value="Open">Open</option>
                                        <option value="Processing">Processing</option>
                                        <option value="Closed">Closed</option>
                                        <option value="On-Hold">On-Hold</option>
                                        <option value="Cancelled">Cancelled</option>
                                    </select>
                                </div>
                            </div>
    
                            <div class="row mt-2">
                                <div class="col-lg-12 mb-3 d-flex justify-content-center">
                                    <button type="submit" class="saveDeal">Save The Deal</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
    
        <script>
            let itemIndex = 1; // Starting index for new item fields
            const addItemButton = document.getElementById('add-item-btn');
            const itemsContainer = document.getElementById('items');
    
            addItemButton.addEventListener('click', () => {
                const newItemDiv = document.createElement('div');
                newItemDiv.classList.add('item-inputs');
                newItemDiv.setAttribute('id', 'item-' + itemIndex);
    
                newItemDiv.innerHTML = `
                    <div class="input-row">
                        <div class="input-field">
                            <label class="form-label">Item Description:</label>
                            <input type="text" name="items[${itemIndex}][description]" class="form-label createDeals" required><br>
                        </div>
    
                        <div class="input-field">
                            <label class="form-label">Quantity:</label>
                            <input type="number" name="items[${itemIndex}][quantity]" class="form-label createDeals" required><br>
                        </div>
    
                        <div class="input-field">
                            <label class="form-label">Unit Price:</label>
                            <input type="number" name="items[${itemIndex}][unit_price]" class="form-label createDeals" step="1" required><br>
                        </div>
    
                        <div class="input-field">
                            <label class="form-label">Total Price:</label>
                            <input type="number" name="items[${itemIndex}][total_price]" class="form-label createDeals" step="1" required><br>
                        </div>
                    </div>
                    <br>
                `;
    
                itemsContainer.appendChild(newItemDiv);
                itemIndex++;
            });
        </script>
    </body>
    
</html>















{{-- <body>
    <h1>Create a New Deal</h1>
    <form action="{{ route('deals.store') }}" method="POST">
        @csrf
        <label>Deal Name:</label>
        <input type="text" name="deal_name" required><br>

        <label>Client Name:</label>
        <input type="text" name="client_name" required><br>

        <label>Contact Number:</label>
        <input type="text" name="contact_number" required><br>

        <label>Email:</label>
        <input type="email" name="email"><br>

        <label>Date Approved:</label>
        <input type="date" name="date_approved"><br>

        <label>Production Due Date:</label>
        <input type="date" name="production_due_date"><br>

        <label>Payment Method:</label>
        <select name="payment_method" required>
            <option value="Cash">Cash</option>
            <option value="GCash">GCash</option>
            <option value="Cash_GCash">Cash + GCash</option>
        </select><br>

        <label>Cash:</label>
        <input type="number" step="0.01" name="cash"><br>

        <label>GCash:</label>
        <input type="number" step="0.01" name="gcash"><br>

        <label>Cash + GCash:</label>
        <input type="number" step="0.01" name="cash_gcash"><br>

        <label>Date Closed:</label>
        <input type="date" name="date_closed"><br>

        <div id="items">
            <div class="item-inputs" id="item-0">
                <div class="input-row">
                    <div class="input-field">
                        <label>Item Description:</label>
                        <input type="text" name="items[0][description]" required><br>
                    </div>

                    <div class="input-field">
                        <label>Quantity:</label>
                        <input type="number" name="items[0][quantity]" required><br>
                    </div>

                    <div class="input-field">
                        <label>Unit Price:</label>
                        <input type="number" name="items[0][unit_price]" step="0.01" required><br>
                    </div>

                    <div class="input-field">
                        <label>Total Price:</label>
                        <input type="number" name="items[0][total_price]" step="0.01" required><br>
                    </div>
                </div>
                <br>
            </div>
        </div>

        <button type="button" id="add-item-btn">Add Another Item</button><br><br>

        <label>Grand Price:</label>
        <input type="number" name="grand_price" step="0.01" required><br>

        <label>Status:</label>
        <select name="status" required>
            <option value="Open">Open</option>
            <option value="Closed">Closed</option>
        </select><br>

        <button type="submit">Save Deal</button>
    </form>

    <script>
        let itemIndex = 1; // Starting index for new item fields
        const addItemButton = document.getElementById('add-item-btn');
        const itemsContainer = document.getElementById('items');

        addItemButton.addEventListener('click', () => {
            const newItemDiv = document.createElement('div');
            newItemDiv.classList.add('item-inputs');
            newItemDiv.setAttribute('id', 'item-' + itemIndex);

            newItemDiv.innerHTML = `
                <div class="input-row">
                    <div class="input-field">
                        <label>Item Description:</label>
                        <input type="text" name="items[${itemIndex}][description]" required><br>
                    </div>

                    <div class="input-field">
                        <label>Quantity:</label>
                        <input type="number" name="items[${itemIndex}][quantity]" required><br>
                    </div>

                    <div class="input-field">
                        <label>Unit Price:</label>
                        <input type="number" name="items[${itemIndex}][unit_price]" step="0.01" required><br>
                    </div>

                    <div class="input-field">
                        <label>Total Price:</label>
                        <input type="number" name="items[${itemIndex}][total_price]" step="0.01" required><br>
                    </div>
                </div>
                <br>
            `;

            itemsContainer.appendChild(newItemDiv);
            itemIndex++; // Increment the index for the next item
        });
    </script>

    <style>
        .input-row {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .input-field {
            flex: 1 1 200px; 
            min-width: 150px;
        }

        .input-field label {
            display: block;
            margin-bottom: 5px;
        }

        .input-field input {
            width: 100%;
            padding: 5px;
            box-sizing: border-box;
        }

        #add-item-btn {
            margin-top: 10px;
            padding: 5px 15px;
            cursor: pointer;
        }
    </style>
</body>  --}}
