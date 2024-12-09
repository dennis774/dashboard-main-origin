<!-- DASHBOARD PANEL -->
<div class="d-flex rounded-4 dashboard-panel">
    <div class="row d-flex flex-grow-1 m-0 h-100 rounded-4 justify-content-center align-items-center text-white " style="padding-inline: 3%; padding-block: 2.5%;">

        <!-- OVERALL RATING COLUMN -->
        <div class="col-auto d-flex ps-1 pe-3 py-3 h-100" style="width: 23%;">
            <div class="col pe-2">
                <div class="d-flex flex-column rounded-4 h-100 main-dashboard-tile">
                    <div class="row d-flex pt-3 w-100 align-items-center justify-content-center" style="height: 10%;">
                        <span class="promo-title">Overall Rating:</span>
                    </div>
                    <!-- STAR CHART -->
                    <div class="d-flex align-items-center justify-content-center">
                        <span class="z-3 mt-4 position-absolute feedback-rating-text">{{ number_format($averageRating, 1) }}</span>
                        <span class="star" style="font-size:15rem;">★</span>
                    </div>
                    <div class="row d-flex w-100 pt-2 align-items-center justify-content-center" style="height: 10%;">
                        <span style="font-family:Helvetica Now Text; font-size: clamp(0.75rem, 1.6vw, 0.85rem); letter-spacing: 1px;">Based on {{ $votes }} reviews</span>
                    </div>
                    <!-- BAR CHART -->
                    <div class="row d-flex align-items-center justify-content-center" style="height: 80%;">
                    </span></p> <canvas id="ratingChart" height="350"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- END OVERALL RATING COLUMN -->

        <!-- COMMENTS COLUMN -->
        <div class="col-auto d-flex p-0 ps-1 h-100" style="width: 24.5%;">
            <div class="col pt-2 pb-3">
                <div class="d-flex flex-column rounded-4 h-100">
                    <div class="row d-flex w-100 pb-3 text-start justify-content-center" style="height: 10%;">
                        <span class="promo-title">Comments:</span>
                    </div>
                    <!-- COMMENT TITLE AND CONTENT -->
                    <div class="row d-flex pe-4 flex-grow-1 w-100 align-self-center align-items-start justify-content-center overflow-y-scroll feedback-column">
                        @if ($feedback->filter(fn($item) => in_array($item->feedback_type, ['Comment']))->isEmpty())
                            <div class="d-flex flex-grow-1 h-100 align-items-center justify-content-center px-2 pb-1 w-100"> 
                               <span class="fst-italic fw-light">No comments found.</span> 
                            </div>
                        @else
                            @foreach ($feedback as $item)
                                @if ($item->feedback_type == 'Comment')
                                <div class="col-12 d-flex flex-column px-2 pb-1 w-100">
                                    <span class="fw-bold text-start" style="font-family: Helvetica Now Text; font-size: clamp(0.75rem, 1.6vw, 0.85rem); letter-spacing:1px;">
                                        {{ $item->name }} - {{ $item->dish }}
                                    </span>
                                    <span class="d-block text-wrap ps-3 text-white" style="text-align:justify; font-family: Helvetica Now Text; font-size: clamp(0.5rem, 1.6vw, 0.65rem); letter-spacing:1px;">
                                        {{ $item->comments }}
                                    </span>
                                    <span class="text-white fst-italic fw-medium text-end" style="font-family: Helvetica Now Text; font-size: clamp(0.5rem, 1.6vw, 0.65rem); letter-spacing:1px;">
                                        {{ $item->feedback_date->format('d M Y') }}
                                    </span>
                                </div>
                                {{-- <hr class="mb-1"> --}}
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- END COMMENTS COLUMN -->

        <!-- LINE -->
        <div class="vr p-0 text-white opacity-75 position-absolute align-self-center" style="width: 0.75px; min-height: 75%; left: 47.5%; margin-top: 35px; z-index:-1;"></div>

        <!-- SUGGESTIONS COLUMN -->
        <div class="col-auto d-flex p-0 ps-3 h-100" style="width: 26%;">
            <div class="col ps-1 pt-2 pb-3">
                <div class="d-flex flex-column rounded-4 h-100">
                    <div class="row d-flex w-100 pb-3 text-start justify-content-center" style="height: 10%;">
                        <span class="promo-title">Suggestions:</span>
                    </div>
                    <!-- SUGGESTION TITLE AND CONTENT -->
                    <div class="row d-flex pe-4 flex-grow-1 w-100 align-self-center align-items-start justify-content-center overflow-y-scroll feedback-column">
                        @if ($feedback->filter(fn($item) => in_array($item->feedback_type, ['Suggestion']))->isEmpty())
                            <div class="d-flex flex-grow-1 h-100 align-items-center justify-content-center px-2 pb-1 w-100"> 
                               <span class="fst-italic fw-light">No suggestions found.</span> 
                            </div>
                        @else
                            @foreach ($feedback as $item)
                                @if ($item->feedback_type == 'Suggestion')
                                <div class="col-12 d-flex flex-column px-2 pb-1 w-100">
                                    <span class="fw-bold text-start" style="font-family: Helvetica Now Text; font-size: clamp(0.75rem, 1.6vw, 0.85rem); letter-spacing:1px;">
                                        {{ $item->name }} - {{ $item->dish }}
                                    </span>
                                    <span class="d-block text-wrap ps-3 text-white" style="text-align:justify; font-family: Helvetica Now Text; font-size: clamp(0.5rem, 1.6vw, 0.65rem); letter-spacing:1px;">
                                        {{ $item->comments }}
                                    </span>
                                    <span class="text-white fst-italic fw-medium text-end" style="font-family: Helvetica Now Text; font-size: clamp(0.5rem, 1.6vw, 0.65rem); letter-spacing:1px;">
                                        {{ $item->feedback_date->format('d M Y') }}
                                    </span>
                                </div>
                                {{-- <hr class="mb-1"> --}}
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- END SUGGESTIONS COLUMN -->

        <!-- LINE -->
        <div class="vr p-0 text-white opacity-75 position-absolute align-self-center" style="width: 0.75px; min-height: 75%; right: 28%; margin-top: 40px; z-index:-1;"></div>


        <!-- COMPLAINTS COLUMN -->
        <div class="col-auto d-flex p-0 ps-3 h-100" style="width: 25.5%;">
            <div class="col ps-1 pt-2 pb-3">
                <div class="d-flex flex-column rounded-4 h-100">
                    <div class="row d-flex w-100 pb-3 text-start justify-content-center" style="height: 10%;">
                        <span class="promo-title">Complaints:</span>
                    </div>
                    <!-- COMPLAINTS TITLE AND CONTENT -->
                    <div class="row d-flex pe-4 w-100 flex-grow-1 align-self-center align-items-start justify-content-center overflow-y-scroll feedback-column">
                        @if ($feedback->filter(fn($item) => in_array($item->feedback_type, ['Complaint']))->isEmpty())
                            <div class="d-flex flex-grow-1 h-100 align-items-center justify-content-center px-2 pb-1 w-100"> 
                               <span class="fst-italic fw-light">No complaints found.</span> 
                            </div>
                        @else
                            @foreach ($feedback as $item)
                                @if ($item->feedback_type == 'Complaint')
                                <div class="col-12 d-flex flex-column px-2 pb-1 w-100">
                                    <span class="fw-bold text-start" style="font-family: Helvetica Now Text; font-size: clamp(0.75rem, 1.6vw, 0.85rem); letter-spacing:1px;">
                                        {{ $item->name }} - {{ $item->dish }}
                                    </span>
                                    <span class="d-block text-wrap ps-3 text-white" style="text-align:justify; font-family: Helvetica Now Text; font-size: clamp(0.5rem, 1.6vw, 0.65rem); letter-spacing:1px;">
                                        {{ $item->comments }}
                                    </span>
                                    <span class="text-white fst-italic fw-medium text-end" style="font-family: Helvetica Now Text; font-size: clamp(0.5rem, 1.6vw, 0.65rem); letter-spacing:1px;">
                                        {{ $item->feedback_date->format('d M Y') }}
                                    </span>
                                </div>
                                {{-- <hr class="mb-1"> --}}
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- END COMPLAINTS COLUMN -->

        <!-- LINE -->
        <div class="vr p-0 text-white opacity-75 position-absolute align-self-center" style="width: 0.75px; min-height: 75%; right:4%; margin-top: 35px; z-index:-1;"></div>



    </div>
