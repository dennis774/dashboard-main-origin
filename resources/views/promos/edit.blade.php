<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Edit</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link href="{{ url('assets/css/promos.css') }}" rel="stylesheet" />
        <script src="{{ url('assets/js/chart.js') }}"></script>
        <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
        <link rel="stylesheet" href="{{ url('fontawesome/css/all.min.css') }}" />
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mt-4 d-flex justify-content-start">
                    <a href="javascript:history.back()">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                </div>
               
                <div class="col-lg-4 mt-4 d-flex justify-content-center">
                    <h2 class="mb-4" style="color: #fff;">Edit Promo</h2>
                </div>
                <div class="col-lg-4"></div>
            </div>


            <div class="row mt-5">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="container createPromo">
                        <div class="container p-2 ">
                            <form action="{{ route('promos.update', $promo->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label text-white">Promo Title:</label>
                                            <input type="text" name="title" id="title" class="form-control custom-input" value="{{ $promo->title }}" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label text-white">Promo Description:</label>
                                            <textarea name="description" id="description" class="form-control custom-input" required>{{ $promo->description }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="dishes_available" class="form-label text-white">Dishes Available:</label>
                                            <input type="text" name="dishes_available" id="dishes_available" class="form-control custom-input" value="{{ $promo->dishes_available }}"  required />
                                        </div>
                                        <div class="form-group">
                                            <label for="image" class="form-label text-white">Promo Image</label>
                                            <input type="file" name="image" id="image" class="form-control imagInput" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="sales_before" class="form-label text-white">Sales Before Promo:</label>
                                            <input type="number" name="sales_before" id="sales_before" class="form-control custom-input" value="{{ $promo->sales_before }}" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="sales_after" class="form-label text-white">Sales After Promo:</label>
                                            <input type="number" name="sales_after" id="sales_after" class="form-control custom-input" value="{{ $promo->sales_after }}" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="start_date" class="form-label text-white">Start Date:</label>
                                            <input type="date" name="start_date" id="start_date" class="form-control custom-input" value="{{ $promo->start_date }}" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="end_date" class="form-label text-white">End Date:</label>
                                            <input type="date" name="end_date" id="end_date" class="form-control custom-input" value="{{ $promo->end_date }}" required />
                                        </div>
                                    </div>
                                </div>
                       
                                <div class="row">
                                    <div class="col-lg-12 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary mt-3"><i class="fa-solid fa-folder-plus"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </body>
</html>
