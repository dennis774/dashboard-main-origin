
@extends('general.index-two') @section('content')

<div class="container account-page">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-2 mt-4">
                <a href="{{ route('settings.account-show', ['id' => Auth::user()->id]) }}">
                    <i class="fa-solid fa-arrow-left fa-xl"></i>
                </a>
            </div>
            <div class="col-lg-8 mt-4 mb-5">
                @if ($user->role == 'owner')
                <h3 style="">Edit My Account</h3>
                @else
                <h3 style="">Edit User Account</h3>
                @endif
            </div>
            <div class="col-lg-2 mt-4"></div>
        </div>
    </div>


    <div class="class">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <form method="POST" action="{{url('/settings', $user->id)}}" enctype="multipart/form-data">
                    @csrf @method('PUT')
                <div class="class">
                    <div class="row">
                        <div class="col-lg-4 d-flex justify-content-center align-items-center">
                            <div class="glass-background">
                                <img src="{{ asset('user_images/' . $user->user_image) }}" alt="User Image" class="profile-image" style="cursor: pointer;" onclick="document.getElementById('userImageInput').click();">
                                <!-- Hidden file input for updating the user image -->
                                <input type="file" id="userImageInput" name="user_image" style="display: none;" onchange="previewImage(event)">
                            </div>
                        </div>
                        
                        <div class="col-lg-8">
                           <div class="container">
                           <div class="container">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="col-lg-5 d-flex justify-content-center" id="roleDisplay2" style="color:#fff; font-weight:bold; font-size:16px; width:100%;">
                                        @if ($user->role == 'owner') Business owner @elseif ($user->role == 'general') Finance Officer @elseif ($user->role == 'kuwago') Operational Manager
                                        @elseif($user->role=='uddesign') Operational Manager @endif
                                    </div>                                </div>
                                <div class="col-lg-2">
                                </div>
                                <div class="col-lg-5 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-warning">Save</button>                                </div>
                            </div>
                           </div>
                           </div>
                           <div class="conatiner">
                           <div class="container">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="username" class="form-label"></label>
                                        <input type="text" class="form-control editMyaccount" name="name" value="{{ $user->name }}" placeholder="Username" required />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="description" class="form-label"></label>
                                        <input type="text" class="form-control editMyaccount" name="description" value="{{ $user->description }}" placeholder="Add Description" required />
                                    </div>
                                </div>
                               </div>
                           </div>
                           </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-12">
                                <p>Access</p>
                            </div>
                           </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="dropdown">
                                    @if ($user->role == 'owner')
                                    <select class="form-control" id="roleSelect" name="role" onchange="syncRole()">
                                        <option value="owner" {{ $user->role == 'owner' ? 'selected' : '' }}>Owner</option>
                                    </select>

                                    @elseif ($user->role == 'general')
                                    <select class="form-control" id="roleSelect" name="role" onchange="syncRole()">
                                        <option value="general" {{ $user->role == 'general' ? 'selected' : '' }}>General</option>
                                    </select>

                                    @elseif ($user->role == 'kuwago')
                                    <select class="form-control" id="roleSelect" name="role" onchange="syncRole()">
                                        <option value="kuwago" {{ $user->role == 'kuwago' ? 'selected' : '' }}>Kuwago</option>
                                    </select>

                                    @elseif ($user->role == 'uddesign')
                                    <select class="form-control" id="roleSelect" name="role" onchange="syncRole()">
                                        <option value="uddesign" {{ $user->role == 'uddesign' ? 'selected' : '' }}>Uddesign</option>
                                    </select>

                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-2"></div>
                            <div class="col-lg-5">
                                <div class="dropdown">
                                    <div class="col-lg-5 d-flex justify-content-center" id="roleDisplay" style="color:#fff; font-weight:bold; font-size:16px; width:60%;">
                                        @if ($user->role == 'owner') Business owner @elseif ($user->role == 'general') Finance Officer @elseif ($user->role == 'kuwago') Operational Manager @elseif($user->role =='uddesign') Operational
                                        Manager @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Profile</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="">
                                    <label for="first_name" class="form-label">Firstname: </label>
                                    <input type="text" class="form-control editMyaccount" name="first_name" value="{{ $user->first_name }}" placeholder="First Name" required />
                                </div>
                                <div class="">
                                    <label for="last_name" class="form-label">Lastname: </label>
                                    <input type="text" class="form-control editMyaccount" name="last_name" value="{{ $user->last_name }}" placeholder="Last Name" required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="">
                                    <label for="middle_name" class="form-label">Initial: </label>
                                    <input type="text" class="form-control editMyaccount" name="initial" value="{{ $user->initial }}" placeholder="Initial" required />
                                </div>
                                <div class="">
                                    <label for="suffix" class="form-label">Suffix: </label>
                                    <input type="text" class="form-control editMyaccount" name="suffix" value="{{ $user->suffix }}" placeholder="Suffix" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Contact</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex align-items-center">
                                    <label for="email" class="form-label pe-3">Email: </label>
                                    <input type="text" class="form-control editMyaccount" name="email" value="{{ $user->email }}" placeholder="Enter Email" required />
                                </div>
                                <div class="d-flex align-items-center mt-2">
                                    <label for="phone_number" class="form-label pe-2">Phone: </label>
                                    <input type="text" class="form-control editMyaccount" name="phone_number" value="{{ $user->phone_number }}" placeholder="Enter Phone Number" required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8"></div>
                            <div class="col-lg-4">
                                
                                <div class="container mt-1">
                                    <a href="/account/password" style="color: #fff;">
                                        <p>Change Password</p>
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
              </form>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</div>

<script>
    // JavaScript function to preview selected image
    function previewImage(event) {
        const image = document.querySelector('img[alt="User Image"]');
        image.src = URL.createObjectURL(event.target.files[0]);
    }
</script>

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
</script>
@endsection













