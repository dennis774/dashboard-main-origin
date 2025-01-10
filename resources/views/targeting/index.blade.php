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
        --}} {{-- GOOGLE FONT - POPPINS --}}
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />

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
                            <li><a class="dropdown-item" href="{{ route('targeting.create') }}">Kuwago Two Create Target Sales</a></li>
                            <li><a class="dropdown-item" href="{{ route('budgeting.create') }}">Kuwago Two Create Budget Allocation</a></li>
                            <li><a class="dropdown-item" href="{{ route('targetUdd.create') }}">Uddesign Create Target Sales</a></li>
                            <li><a class="dropdown-item" href="{{ route('budgetUdd.create') }}">Uddesign Create Budget Allocation</a></li>
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
                                    <th>Amount</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($targetings as $targeting)
                                <tr
                                    class="selectable-row"
                                    data-bs-toggle="modal"
                                    data-bs-target="#targetSaleModal"
                                    data-business-type="{{ $targeting->business_type }}"
                                    data-amount="₱{{ number_format($targeting->amount, 2) }}"
                                    data-start-date="{{ $targeting->start_date->format('Y-m-d') }}"
                                    data-end-date="{{ $targeting->end_date->format('Y-m-d') }}"
                                >
                                    <td>₱{{ number_format($targeting->amount, 2) }}</td>
                                    <td>{{ $targeting->start_date->format('Y-m-d') }}</td>
                                    <td>{{ $targeting->end_date->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('targeting.edit', $targeting) }}" class="btn"><i class="fa-regular fa-pen-to-square editTarget"></i></a>
                                        <form action="{{ route('targeting.destroy', $targeting) }}" method="POST" style="display: inline;">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn"><i class="fa-solid fa-trash-can deleteTarget"></i></button>
                                        </form>
                                        <form action="{{ route('targeting.display', $targeting->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" {{ $targeting->is_displayed ? 'disabled' : '' }}> {{ $targeting->is_displayed ? 'Currently Displayed' : 'Set as Display' }}</button>
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
                                @foreach($budgetings as $budgeting)
                                <tr
                                    class="selectable-row"
                                    data-bs-toggle="modal"
                                    data-bs-target="#budgetAllocationModal"
                                    data-business-type="{{ $budgeting->business_type }}"
                                    data-amount="₱{{ number_format($budgeting->amount, 2) }}"
                                    data-start-date="{{ $budgeting->start_date->format('Y-m-d') }}"
                                    data-end-date="{{ $budgeting->end_date->format('Y-m-d') }}"
                                >
                                    <td>₱{{ number_format($budgeting->amount, 2) }}</td>
                                    <td>{{ $budgeting->start_date->format('Y-m-d') }}</td>
                                    <td>{{ $budgeting->end_date->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('budgeting.edit', $budgeting) }}" class="btn"><i class="fa-regular fa-pen-to-square editTarget"></i></a>
                                        <form action="{{ route('budgeting.destroy', $budgeting) }}" method="POST" style="display: inline;">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn"><i class="fa-solid fa-trash-can deleteTarget"></i></button>
                                        </form>
                                        <form action="{{ route('budgeting.display', $budgeting->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" {{ $budgeting->is_displayed ? 'disabled' : '' }}> {{ $budgeting->is_displayed ? 'Currently Displayed' : 'Set as Display' }}</button>
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
                                @foreach($targetUdds as $targetUdd)
                                <tr
                                    class="selectable-row"
                                    data-bs-toggle="modal"
                                    data-bs-target="#targetSaleModal"
                                    data-business-type="{{ $targetUdd->business_type }}"
                                    data-amount="₱{{ number_format($targetUdd->amount, 2) }}"
                                    data-start-date="{{ $targetUdd->start_date->format('Y-m-d') }}"
                                    data-end-date="{{ $targetUdd->end_date->format('Y-m-d') }}"
                                >
                                    <td>₱{{ number_format($targetUdd->amount, 2) }}</td>
                                    <td>{{ $targetUdd->start_date->format('Y-m-d') }}</td>
                                    <td>{{ $targetUdd->end_date->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('targetUdd.edit', $targetUdd) }}" class="btn"><i class="fa-regular fa-pen-to-square editTarget"></i></a>
                                        <form action="{{ route('targetUdd.destroy', $targetUdd) }}" method="POST" style="display: inline;">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn"><i class="fa-solid fa-trash-can deleteTarget"></i></button>
                                        </form>
                                        <form action="{{ route('targetUdd.display', $targetUdd->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" {{ $targetUdd->is_displayed ? 'disabled' : '' }}> {{ $targetUdd->is_displayed ? 'Currently Displayed' : 'Set as Display' }}</button>
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
                                @foreach($budgetUdds as $budgetUdd)
                                <tr
                                    class="selectable-row"
                                    data-bs-toggle="modal"
                                    data-bs-target="#budgetAllocationModal"
                                    data-business-type="{{ $budgetUdd->business_type }}"
                                    data-amount="₱{{ number_format($budgetUdd->amount, 2) }}"
                                    data-start-date="{{ $budgetUdd->start_date->format('Y-m-d') }}"
                                    data-end-date="{{ $budgetUdd->end_date->format('Y-m-d') }}"
                                >
                                    <td>₱{{ number_format($budgetUdd->amount, 2) }}</td>
                                    <td>{{ $budgetUdd->start_date->format('Y-m-d') }}</td>
                                    <td>{{ $budgetUdd->end_date->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('budgetUdd.edit', $budgetUdd) }}" class="btn"><i class="fa-regular fa-pen-to-square editTarget"></i></a>
                                        <form action="{{ route('budgetUdd.destroy', $budgetUdd) }}" method="POST" style="display: inline;">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn"><i class="fa-solid fa-trash-can deleteTarget"></i></button>
                                        </form>
                                        <form action="{{ route('budgetUdd.display', $budgetUdd->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" {{ $budgetUdd->is_displayed ? 'disabled' : '' }}> {{ $budgetUdd->is_displayed ? 'Currently Displayed' : 'Set as Display' }}</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
