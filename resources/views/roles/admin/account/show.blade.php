@extends('general.index-two')
@section('content')
    <div class="container account-page">
        <div class="container text-center">
            <div class="row pb-5">
                <div class="col-lg-2 mt-4">
                    <a href="{{ url('/account') }}"><i class="fa-solid fa-arrow-left fa-xl"></i></a>
                </div>
                <div class="col-lg-8 mt-4">
                    @if ($user->role == 'owner')
                        <h3>View My Account</h3>
                    @else
                        <h3>View User Account</h3>
                    @endif
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 mb-4 d-flex justify-content-center align-items-center">
                                <div class="glass-background">
                                    <img src="{{ asset('user_images/' . $user->user_image) }}" alt="User Image"
                                        class="profile-image">
                                    <!-- Hidden file input for updating the user image -->
                                    {{-- <input type="file" id="userImageInput" name="user_image" style="display: none;"> --}}
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="container">
                                    <div class="row mb-4 allInfo">
                                        <div class="col-lg-12">
                                            <div class="d-flex align-items-baseline">
                                                <strong class="me-2">Role:</strong>
                                                <p>
                                                    @if ($user->role == 'owner')
                                                        Business owner
                                                    @elseif ($user->role == 'general')
                                                        Finance Officer
                                                    @elseif ($user->role == 'kuwago')
                                                        Operational Manager
                                                    @elseif ($user->role == 'uddesign')
                                                        Operational Manager
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="d-flex align-items-baseline">
                                                <div class="me-2" style="font-size:17px;">Name: <span style="font-size:18px; font-weight:500;">{{ $user->name }}</span></div>
                                            </div>
                                            <div>
                                                <strong>Description:</strong>
                                                <div
                                                    style="height: 60px; overflow-x: hidden; padding: 5px; font-size: 13px; scrollbar-width: none; -ms-overflow-style: none;">
                                                    {{ $user->description }}
                                                </div>

                                                <style>
                                                    /* Hide scrollbar for WebKit browsers */
                                                    div::-webkit-scrollbar {
                                                        display: none;
                                                    }

                                                    /* Hide scrollbar for all other browsers */
                                                    div {
                                                        scrollbar-width: none;
                                                        /* For Firefox */
                                                        -ms-overflow-style: none;
                                                        /* For Internet Explorer and Edge */
                                                    }
                                                </style>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                       <div class="container">
                        <div class="row allInfo mb-3">
                            <div class="col-lg-6 d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="me-2" style="font-size:17px;">Access:<span style="font-size:18px; font-weight:500;">{{ $user->role }}</span></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center">
                                    <div class="me-2">Role:</div>
                                    <div class="d-flex align-items-center" id="roleDisplay" style="font-size:17px;">
                                        @if ($user->role == 'owner')
                                            Business owner
                                        @elseif ($user->role == 'general')
                                            Finance Officer
                                        @elseif ($user->role == 'kuwago')
                                            Operational Manager
                                        @elseif ($user->role == 'uddesign')
                                            Operational Manager
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div style="color: #fff; font-weight:bold; font-size:20px; ">Profile</div>
                            </div>
                        </div>

                        <div class="row allInfo mb-3 p-1 d-flex justify-content-center align-items-center">
                            <div class="col-lg-6">
                                <div class="d-flex align-items-baseline">
                                    <div class="me-2" style="font-size:17px;">First Name: <span style="font-size:18px; font-weight:500;">{{ $user->first_name }}</span></div>
                                </div>
                                <div class="d-flex align-items-baseline">
                                    <div class="me-2" style="font-size:17px;">Last Name: <span style="font-size:18px; font-weight:500;">{{ $user->last_name }}</span></div>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex align-items-baseline">
                                    <div class="me-2" style="font-size:17px;">Initial: <span style="font-size:18px; font-weight:500;">{{ $user->initial }}</span></div>
                                </div>
                                <div class="d-flex align-items-baseline">
                                    <div class="me-2" style="font-size:17px;">Suffix: <span style="font-size:18px; font-weight:500;">{{ $user->suffix }}</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div style="color: #fff; font-weight:bold; font-size:20px; ">Contact</div>
                            </div>
                        </div>

                        <div class="row allInfo p-1">
                            <div class="col-lg-12">
                                <div class="d-flex align-items-baseline">
                                    <div class="me-2" style="font-size:17px;">Email: <span style="font-size:18px; font-weight:500;">{{ $user->email }}</span></div>
                                </div>
                                <div class="d-flex align-items-baseline mt-2">
                                    <div class="me-2" style="font-size:17px;">Phone Number: <span style="font-size:18px; font-weight:500;">{{ $user->phone_number }}</span></div>
                                </div>
                            </div>
                        </div>
                       </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('account.edit', ['account' => $user->id]) }}">
                            <i class="fa-regular fa-pen-to-square fa-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
