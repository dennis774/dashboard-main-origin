<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Feedbacks</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- <link href="{{ url('assets/css/style.css') }}" rel="stylesheet" /> --}}
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
    div.div.ComplaintsSection {
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
    <div class="container">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-1"></div>
            <div class="col-lg-9 pt-2 pb-2 ps-0 pe-0 mt-5 feebackSection">
                <div class="container text-white text">
                    <div class="row">
                        <div class="col-lg-3 starChart">
                            <h5>Rating Distribution</h5>
                            <p class="text-center">Average Rating: {{ number_format($averageRating, 1) }}</p>
                            <canvas id="ratingChart" height="350"></canvas>
                            <div class="col-lg-12 mt-2">
                                <!-- Filter Date Button -->
                                <button class="btn filterFeedback d-flex justify-content-center align-items-center"
                                    data-bs-toggle="modal" data-bs-target="#dateFilterModal"
                                    style="width: 40px; height: 40px; border-radius: 50%;">
                                    <i class="fa-solid fa-filter" style="color: #000; font-size: 15px;"></i>
                                </button>
                            </div>

                        </div>

                        <!-- Comments Section -->
                        <div class="col-lg-3 CommentsSection" style="height: 400px; overflow-y: auto;"
                            id="commentsList">
                            <h4 class="mb-3">Comments</h4>
                            <div class="content-container">
                                @foreach ($feedback as $item)
                                    @if ($item->feedback_type == 'Comment')
                                        <div class="row align-items-center">
                                            <div class="col-lg-6">
                                                <b>{{ $item->name }}&nbsp; —</b>
                                            </div>
                                            <div class="col-lg-6 d-flex justify-content-start"
                                                style="display: flex; align-items: center;">
                                                {{ $item->dish }}
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $item->rating)
                                                        <span
                                                            style="color: gold; border-radius:10px; font-size:18px;">★</span>
                                                        <!-- Yellow filled star -->
                                                    @else
                                                        <span
                                                            style="color: lightgray; border-radius:10px; font-size:18px;">☆</span>
                                                        <!-- Gray empty star -->
                                                    @endif
                                                @endfor
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12" style="font-style: italic;">{{ $item->comments }}
                                            </div>
                                        </div>

                                        <div class="row mt-1">
                                            <div class="col-lg-12 d-flex justify-content-end" style="font-size: 12px;">
                                                {{ $item->feedback_date->format('d M Y') }}</div>
                                        </div>

                                        <hr> <!-- Optional: Add a horizontal line to separate feedback entries -->
                                    @endif
                                @endforeach
                            </div>
                        </div>


                        <!-- Suggestions Section -->
                        <div class="col-lg-3 SuggestionsSection" style="height: 400px; overflow-y: auto;"
                            id="suggestionsList">
                            <h4 class="mb-3">Suggestions</h4>
                            <div class="content-container">
                                @foreach ($feedback as $item)
                                    @if ($item->feedback_type == 'Suggestion')
                                        <div class="row align-items-center">
                                            <div class="col-lg-6">
                                                <b>{{ $item->name }}&nbsp; —</b>
                                            </div>
                                            <div class="col-lg-6 d-flex justify-content-start"
                                                style="display: flex; align-items: center;">
                                                {{ $item->dish }}
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-12">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $item->rating)
                                                        <span
                                                            style="color: gold; border-radius:10px; font-size:18px;">★</span>
                                                        <!-- Yellow filled star -->
                                                    @else
                                                        <span
                                                            style="color: lightgray; border-radius:10px; font-size:18px;">☆</span>
                                                        <!-- Gray empty star -->
                                                    @endif
                                                @endfor
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12" style="font-style: italic;">{{ $item->comments }}
                                            </div>
                                        </div>

                                        <div class="row mt-1">
                                            <div class="col-lg-12 d-flex justify-content-end" style="font-size: 12px;">
                                                {{ $item->feedback_date->format('d M Y') }}</div>
                                        </div>

                                        <hr> <!-- Optional: Add a horizontal line to separate feedback entries -->
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <!-- Complaints Section -->
                        <div class="col-lg-3 ComplaintsSection" style="height: 400px;" id="complaintsList">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4 class="mb-3">Complaints</h4>
                                </div>
                                <div class="col-lg-6 d-flex justify-content-end">
                                    <a href="{{ url('feedback/import') }}"><i
                                            class="fa-solid fa-arrows-rotate text-white text"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="content-container">
                                @foreach ($feedback as $item)
                                    @if ($item->feedback_type == 'Complaint')
                                        <div class="row align-items-center">
                                            <div class="col-lg-6">
                                                <b>{{ $item->name }}&nbsp; —</b>
                                            </div>
                                            <div class="col-lg-6 d-flex justify-content-start"
                                                style="display: flex; align-items: center;">
                                                {{ $item->dish }}
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-12">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $item->rating)
                                                        <span
                                                            style="color: gold; border-radius:10px; font-size:18px;">★</span>
                                                        <!-- Yellow filled star -->
                                                    @else
                                                        <span
                                                            style="color: lightgray; border-radius:10px; font-size:18px;">☆</span>
                                                        <!-- Gray empty star -->
                                                    @endif
                                                @endfor
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12" style="font-style: italic;">{{ $item->comments }}
                                            </div>
                                        </div>

                                        <div class="row mt-1">
                                            <div class="col-lg-12 d-flex justify-content-end" style="font-size: 12px;">
                                                {{ $item->feedback_date->format('d M Y') }}</div>
                                        </div>

                                        <hr> <!-- Optional: Add a horizontal line to separate feedback entries -->
                                    @endif
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal fade" id="dateFilterModal" tabindex="-1" aria-labelledby="dateFilterModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="dateFilterModalLabel">Filter Feedback by Date</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="dateFilterForm">
                                <div class="mb-3">
                                    <label for="start_date" class="form-label">Start Date</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="end_date" class="form-label">End Date</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date"
                                        required>
                                </div>
                                <button type="submit" class="btn btn-primary">Apply Filter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-1"></div>
        </div>
    </div>
