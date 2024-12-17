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
                
                    @foreach ($promos as $key => $promo)
                    <!-- PROMO CARD -->
                    <div class="col-12 d-flex flex-column py-3 px-2 position-absolute justify-content-start align-items-center carouselItem carouselItem-{{ $key+1 }}" data-promocard-id="{{ $promo->id }}" style="width:25%; height:78%;">
                        <!-- PROMO NAME -->
                        <div class="row d-flex w-100 justify-content-center">
                            
                            <div class="col d-flex align-items-center justify-content-center">
                                <span class="text-black uddeals-panel-text">{{ $promo->title }}</span>
                            </div>
                            
                        </div>

                        <!-- PROMO DURATION -->
                        <div class="row d-flex w-100 justify-content-center">
                            <span class="text-black promo-date-text">
                                {{ \Carbon\Carbon::parse($promo->start_date)->format('M. j, Y') }} - {{ \Carbon\Carbon::parse($promo->end_date)->format('M. j, Y') }}
                            </span>
                        </div>

                        <!-- PROMO CHART -->
                        <div class="row d-flex w-100 justify-content-center align-items-center" style="height: 8%;">
                            {{-- <span class="text-black">HALF DONUT</span> --}}
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
            <div class="row d-flex ps-2 pe-3 align-items-center" style="height: 90%;">
                <div class="row d-flex w-100 h-100 ps-4 align-items-center justify-content-evenly overflow-y-scroll">
                    {{-- NOT FOUND --}}
                    {{-- <span class="text-white-50 fst-italic fw-light uddesign-fields-text">
                        No deals found.
                    </span> --}}
                    <ol class="col d-flex flex-column h-100 p-0 m-0 align-items-start justify-content-start ">
    
                        @foreach ($promos as $key => $promo)
                        <li class="ps-1 mb-1" style="font-family: Poppins; font-size: 0.75rem;" style="list-style-type: decimal;">
                            <a href="#" class="d-flex text-white text-start text-decoration-underline uddesign-side-text promo-link" data-promo-id="{{ $promo->id }}" style="font-size: 0.75rem;">
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

