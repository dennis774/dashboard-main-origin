<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Financial Targets</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        {{--
        <link href="{{ url('assets/css/style1.css') }}" rel="stylesheet" />
        --}}
        {{-- GOOGLE FONT - POPPINS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <script src="{{ url('assets/js/chart.js') }}"></script>
        <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
        <link rel="stylesheet" href="{{url('fontawesome/css/all.min.css')}}" />
    </head>
    <style>
        body {
            background: url("/assets/images/settings-bg-img.png") no-repeat center center fixed;
            backdrop-filter: blur(25px);
            background-size: cover;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            font-family: "Poppins";
            position: relative;
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
                            <li><a class="dropdown-item" href="{{ route('targetSales.create') }}">Kuwago One Create Target Sales</a></li>
                            <li><a class="dropdown-item" href="{{ route('budgetAllocations.create') }}">Kuwago One Create Budget Allocation</a></li>
                            <li><a class="dropdown-item" href="{{ route('kuwago-two-target.create') }}">Kuwago Two Create Target Sales</a></li>
                            <li><a class="dropdown-item" href="{{ route('kuwago-two-budget.create') }}">Kuwago Two Create Budget Allocation</a></li>
                            <li><a class="dropdown-item" href="{{ route('uddesign-target.create') }}">Uddesign Create Target Sales</a></li>
                            <li><a class="dropdown-item" href="{{ route('uddesign-budget.create') }}">Uddesign Create Budget Allocation</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Titles Section -->
            <div class="row mt-5">
                <div class="col-lg-6 d-flex justify-content-center">
                    <h3 class="createHeader" style="color: #fff;">Kuwago One Target Sales</h3>
                </div>
                <div class="col-lg-6 d-flex justify-content-center">
                    <h3 class="createHeader" style="color: #fff;">Kuwago One Budget Allocations</h3>
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
                                    <!-- <th>Business Type</th> -->
                                    <th>Amount</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- @foreach($targetSales as $target)
                                    <tr>
                                        <td>{{ $target->business_type }}</td>
                                        <td>{{ $target->amount }}</td>
                                        <td>{{ $target->start_date }}</td>
                                        <td>{{ $target->end_date }}</td>
                                        <td>{{ $target->display_identifier }}</td>
                                        <td>
                                            <form action="{{ route('target.sales.display', $target->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" {{ $target->is_displayed ? 'disabled' : '' }}>
                                                    {{ $target->is_displayed ? 'Currently Displayed' : 'Set as Display' }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach -->
                                @foreach($targetSales as $targetSale)
                                <tr class="selectable-row" data-bs-toggle="modal" data-bs-target="#targetSaleModal" data-business-type="{{ $targetSale->business_type }}" data-amount="₱{{ number_format($targetSale->amount, 2) }}" data-start-date="{{ $targetSale->start_date->format('Y-m-d') }}" data-end-date="{{ $targetSale->end_date->format('Y-m-d') }}">
                                    <!-- <td>{{ $targetSale->business_type }}</td> -->
                                    <td>₱{{ number_format($targetSale->amount, 2) }}</td>
                                    <td>{{ $targetSale->start_date->format('Y-m-d') }}</td>
                                    <td>{{ $targetSale->end_date->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('targetSales.edit', $targetSale) }}" class="btn"><i class="fa-regular fa-pen-to-square editTarget"></i></a>
                                        <form action="{{ route('targetSales.destroy', $targetSale) }}" method="POST" style="display: inline;">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn"><i class="fa-solid fa-trash-can deleteTarget"></i></button>
                                        </form>
                                        <form action="{{ route('target.sales.display', $targetSale  ->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" {{ $targetSale->is_displayed ? 'disabled' : '' }}>
                                                {{ $targetSale->is_displayed ? 'Currently Displayed' : 'Set as Display' }}
                                            </button>
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
                                    <!-- <th>Business Type</th> -->
                                    <th>Amount</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($budgetAllocations as $budgetAllocation)
                                <tr class="selectable-row" data-bs-toggle="modal" data-bs-target="#budgetAllocationModal" data-business-type="{{ $budgetAllocation->business_type }}" data-amount="₱{{ number_format($budgetAllocation->amount, 2) }}" data-start-date="{{ $budgetAllocation->start_date->format('Y-m-d') }}" data-end-date="{{ $budgetAllocation->end_date->format('Y-m-d') }}">
                                    <!-- <td>{{ $budgetAllocation->business_type }}</td> -->
                                    <td>₱{{ number_format($budgetAllocation->amount, 2) }}</td>
                                    <td>{{ $budgetAllocation->start_date->format('Y-m-d') }}</td>
                                    <td>{{ $budgetAllocation->end_date->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('budgetAllocations.edit', $budgetAllocation) }}" class="btn"><i class="fa-regular fa-pen-to-square editTarget"></i></a>
                                        <form action="{{ route('budgetAllocations.destroy', $budgetAllocation) }}" method="POST" style="display: inline;">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn"><i class="fa-solid fa-trash-can deleteTarget"></i></button>
                                        </form>
                                        <form action="{{ route('budget.allocations.display', $budgetAllocation  ->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" {{ $budgetAllocation->is_displayed ? 'disabled' : '' }}>
                                                {{ $budgetAllocation->is_displayed ? 'Currently Displayed' : 'Set as Display' }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Titles Section -->
            <div class="row mt-5">
                <div class="col-lg-6 d-flex justify-content-center">
                    <h3 class="createHeader" style="color: #fff;">Kuwago Two Target Sales</h3>
                </div>
                <div class="col-lg-6 d-flex justify-content-center">
                    <h3 class="createHeader" style="color: #fff;">Kuwago Two Budget Allocations</h3>
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
                                    <th>Amount</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kuwagoTwoTargets as $kuwagoTwoTarget)
                                <tr class="selectable-row" data-bs-toggle="modal" data-bs-target="#targetSaleModal" data-business-type="{{ $kuwagoTwoTarget->business_type }}" data-amount="₱{{ number_format($kuwagoTwoTarget->amount, 2) }}" data-start-date="{{ $kuwagoTwoTarget->start_date->format('Y-m-d') }}" data-end-date="{{ $kuwagoTwoTarget->end_date->format('Y-m-d') }}">
                                    <td>₱{{ number_format($kuwagoTwoTarget->amount, 2) }}</td>
                                    <td>{{ $kuwagoTwoTarget->start_date->format('Y-m-d') }}</td>
                                    <td>{{ $kuwagoTwoTarget->end_date->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('kuwago-two-target.edit', $kuwagoTwoTarget) }}" class="btn"><i class="fa-regular fa-pen-to-square editTarget"></i></a>
                                        <form action="{{ route('kuwago-two-target.destroy', $kuwagoTwoTarget) }}" method="POST" style="display: inline;">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn"><i class="fa-solid fa-trash-can deleteTarget"></i></button>
                                        </form>
                                        <form action="{{ route('kuwagotwo.target.display', $kuwagoTwoTarget  ->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" {{ $kuwagoTwoTarget->is_displayed ? 'disabled' : '' }}>
                                                {{ $kuwagoTwoTarget->is_displayed ? 'Currently Displayed' : 'Set as Display' }}
                                            </button>
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
                                    <th>Amount</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kuwagoTwoBudgets as $kuwagoTwoBudget)
                                <tr class="selectable-row" data-bs-toggle="modal" data-bs-target="#budgetAllocationModal" data-business-type="{{ $kuwagoTwoBudget->business_type }}" data-amount="₱{{ number_format($kuwagoTwoBudget->amount, 2) }}" data-start-date="{{ $kuwagoTwoBudget->start_date->format('Y-m-d') }}" data-end-date="{{ $kuwagoTwoBudget->end_date->format('Y-m-d') }}">
                                    <td>₱{{ number_format($kuwagoTwoBudget->amount, 2) }}</td>
                                    <td>{{ $kuwagoTwoBudget->start_date->format('Y-m-d') }}</td>
                                    <td>{{ $kuwagoTwoBudget->end_date->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('kuwago-two-budget.edit', $kuwagoTwoBudget) }}" class="btn"><i class="fa-regular fa-pen-to-square editTarget"></i></a>
                                        <form action="{{ route('kuwago-two-budget.destroy', $kuwagoTwoBudget) }}" method="POST" style="display: inline;">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn"><i class="fa-solid fa-trash-can deleteTarget"></i></button>
                                        </form>
                                        <form action="{{ route('kuwagotwo.budget.display', $kuwagoTwoBudget  ->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" {{ $kuwagoTwoBudget->is_displayed ? 'disabled' : '' }}>
                                                {{ $kuwagoTwoBudget->is_displayed ? 'Currently Displayed' : 'Set as Display' }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Titles Section -->
            <div class="row mt-5">
                <div class="col-lg-6 d-flex justify-content-center">
                    <h3 class="createHeader" style="color: #fff;">Uddesign Target Sales</h3>
                </div>
                <div class="col-lg-6 d-flex justify-content-center">
                    <h3 class="createHeader" style="color: #fff;">Uddesign Budget Allocations</h3>
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
                                    <th>Amount</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($uddesignTargets as $uddesignTarget)
                                <tr class="selectable-row" data-bs-toggle="modal" data-bs-target="#targetSaleModal" data-business-type="{{ $uddesignTarget->business_type }}" data-amount="₱{{ number_format($uddesignTarget->amount, 2) }}" data-start-date="{{ $uddesignTarget->start_date->format('Y-m-d') }}" data-end-date="{{ $uddesignTarget->end_date->format('Y-m-d') }}">
                                    <td>₱{{ number_format($uddesignTarget->amount, 2) }}</td>
                                    <td>{{ $uddesignTarget->start_date->format('Y-m-d') }}</td>
                                    <td>{{ $uddesignTarget->end_date->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('uddesign-target.edit', $uddesignTarget) }}" class="btn"><i class="fa-regular fa-pen-to-square editTarget"></i></a>
                                        <form action="{{ route('uddesign-target.destroy', $uddesignTarget) }}" method="POST" style="display: inline;">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn"><i class="fa-solid fa-trash-can deleteTarget"></i></button>
                                        </form>
                                        <form action="{{ route('uddesign.target.display', $uddesignTarget->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" {{ $uddesignTarget->is_displayed ? 'disabled' : '' }}>
                                                {{ $uddesignTarget->is_displayed ? 'Currently Displayed' : 'Set as Display' }}
                                            </button>
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
                                    <th>Amount</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($uddesignBudgets as $uddesignBudget)
                                <tr class="selectable-row" data-bs-toggle="modal" data-bs-target="#budgetAllocationModal" data-business-type="{{ $uddesignBudget->business_type }}" data-amount="₱{{ number_format($uddesignBudget->amount, 2) }}" data-start-date="{{ $uddesignBudget->start_date->format('Y-m-d') }}" data-end-date="{{ $uddesignBudget->end_date->format('Y-m-d') }}">
                                    <td>₱{{ number_format($uddesignBudget->amount, 2) }}</td>
                                    <td>{{ $uddesignBudget->start_date->format('Y-m-d') }}</td>
                                    <td>{{ $uddesignBudget->end_date->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('uddesign-budget.edit', $uddesignBudget) }}" class="btn"><i class="fa-regular fa-pen-to-square editTarget"></i></a>
                                        <form action="{{ route('uddesign-budget.destroy', $uddesignBudget) }}" method="POST" style="display: inline;">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn"><i class="fa-solid fa-trash-can deleteTarget"></i></button>
                                        </form>
                                        <form action="{{ route('uddesign.budget.display', $uddesignBudget->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" {{ $uddesignBudget->is_displayed ? 'disabled' : '' }}>
                                                {{ $uddesignBudget->is_displayed ? 'Currently Displayed' : 'Set as Display' }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </body>
</html>