</body>
<script>
    var ratingCounts = @json($ratingCounts);

    var ctx = document.getElementById('ratingChart').getContext('2d');

    var chart = new Chart(ctx, {
        type: 'bar', // Bar chart
        data: {
            labels: ['1', '2', '3', '4', '5'], // Y-axis labels (ratings)
            datasets: [{
                label: 'Number of Votes',
                data: [ratingCounts[1], ratingCounts[2], ratingCounts[3], ratingCounts[4], ratingCounts[
                    5]], // X-axis data (number of votes)
                backgroundColor: 'rgba(255, 223, 0, 0.6)', // Yellow color for the bars
                borderColor: 'rgba(255, 223, 0, 1)', // Yellow border for the bars
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y', // Set the index axis to 'y' for horizontal bars
            scales: {
                x: {
                    beginAtZero: true, // Start the X-axis at zero (number of votes)
                    title: {
                        display: true,
                        text: 'Number of Votes', // Label for the X-axis
                        color: 'white', // Set the X-axis title color to white
                        font: {
                            size: 14 // Font size for the X-axis title
                        }
                    },
                    ticks: {
                        color: 'white', // Set X-axis ticks to white
                        font: {
                            size: 12 // Font size for the X-axis ticks
                        }
                    },
                    grid: {
                        display: false // Remove grid lines on the X-axis
                    }
                },
                y: {
                    beginAtZero: true, // Start the Y-axis at zero (ratings)
                    title: {
                        display: true,
                        text: 'Rating', // Label for the Y-axis
                        color: 'white', // Set the Y-axis title color to white
                        font: {
                            size: 14 // Font size for the Y-axis title
                        }
                    },
                    ticks: {
                        color: 'white', // Set Y-axis ticks to white
                        font: {
                            size: 12 // Font size for the Y-axis ticks
                        }
                    },
                    grid: {
                        display: false // Remove grid lines on the Y-axis
                    }
                }
            },
            responsive: true,
            plugins: {
                legend: {
                    display: false // Hide the legend
                },
            },
            elements: {
                bar: {
                    borderWidth: 1
                }
            },
        }
    });
</script>

<script>
    document.getElementById('dateFilterForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch("{{ route('feedback.filterByDate') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Update chart data
                const chart = Chart.getChart('ratingChart'); // Assuming chart instance exists
                chart.data.datasets[0].data = [
                    data.ratingCounts[1],
                    data.ratingCounts[2],
                    data.ratingCounts[3],
                    data.ratingCounts[4],
                    data.ratingCounts[5]
                ];
                chart.update();

                // Update feedback sections
                updateSection('commentsList', data.comments);
                updateSection('suggestionsList', data.suggestions);
                updateSection('complaintsList', data.complaints);

                // Close the modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('dateFilterModal'));
                modal.hide();
            })
            .catch(error => console.error('Error:', error));
    });


    function updateSection(sectionId, items) {
        const section = document.getElementById(sectionId);
        const container = section.querySelector('.content-container');
        container.innerHTML = ''; // Clear previous content

        if (items.length === 0) {
            container.innerHTML = '<p class="text-center">No feedback found for the selected date range.</p>';
            return;
        }

        items.forEach(item => {
            container.innerHTML += `
            <div class="row align-items-center">
                <div class="col-lg-6"><b>${item.name} —</b></div>
                <div class="col-lg-6">${item.dish}</div>
            </div>
            <div class="row">
                <div class="col-lg-12">${getStars(item.rating)}</div>
            </div>
            <div class="row">
                <div class="col-lg-12" style="font-style: italic;">${item.comments}</div>
            </div>
            <div class="row mt-1">
                <div class="col-lg-12 d-flex justify-content-end" style="font-size: 12px;">
                    ${new Date(item.feedback_date).toLocaleDateString()}
                </div>
            </div>
            <hr>`;
        });
    }


    function getStars(rating) {
        let stars = '';
        for (let i = 1; i <= 5; i++) {
            stars += i <= rating ?
                '<span style="color: gold; font-size:18px;">★</span>' :
                '<span style="color: lightgray; font-size:18px;">☆</span>';
        }
        return stars;
    }
</script>



</html>


















{{-- <body>
  
    <div class="container">
        <h1>Customer Feedback</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Feedback Date</th>
                    <th>Name</th>
                    <th>Feedback Type</th>
                    <th>Dish</th>
                    <th>Comments</th>
                    <th>Rating</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($feedback as $item)
                    <tr>
                        <td>{{ $item->feedback_date->format('d M Y H:i:s') }}</td> <!-- This will now work -->
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->feedback_type }}</td>
                        <td>{{ $item->dish }}</td>
                        <td>{{ $item->comments }}</td>
                        <td>
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $item->rating)
                                    <span style="color: gold; border-radius:10px; font-size:15px;">★</span> <!-- Yellow filled star -->
                                @else
                                    <span style="color: lightgray; border-radius:10px; font-size:15px;">☆</span> <!-- Gray empty star -->
                                @endif
                            @endfor
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body> --}}
