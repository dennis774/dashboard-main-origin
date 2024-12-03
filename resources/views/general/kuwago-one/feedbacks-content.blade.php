<div class="container content-container">
    <div class="row mb-5">
        <div class="col-lg-1"></div>
        <div class="col-lg-1">
            <div class="container">
                <div class="row">
                    @include('general.kuwago-one.sidebar')
                </div>
            </div>
        </div>

        <div class="col-lg-9 pt-2 pb-2 ps-0 pe-0 feebackSection">
            <div class="container text-white text">
                <div class="row">
                    <div class="col-lg-3 starChart">
                        <h5>Rating Distribution</h5>
                        <p class="text-center">Average Rating: <span
                                id="averageRating">{{ number_format($averageRating, 1) }}</span></p> <canvas
                            id="ratingChart" height="350"></canvas>
                        <div class="col-lg-12 mt-2">
                            <!-- Filter Date Button -->
                            <div class="row">
                                <div class="col-lg-3">
                                    <button class="btn filterFeedback d-flex justify-content-center align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#dateFilterModal"
                                        style="width: 40px; height: 40px; border-radius: 50%;">
                                        <i class="fa-solid fa-filter" style="color: #000; font-size: 15px;"></i>
                                    </button>
                                </div>
                                <div class="col-lg-8 d-flex justify-content-center align-items-center"
                                    style="background: #fff; border-radius:10px;">
                                    <span id="dateRangeDisplay" style="font-size: 14px; color:#000;">No filter
                                        applied</span>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>

                        </div>

                    </div>

                    <!-- Comments Section -->
                    <div class="col-lg-3 CommentsSection" style="height: 450px; overflow-y: auto;" id="commentsList">
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
                                        <div class="col-lg-12 d-flex justify-content-start" style="font-style: italic;">
                                            {{ $item->comments }}
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
                    <div class="col-lg-3 SuggestionsSection" style="height: 450px; overflow-y: auto;"
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
                                        <div class="col-lg-12 d-flex justify-content-start" style="font-style: italic;">
                                            {{ $item->comments }}
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
                    <div class="col-lg-3 ComplaintsSection" style="height: 450px; overflow-y: auto;"
                        id="complaintsList">
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
                                        <div class="col-lg-12 d-flex justify-content-start" style="font-style: italic;">
                                            {{ $item->comments }}
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
                                <input type="date" class="form-control" id="end_date" name="end_date" required>
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
        const startDate = formData.get('start_date');
        const endDate = formData.get('end_date');

        fetch("{{ route('feedback.filterByDate') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const averageRatingElement = document.getElementById('averageRating');
                averageRatingElement.textContent = data.averageRating ? data.averageRating.toFixed(1) :
                    'N/A';

                // Update chart data if available
                const chart = Chart.getChart('ratingChart');
                chart.data.datasets[0].data = data.ratingCounts || [0, 0, 0, 0, 0];
                chart.update();

                // Update feedback sections
                updateSection('commentsList', data.comments || []);
                updateSection('suggestionsList', data.suggestions || []);
                updateSection('complaintsList', data.complaints || []);

                // Update date range display
                const dateRangeDisplay = document.getElementById('dateRangeDisplay');
                dateRangeDisplay.textContent = data.comments.length || data.suggestions.length || data
                    .complaints.length ?
                    `Filtered: ${formatDate(startDate)} to ${formatDate(endDate)}` :
                    'No feedback found for the selected date range.';

                // Hide the modal
                const modalElement = document.getElementById('dateFilterModal');
                const modal = bootstrap.Modal.getOrCreateInstance(modalElement);
                modal.hide();
            })
            .catch(error => console.error('Error:', error));
    });


    // Helper function to format the date as a readable string
    function formatDate(dateString) {
        const options = {
            year: 'numeric',
            month: 'short',
            day: 'numeric'
        };
        return new Date(dateString).toLocaleDateString(undefined, options);
    }

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
