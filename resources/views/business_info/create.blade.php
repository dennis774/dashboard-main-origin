

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container">
                    <h1 class="text-center mb-4">Create New Business</h1>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ url('business') }}" enctype="multipart/form-data"> 
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label for="business_name">Business Name</label>
                            <input type="text" class="form-control" name="business_name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="business_image">Business Image</label>
                            <input type="file" class="form-control" name="business_image" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="business_logo">Business Logo</label>
                            <input type="file" class="form-control" name="business_logo" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="year">Year</label>
                            <input type="text" class="form-control" name="year" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="business_type">Type of Business</label>
                            <input type="text" class="form-control" name="business_type" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" name="location" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Create Business</button>
                        </div>
                    </form>
                </div>
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
    </div> --}}
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <meta http-equiv="X-UA-Compatible" content="ie=edge" />
            <title>Manage Businesses</title>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <link href="{{ url('assets/css/style.css') }}" rel="stylesheet" />
            <script src="{{ url('assets/js/chart.js') }}"></script>
            <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
            <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
            <link rel="stylesheet" href="{{url('fontawesome/css/all.min.css')}}" />
        </head>
        <body>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mt-4 d-flex justify-content-start">
                        <a href="javascript:history.back()" class="backtoIndex">
                            <i class="fa-solid fa-arrow-left"></i>
                        </a>
                    </div>
                    <div class="col-lg-4 mt-4 d-flex justify-content-center">
                        <h2 class="text-center" style="color: #fff; font-size: 35px;">Create Businesses</h2>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
        
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8 createBusiness p-4 mt-5">
                            <form method="POST" action="{{ url('business') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12 justify-content-center">
                                            <div class="mb-4">
                                                <label for="business_name" class="form-label text-white d-flex justify-content-center">Business Name</label>
                                                <input type="text" class="form-input custom-input" name="business_name" required />
                                            </div>
                                        </div>
                                    </div>
                            
                                    <div class="row">
                                        <div class="col-lg-6 justify-content-start">
                                            <div class="mb-4">
                                                <label for="business_type" class="form-label text-white">Type of Business</label>
                                                <input type="text" class="form-input custom-input" name="business_type" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6 justify-content-end">
                                            <div class="mb-4">
                                                <label for="year" class="form-label text-white">Year</label>
                                                <input type="text" class="form-input custom-input" name="year" required />
                                            </div>
                                        </div>
                                    </div>
                            
                                    <div class="row">
                                        <div class="col-lg-6 justify-content-start">
                                            <div class="mb-4">
                                                <label for="description" class="form-label text-white">Description</label>
                                                <textarea class="form-input custom-input" name="description" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 justify-content-end">
                                            <div class="mb-4">
                                                <label for="location" class="form-label text-white">Location</label>
                                                <input type="text" class="form-input custom-input" name="location" required />
                                            </div>
                                        </div>
                                    </div>
                            
                                    <div class="row">
                                        <div class="col-lg-6 justify-content-start">
                                            <div class="mb-4">
                                                <label for="business_image" class="form-label text-white mb-4">Business Image</label>
                                                <input type="file" class="form-input custom-input" name="business_image" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6 justify-content-end">
                                            <div class="mb-4">
                                                <label for="business_logo" class="form-label text-white mb-4">Business Logo</label>
                                                <input type="file" class="form-input custom-input" name="business_logo" required />
                                            </div>
                                        </div>
                                    </div>
                            
                                    <div class="text-center">
                                        <button type="submit" class="btn createBusiness">
                                            Create Business
                                        </button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                </div>
            </div>
        </body>
        
    </html>
    