@extends('general.index-two')
@section('content')
<div class="container account-page">
    <div class="container text-center">
        <div class="row pb-5">
            <div class="col-lg-2 mt-4">
                <a href="{{ route('general.kuwago-one.dashboard') }}"><i class="fa-solid fa-arrow-left fa-xl"></i></a>
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
                        <div class="col-lg-4 d-flex justify-content-center align-items-center">
                            <div class="glass-background">
                                <img src="{{ asset('user_images/' . $user->user_image) }}" alt="User Image" class="profile-image">
                                <!-- Hidden file input for updating the user image -->
                                <input type="file" id="userImageInput" name="user_image" style="display: none;">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="container">
                                <div class="row mb-2 allInfo">
                                    <div class="col-lg-12">
                                        <div class="d-flex align-items-baseline">
                                            <strong class="me-2">Role:</strong>
                                            <p>
                                                @if ($user->role == 'owner') Business owner 
                                                @elseif ($user->role == 'general') Finance Officer 
                                                @elseif ($user->role == 'kuwago') Operational Manager 
                                                @elseif ($user->role == 'uddesign') Operational Manager 
                                                @endif
                                            </p>
                                        </div>
                                        <div class="d-flex align-items-baseline">
                                            <strong class="me-2">Username:</strong>
                                            <p>{{ $user->name }}</p>
                                        </div>
                                        <div>
                                            <strong>Description:</strong>
                                            <div style="max-height: 100px; overflow-y: auto;">
                                                {{ $user->description }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                   <div class="container">
                    <div class="row allInfo mt-3 mb-3">
                        <div class="col-lg-6">
                            <div class="d-flex align-items-baseline">
                                <strong class="me-2">Access:</strong>
                                <p>{{ $user->role }}</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex align-items-baseline">
                                <strong class="me-2">Role:</strong>
                                <p id="roleDisplay">
                                    @if ($user->role == 'owner') Business owner 
                                    @elseif ($user->role == 'general') Finance Officer 
                                    @elseif ($user->role == 'kuwago') Operational Manager 
                                    @elseif ($user->role == 'uddesign') Operational Manager 
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <strong style="color: #fff;">Profile</strong>
                        </div>
                    </div>

                    <div class="row allInfo mb-3">
                        <div class="col-lg-6">
                            <div class="d-flex align-items-baseline">
                                <strong class="me-2">Firstname:</strong>
                                <p>{{ $user->first_name }}</p>
                            </div>
                            <div class="d-flex align-items-baseline">
                                <strong class="me-2">Lastname:</strong>
                                <p>{{ $user->last_name }}</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex align-items-baseline">
                                <strong class="me-2">Initial:</strong>
                                <p>{{ $user->initial }}</p>
                            </div>
                            <div class="d-flex align-items-baseline">
                                <strong class="me-2">Suffix:</strong>
                                <p>{{ $user->suffix }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <strong style="color: #fff;">Contact</strong>
                        </div>
                    </div>

                    <div class="row allInfo">
                        <div class="col-lg-12">
                            <div class="d-flex align-items-baseline">
                                <strong class="me-2">Email:</strong>
                                <p>{{ $user->email }}</p>
                            </div>
                            <div class="d-flex align-items-baseline mt-2">
                                <strong class="me-2">Phone:</strong>
                                <p>{{ $user->phone_number }}</p>
                            </div>
                        </div>
                    </div>
                   </div>
                </div>
            </div>
            <div class="col-lg-2 d-flex justify-content-center align-items-center">
                <a href="{{ route('settings.account-edit', ['id' => Auth::user()->id]) }}">
                    <i class="fa-regular fa-pen-to-square fa-xl"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
