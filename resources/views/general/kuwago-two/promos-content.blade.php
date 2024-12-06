<div class="container content-container">
    <div class="row mb-5">
        <div class="col-lg-1"></div>
        <div class="col-lg-1">
            <div class="container">
                <div class="row">
                    @include('general.kuwago-two.sidebar')
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
                                                    <img src="{{ asset('storage/' . $promo->promo_image) }}"
                                                        class="card-img-top img-fluid promoImage" alt="Promo Image" />
                                                @else
                                                    <img src="https://via.placeholder.com/600x300"
                                                        class="card-img-top img-fluid promoImage"
                                                        alt="Placeholder Image" />
                                                @endif

                                                <div class="card-body">
                                                    <h4
                                                        class="card-title d-flex justify-content-center scrollable-title">
                                                        {{ $promo->title }}</h4>
                                                    <p class="card-text d-flex justify-content-center">
                                                        <small>
                                                            {{ \Carbon\Carbon::parse($promo->start_date)->format('M. j, Y') }}
                                                            -
                                                            {{ \Carbon\Carbon::parse($promo->end_date)->format('M. j, Y') }}
                                                        </small>
                                                    </p>
                                                    <p class="card-text d-flex justify-content-center align-items-center"
                                                        style="margin-bottom: 5px;">
                                                        Sales Before:&nbsp{{ $promo->sales_before }}
                                                    </p>
                                                    <p class="card-text d-flex justify-content-center align-items-center"
                                                        style="margin-bottom: 5px;">
                                                        Sales After:&nbsp{{ $promo->sales_after }}
                                                    </p>

                                                    <div class="scrollable-description mt-2">
                                                        <p class="card-text" style="font-size: 12px;">
                                                            {{ $promo->description }}</p>
                                                    </div>

                                                    <div class="scrollable-dish">
                                                        <p class="card-text mt-3"><strong>Dishes Available:
                                                            </strong>{{ $promo->dishes_available }}</p>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="row">
                                                        <div class="col-lg-6 d-flex justify-content-start">
                                                            <a href="{{ route('promos.edit', $promo->id) }}"
                                                                class="btn" style="color: #fff;">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-6 d-flex justify-content-end">
                                                            <form action="{{ route('promos.destroy', $promo->id) }}"
                                                                method="POST" style="display: inline;">
                                                                @csrf @method('DELETE')
                                                                <button type="submit" class="btn"
                                                                    style="color: #fff;">
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

                                <button class="carousel-control-prev" type="button" data-bs-target="#promoCarousel"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#promoCarousel"
                                    data-bs-slide="next">
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
                        <ul class="list-group"
                            style="background-color: transparent; max-height: 400px; overflow-y: auto; list-style-type: disc; padding-left: 20px;">
                            @foreach ($promos as $key => $promo)
                                <li class="list-group-item list-group-item-action promo-list-item"
                                    data-bs-target="#promoCarousel" data-bs-slide-to="{{ $key }}"
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