</div>


<!-- SCRIPT FOR CHANGING FEEDBACK RATING AND STAR CHART FILL KUWAGO ONE-->
<script>
    const feedbackRating = {{ $averageRating ? number_format($averageRating, 1) : 'null'}};
    const starRating = document.querySelector('.feedback-rating-text-1');
    const starChart = document.querySelector('.star-1');

    const ratingPercentage = 100 - ((feedbackRating / 5) * 100);

    starChart.style.setProperty('--inset-value', `inset(0 ${ratingPercentage}% 0 0)`);
    starRating.textContent = feedbackRating.toFixed(1).toString();
</script>


<!-- SCRIPT FOR FEEDBACKS DATE FILTER -->
<script>
    document.getElementById('feedbacks-form').addEventListener('submit', function(e) {
        e.preventDefault();

        console.log("Feedback!!");

        const formData = new FormData(this);
        const startDate = formData.get('start_date');
        const endDate = formData.get('end_date');
        const dateRangeDisplay = document.getElementById('date-filter-dropdown');
        dateRangeDisplay.textContent = `${formatDate(startDate)} to ${formatDate(endDate)}`;

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
                if (chart) {
                    chart.data.datasets[0].data = data.ratingCounts || [0, 0, 0, 0, 0];
                    chart.update();
                }

                // Update feedback sections
                updateSection('commentsList', data.comments || []);
                updateSection('suggestionsList', data.suggestions || []);
                updateSection('complaintsList', data.complaints || []);

                // // Update date range display
                // const dateRangeDisplay = document.getElementById('date-filter-dropdown');
                // dateRangeDisplay.textContent = data.comments.length || data.suggestions.length || data
                //     .complaints.length ?
                //     `Filtered: ${formatDate(startDate)} to ${formatDate(endDate)}` :
                //     'No feedback found for the selected date range.';

                // Hide the modal
                const modalElement = document.getElementById('feedbacks-date-modal');
                const modal = bootstrap.Modal.getOrCreateInstance(modalElement);
                modal.hide();
            })
            .catch(error => console.error('Error:', error));
            console.log("FEEDBACK DONE!");

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

