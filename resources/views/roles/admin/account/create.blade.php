@extends('general.index-two') 
@section('content')

<div class="container account-page">
    <div class="container text-center">
        <div class="row pb-5">
            <div class="col-lg-2 mt-4">
                <a href="{{ url('/account') }}"><i class="fa-solid fa-arrow-left fa-xl"></i></a>
            </div>
            <div class="col-lg-8 mt-4">
                <h3>Create New User</h3>
            </div>
            <div class="col-lg-2 mt-4"></div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="container">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ url('/account') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="container mt-4">
                            <div class="row">
                                <div class="col-lg-4  pb-4">
                                    <img src="{{ asset('user_images/default-image.jpg') }}" alt="User Image" class="profile-image" style="cursor: pointer;" onclick="document.getElementById('userImageInput').click();">
                                    <input type="file" id="userImageInput" name="user_image" style="display: none;" onchange="previewImage(event)">
                                </div>
                                <div class="col-lg-8">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-5 d-flex justify-content-center" id="roleDisplay2" style="color:#fff; font-weight:bold; font-size:16px;">
                                                                Role
                                                        </div>

                                                        <div class="col-lg-2"></div>

                                                        <div class="col-lg-5">
                                                            <button type="submit" class="btn btn-warning" style="color: #fff;">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <label for="username" class="form-label"></label>
                                                <input type="text" class="form-control createUser" name="name" placeholder="Username" required />
                                            </div>

                                            <div class="col-lg-12">
                                                <label for="description" class="form-label"></label>
                                                <input type="text" class="form-control createUser" name="description" placeholder="Add Description" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-1" style="color: #fff; font-weight:bold; font-size:20px; ">Access</div>
                                </div>
                                <div class="col-lg-6">
                                    <p></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div>
                                        <select class="form-control" id="roleSelect" name="role" onchange="syncRole()">
                                            <option value="">Choose Access</option>
                                            <option value="general">General</option>
                                            <option value="kuwago">Kuwago</option>
                                            <option value="uddesign">UdDesign</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="">
                                        <div class="d-flex justify-content-center" id="roleDisplay" style="color: #fff; font-weight:bold; font-size:16px;">
                                            -Role-
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 mb-2">
                                    <div style="color: #fff; font-weight:bold; font-size:20px;" >Set-up the Account</div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center mt-2">
                                        <label for="phone_number" class="form-label pe-2" style="padding-left: 20px;">Phone: </label>
                                        <input type="text" class="form-control createUser" name="phone_number" placeholder="Enter Phone Number" required />
                                    </div>
                                    <div class="d-flex align-items-center mt-2">
                                        <label for="email" class="form-label pe-3" style="padding-left: 20px;">Email: </label>
                                        <input type="text" class="form-control createUser" name="email" placeholder="Enter Email" required />
                                    </div>
                                    <div class="d-flex align-items-center mt-2">
                                        <label for="password" class="form-label pe-2" style="padding-left: 0px;">Password: </label>
                                        <input type="text" class="form-control createUser" name="password" value="Kuwago1Accounts" placeholder="Enter Password" required />
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</div>

<script>
    function syncRole() {
        var roleSelect = document.getElementById("roleSelect");
        var roleDisplay2 = document.getElementById("roleDisplay2");
        var roleDisplay = document.getElementById("roleDisplay");
        var selectedRole = roleSelect.value;

        var roleText = "";
        switch (selectedRole) {
            case "owner":
                roleText = "Business owner";
                break;
            case "general":
                roleText = "Finance Officer";
                break;
            case "kuwago":
            case "uddesign":
                roleText = "Operational Manager";
                break;
        }

        roleDisplay2.innerText = roleText;
        roleDisplay.innerText = roleText;
    }

    // JavaScript function to preview selected image
    function previewImage(event) {
        const image = document.querySelector('img[alt="User Image"]');
        image.src = URL.createObjectURL(event.target.files[0]);
    }
</script>

@endsection
