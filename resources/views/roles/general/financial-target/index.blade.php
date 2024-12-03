<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Target Sales</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        {{--
        <link href="{{ url('assets/css/style1.css') }}" rel="stylesheet" />
        --}}
        <script src="{{ url('assets/js/chart.js') }}"></script>
        <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
        <link rel="stylesheet" href="{{url('fontawesome/css/all.min.css')}}" />
    </head>
    <style>
        body {
            background-image: url("https://img.freepik.com/premium-photo/furniture-office-background-dark_87720-269186.jpg");
            backdrop-filter: blur(25px);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            min-height: 100vh; /* Ensures it covers the full viewport height */
        }
        h4.currentTraget {
            color: #aaa;
        }
        h3.targetHeader {
            color: #fff;
        }
        h5.salesBudget {
            color: #fff;
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 5px 15px; /* Adjust padding as needed */
            text-align: center;
            min-width: 120px;
        }


        h4.businessType {
            color: #fff;
        }
        i.backTarget,
        i.addTarget,
        i.deleteTarget {
            color: #fff;
            font-size: 20px;
        }
        h6.displayTarget {
            color: #fff;
        }
        h6.targetHistory {
            color: #fff;
        }
        .targetSalesForm {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px; /* Border radius for the table */
            padding: 20px; /* Padding inside the table */
            backdrop-filter: blur(30px); /* Apply blur effect */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); /* Optional shadow for added effect */
            width: 100%; /* Ensure the table fills the container */
            border: none; /* Remove borders */
            border-collapse: collapse;
        }


        .targetSalesForm th,
        .targetSalesForm td {
            padding: 15px; /* Add padding for better spacing */
            text-align: center; /* Center the text in the table cells */
            border: none;
        }


        .targetSalesForm th {
            background-color: rgba(0, 0, 0, 0.1); /* Slightly darker background for table headers */
            color: #fff;
            border: none; /* Remove header border */
        }


        .targetSalesForm td {
            background-color: rgba(255, 255, 255, 0.1); /* Slightly lighter background for table rows */
            color: #fff;
            border: none; /* Remove row borders */
        }
        i.editTarget,
        a.deleteTarget {
            color: #fff;
        }
        /* Keep the table header unaffected */
        h6.displayTarget {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px; /* Border radius for the table */
            padding: 5px 10px; /* Padding inside the table */
            backdrop-filter: blur(30px); /* Apply blur effect */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); /* Optional shadow for added effect */
            border: none; /* Remove borders */
            border-collapse: collapse;
            color: #fff;
        }
       
    </style>


    <body>
        <div class="container">
            <!-- Header Section -->
            <div class="row">
                <div class="col-lg-4 mt-4">
                   <a href="{{ route('general.kuwago-one.dashboard') }}"><i class="fa-solid fa-arrow-left backTarget"></i></a>
                </div>
                <div class="col-lg-4 mt-4 d-flex justify-content-center">
                    <h3 class="targetHeader">Financial Targets</h3>
                </div>
                <div class="col-lg-4 mt-4 d-flex justify-content-end">
                    <!-- Create Dropdown Button -->
                    <div class="dropdown">
                        <button class="btn" type="button" id="createDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-plus text-white"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="createDropdown">
                            <li><a class="dropdown-item" href="{{ route('targetSales.create') }}">Create Target Sales</a></li>
                            <li><a class="dropdown-item" href="{{ route('budgetAllocations.create') }}">Create Budget Allocation</a></li>
                        </ul>
                    </div>
                </div>
            </div>


            <!-- Titles Section -->
            <div class="row mt-5">
                <div class="col-lg-6 d-flex justify-content-center">
                    <h3 class="createHeader" style="color: #fff;">Target Sales</h3>
                </div>
                <div class="col-lg-6 d-flex justify-content-center">
                    <h3 class="createHeader" style="color: #fff;">Budget Allocations</h3>
                </div>
            </div>
            <!-- Tables Section -->
            <div class="row mt-5">
                <!-- Target Sales Table -->
                <div class="col-lg-6 targetsColumn">
                    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                        <table class="table targetSalesForm">
                            <thead style="position: sticky; top: 0; background: rgb(15, 0, 0); z-index: 1;">
                                <tr>
                                    <th>Business Type</th>
                                    <th>Amount</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($targetSales as $targetSale)
                                <tr class="selectable-row" data-bs-toggle="modal" data-bs-target="#targetSaleModal" data-business-type="{{ $targetSale->business_type }}" data-amount="₱{{ number_format($targetSale->amount, 2) }}" data-start-date="{{ $targetSale->start_date->format('Y-m-d') }}" data-end-date="{{ $targetSale->end_date->format('Y-m-d') }}">
                                    <td>{{ $targetSale->business_type }}</td>
                                    <td>₱{{ number_format($targetSale->amount, 2) }}</td>
                                    <td>{{ $targetSale->start_date->format('Y-m-d') }}</td>
                                    <td>{{ $targetSale->end_date->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('targetSales.edit', $targetSale) }}" class="btn"><i class="fa-regular fa-pen-to-square editTarget"></i></a>
                                        <form action="{{ route('targetSales.destroy', $targetSale) }}" method="POST" style="display: inline;">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn"><i class="fa-solid fa-trash-can deleteTarget"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            
                <!-- Budget Allocations Table -->
                <div class="col-lg-6 targetsColumn">
                    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                        <table class="table targetSalesForm">
                            <thead style="position: sticky; top: 0; background: rgb(15, 0, 0); z-index: 1;">
                                <tr>
                                    <th>Business Type</th>
                                    <th>Amount</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($budgetAllocations as $budgetAllocation)
                                <tr class="selectable-row" data-bs-toggle="modal" data-bs-target="#budgetAllocationModal" data-business-type="{{ $budgetAllocation->business_type }}" data-amount="₱{{ number_format($budgetAllocation->amount, 2) }}" data-start-date="{{ $budgetAllocation->start_date->format('Y-m-d') }}" data-end-date="{{ $budgetAllocation->end_date->format('Y-m-d') }}">
                                    <td>{{ $budgetAllocation->business_type }}</td>
                                    <td>₱{{ number_format($budgetAllocation->amount, 2) }}</td>
                                    <td>{{ $budgetAllocation->start_date->format('Y-m-d') }}</td>
                                    <td>{{ $budgetAllocation->end_date->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('budgetAllocations.edit', $budgetAllocation) }}" class="btn"><i class="fa-regular fa-pen-to-square editTarget"></i></a>
                                        <form action="{{ route('budgetAllocations.destroy', $budgetAllocation) }}" method="POST" style="display: inline;">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn"><i class="fa-solid fa-trash-can deleteTarget"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Modal for Target Sales -->
            <div class="modal fade" id="targetSaleModal" tabindex="-1" aria-labelledby="targetSaleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="targetSaleModalLabel">Display this Target Sale</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Business Type:</strong> <span id="modalBusinessType"></span></p>
                            <p><strong>Amount:</strong> <span id="modalAmount"></span></p>
                            <p><strong>Start Date:</strong> <span id="modalStartDate"></span></p>
                            <p><strong>End Date:</strong> <span id="modalEndDate"></span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary">Display</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Modal for Budget Allocations -->
            <div class="modal fade" id="budgetAllocationModal" tabindex="-1" aria-labelledby="budgetAllocationModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="budgetAllocationModalLabel">Display this Budget Allocation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Business Type:</strong> <span id="modalBusinessType"></span></p>
                            <p><strong>Amount:</strong> <span id="modalAmount"></span></p>
                            <p><strong>Start Date:</strong> <span id="modalStartDate"></span></p>
                            <p><strong>End Date:</strong> <span id="modalEndDate"></span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary">Display</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var targetSaleModal = document.getElementById('targetSaleModal');
                    var budgetAllocationModal = document.getElementById('budgetAllocationModal');
            
                    targetSaleModal.addEventListener('show.bs.modal', function(event) {
                        var button = event.relatedTarget;
                        var businessType = button.getAttribute('data-business-type');
                        var amount = button.getAttribute('data-amount');
                        var startDate = button.getAttribute('data-start-date');
                        var endDate = button.getAttribute('data-end-date');
            
                        var modalBusinessType = targetSaleModal.querySelector('#modalBusinessType');
                        var modalAmount = targetSaleModal.querySelector('#modalAmount');
                        var modalStartDate = targetSaleModal.querySelector('#modalStartDate');
                        var modalEndDate = targetSaleModal.querySelector('#modalEndDate');
            
                        modalBusinessType.textContent = businessType;
                        modalAmount.textContent = amount;
                        modalStartDate.textContent = startDate;
                        modalEndDate.textContent = endDate;
                    });
            
                    budgetAllocationModal.addEventListener('show.bs.modal', function(event) {
                        var button = event.relatedTarget;
                        var businessType = button.getAttribute('data-business-type');
                        var amount = button.getAttribute('data-amount');
                        var startDate = button.getAttribute('data-start-date');
                        var endDate = button.getAttribute('data-end-date');
            
                        var modalBusinessType = budgetAllocationModal.querySelector('#modalBusinessType');
                        var modalAmount = budgetAllocationModal.querySelector('#modalAmount');
                        var modalStartDate = budgetAllocationModal.querySelector('#modalStartDate');
                        var modalEndDate = budgetAllocationModal.querySelector('#modalEndDate');
            
                        modalBusinessType.textContent = businessType;
                        modalAmount.textContent = amount;
                        modalStartDate.textContent = startDate;
                        modalEndDate.textContent = endDate;
                    });
                });
            </script>
            
       
   
       


        


            <!-- Target History Link -->
            <div class="row mt-5">
                <div class="col-lg-12 d-flex justify-content-center">
                    <h6 class="targetHistory">View Target History</h6>
                </div>
            </div>
     
        <script>
            // JavaScript to toggle the 'selected' class on click
            document.querySelectorAll('.selectable-row').forEach(row => {
                row.addEventListener('click', function () {
                    // Remove 'selected' class from all rows
                    document.querySelectorAll('.selectable-row').forEach(r => r.classList.remove('selected'));
                    // Add 'selected' class to the clicked row
                    this.classList.add('selected');
                });
            });
        </script>
    </body>
</html>