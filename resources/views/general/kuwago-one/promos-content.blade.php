<!-- DASHBOARD PANEL -->
<div class="d-flex rounded-4 dashboard-panel">
    <div class="row d-flex flex-grow-1 m-0 column-gap-3 h-100 rounded-4 justify-content-center align-items-center text-white " style="padding-inline: 2%; padding-block: 2.5%;">

        <!-- LEFT COLUMN -->
        <div class="col-auto d-flex flex-column row-gap-3 p-0 h-100" style="width: 74%;">

            <div class="col-12 d-flex justify-content-center align-items-center h-100 w-100">
                <div class="col">
                    <!-- PREV BUTTON -->
                    <button class="btn d-flex justify-content-center align-items-center carousel-controls" id="prev-button" type="button" style="padding: 0;">
                        <ion-icon name="chevron-back-outline" class="text-white fs-4"></ion-icon>
                    </button>

                </div>

                <div class="col-auto d-flex justify-content-center align-items-center h-100" id="carousel-container" style="width: 90%;">
                    {{-- ADD PROMO --}}
                    <div class="position-absolute top-0 end-0 p-3" style="z-index: 10;">
                        <a href="{{ route('promos.create') }}" class="btn">
                            <i class="fa-solid fa-plus" style="font-size: 1.5em; color: white;"></i>
                        </a>
                    </div>

                    @foreach ($promos as $key => $promo)
                    <!-- PROMO CARD -->
                    <div class="col-12 d-flex flex-column py-3 px-2 position-absolute justify-content-start align-items-center carouselItem carouselItem-{{ $key+1 }}" data-promocard-id="{{ $promo->id }}" style="width:25%; height:78%;">
                        <!-- PROMO NAME -->
                        <div class="row d-flex w-100 justify-content-center">
                            <div class="col-1 p-0">
                                <a href="{{ route('promos.edit', $promo->id) }}" class="btn p-0" style="color: #fff;">
                                    <i class="fa-regular fa-pen-to-square" style="color: #422f0a;"></i>
                                </a>
                            </div>
                            <div class="col d-flex align-items-center justify-content-center">
                                <span class="text-black uddeals-panel-text">{{ $promo->title }}</span>
                            </div>
                            <div class="col-1 p-0">
                                <form action="{{ route('promos.destroy', $promo->id) }}" method="POST" style="display: inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn p-0" style="color: #fff;">
                                        <i class="fa-regular fa-trash-can" style="color: #422f0a;"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- PROMO DURATION -->
                        <div class="row d-flex w-100 justify-content-center">
                            <span class="text-black promo-date-text">
                                {{ \Carbon\Carbon::parse($promo->start_date)->format('M. j, Y') }} - {{ \Carbon\Carbon::parse($promo->end_date)->format('M. j, Y') }}
                            </span>
                        </div>

                        <!-- PROMO CHART -->
                        <div class="row d-flex w-100 justify-content-center align-items-center" style="height: 30%;">
                            <span class="text-black">HALF DONUT</span>
                        </div>

                        <!-- PROMO CHART DETAILS -->
                        <div class="row d-flex w-100 justify-content-center">
                            <span class="fw-bold promo-date-text" style="font-size: 0.85rem;">Sales Impact</span>
                            <span class="promo-date-text">Sales Before: {{ $promo->sales_before }}</span>
                            <span class="lh-1 promo-date-text">Sales After: {{ $promo->sales_after }}</span>
                        </div>

                        <!-- PROMO DESCRIPTION -->
                        <div class="row d-flex w-100 mt-3 mb-3 justify-content-center align-items-center">
                            <span class="promo-date-text" style="text-align:justify; text-justify:inter-word;">
                                {{ $promo->description }}
                            </span>
                        </div>

                        <!-- PROMO PRODUCTS -->
                        <div class="row d-flex w-100 justify-content-center">
                            <span class="text-start fw-bold promo-date-text" style="font-size: 0.7rem;">Eligible Products</span>
                        </div>
                        <div class="row d-flex w-100 justify-content-center overflow-y-scroll weather-column">
                            <span class="text-start promo-date-text">{{ $promo->dishes_available }}</span>

                        </div>
                            
                    </div>
                    <!-- END PROMO CARD -->
                    @endforeach

                </div>

                <div class="col d-flex align-items-center justify-content-end">
                    <!-- NEXT BUTTON -->
                    <button class="btn d-flex justify-content-center align-items-center" id="next-button" type="button" style="padding: 0;">
                        <ion-icon name="chevron-forward-outline" class="text-white fs-4"></ion-icon>
                    </button>
                </div>
            </div>

        </div>
        <!-- END LEFT COLUMN -->

        <!-- LINE -->
        <div class="vr p-0 text-white opacity-75 align-self-center" style="width: 1px; min-height: 80%;"></div>

        <!-- RIGHT COLUMN -->
        <div class="col d-flex flex-column row-gap-3 p-0 h-100">
            <!-- PROMOS LIST CARD-->
            <div class="col-12 d-flex ps-1 justify-content-start">
                <span class="uddesign-side-text" style="font-size: 1rem;">List of Promos</span>
            </div>
            <div class="row d-flex ps-2 pe-3 align-items-center h-100">
                <div class="row d-flex w-100 h-100 ps-4 align-items-center justify-content-evenly overflow-y-scroll">
                    {{-- NOT FOUND --}}
                    {{-- <span class="text-white-50 fst-italic fw-light uddesign-fields-text">
                        No deals found.
                    </span> --}}
                    <ol class="col d-flex flex-column h-100 p-0 m-0 align-items-start justify-content-start ">
    
                        @foreach ($promos as $key => $promo)
                        <li class="ps-1 mb-1" style="font-family: Poppins; font-size: 0.85rem;" style="list-style-type: decimal;">
                            <a href="#" class="d-flex text-white text-start text-decoration-underline uddesign-side-text promo-link" data-promo-id="{{ $promo->id }}" style="font-size: 0.85rem;">
                                {{  $promo->title  }}
                            </a>
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
        <!-- END RIGHT COLUMN -->
    </div>
</div>

<script>
   const carouselContainer = document.getElementById('carousel-container');
const previousButton = document.getElementById('prev-button');
const nextButton = document.getElementById('next-button');
const carouselItems = document.querySelectorAll('.carouselItem');
const links = document.querySelectorAll(".promo-link");

class Carousel {

    constructor(container, items) {
        this.carouselContainer = container;
        this.carouselArray = [...items]; // Initialize the array
    }

    updateCarousel() {
        this.carouselArray.forEach(el => {
            const classes = [...el.classList]; // Get all current classes
            classes.forEach(cls => {
                if (cls.startsWith('carouselItem-')) {
                    el.classList.remove(cls); // Remove any class that starts with 'carouselItem-'
                }
            });
        });
        const visibleItems = Math.min(this.carouselArray.length, 6);
        this.carouselArray.slice(0, visibleItems).forEach((el, i) => {
            el.classList.add(`carouselItem-${i + 1}`);
        });
    }

    setCurrentState(direction) {
        if (direction === 'previous') {
            this.carouselArray.unshift(this.carouselArray.pop());
        } else {
            this.carouselArray.push(this.carouselArray.shift());
        }
        this.updateCarousel();
    }

    useControls(previousBtn, nextBtn) {
        previousBtn.addEventListener('click', () => {
            this.setCurrentState('previous');
        });

        nextBtn.addEventListener('click', () => {
            this.setCurrentState('next');
        });
    }
}
    
const promoCarousel = new Carousel(carouselContainer, carouselItems);
promoCarousel.useControls(previousButton, nextButton);
promoCarousel.updateCarousel();

// Add click event listeners for each promo link
links.forEach(link => {
    link.addEventListener('click', function(event) {
        event.preventDefault();

        const promoId = event.target.getAttribute('data-promo-id');
        const targetCard = Array.from(carouselItems).find(item => item.getAttribute('data-promocard-id') === promoId);

        console.log('id: ' + promoId);
        console.log(targetCard);

        if (targetCard) {
            // Shift the carousel items until the targetCard is at the front
            while (promoCarousel.carouselArray[0] !== targetCard) {
                // Shift the first item to the end of the array
                promoCarousel.carouselArray.push(promoCarousel.carouselArray.shift());
                promoCarousel.updateCarousel();
            }
        }
    });
});

</script>









<?php /*
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

        <div class="col-lg-9 kuwago1Promos">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mt-2 mb-2">
                        @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <!-- Carousel Container with Peeking Effect -->
                        <div class="carousel-container position-relative">
                            <div id="promoCarousel" class="carousel slide" data-bs-ride="carousel">
                                <!-- Add Promo Icon -->
                                <div class="position-absolute top-0 end-0 p-3" style="z-index: 10;">
                                    <a href="{{ route('promos.create') }}" class="btn">
                                        <i class="fa-solid fa-plus" style="font-size: 1.5em; color: white;"></i>
                                    </a>
                                </div>

                                <div class="carousel-inner">
                                    @foreach ($promos as $key => $promo)
                                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                        <div class="card w-100" style="background-color: #c68e17; color: white;">
                                            @if ($promo->promo_image)
                                            <img src="{{ asset('storage/' . $promo->promo_image) }}" class="card-img-top img-fluid promoImage" alt="Promo Image" />
                                            @else
                                            <img src="https://via.placeholder.com/600x300" class="card-img-top img-fluid promoImage" alt="Placeholder Image" />
                                            @endif
                                            <div class="card-body">
                                                <h4 class="card-title d-flex justify-content-center scrollable-title">{{ $promo->title }}</h4>
                                                <p class="card-text d-flex justify-content-center">
                                                    <small>
                                                        {{ \Carbon\Carbon::parse($promo->start_date)->format('M. j, Y') }} - {{ \Carbon\Carbon::parse($promo->end_date)->format('M. j, Y') }}
                                                    </small>
                                                </p>
                                                <p class="card-text d-flex justify-content-center align-items-center" style="margin-bottom: 5px;">
                                                    Sales Before:&nbsp{{ $promo->sales_before }}
                                                </p>
                                                <p class="card-text d-flex justify-content-center align-items-center" style="margin-bottom: 5px;">
                                                    Sales After:&nbsp{{ $promo->sales_after }}
                                                </p>

                                                <div class="scrollable-description mt-2">
                                                    <p class="card-text" style="font-size: 12px;">{{ $promo->description }}</p>
                                                </div>

                                                <div class="scrollable-dish">
                                                    <p class="card-text mt-3"><strong>Dishes Available: </strong>{{ $promo->dishes_available }}</p>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="col-lg-6 d-flex justify-content-start">
                                                        <a href="{{ route('promos.edit', $promo->id) }}" class="btn" style="color: #fff;">
                                                            <i class="fa-regular fa-pen-to-square"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-6 d-flex justify-content-end">
                                                        <form action="{{ route('promos.destroy', $promo->id) }}" method="POST" style="display: inline;">
                                                            @csrf @method('DELETE')
                                                            <button type="submit" class="btn" style="color: #fff;">
                                                                <i class="fa-regular fa-trash-can"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#promoCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#promoCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <!-- Title Above the List -->
                        <h3 class="mb-3" style="color: white;">Promo List</h3>

                        <!-- Promo List with Bullets, Transparent Background, White Text, No Borders, and Scrollable Area -->
                        <ul class="list-group" style="background-color: transparent; max-height: 400px; overflow-y: auto; list-style-type: disc; padding-left: 20px;">
                            @foreach ($promos as $key => $promo)
                            <li
                                class="list-group-item list-group-item-action promo-list-item"
                                data-bs-target="#promoCarousel"
                                data-bs-slide-to="{{ $key }}"
                                style="cursor: pointer; background-color: transparent; color: white; border: none;">
                                •&nbsp{{ $promo->title }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-1"></div>
    </div>
</div>
*/ ?>