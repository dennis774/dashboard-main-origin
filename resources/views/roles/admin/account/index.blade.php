@extends('general.index-two') @section('content')
<div class="container account-page">
    <div class="container text-center">
        <div class="row pb-5">
            <div class="col-lg-2 mt-4">
                <a href="{{ route('general.kuwago-one.dashboard') }}"><i class="fa-solid fa-arrow-left fa-xl"></i></a>
            </div>
            <div class="col-lg-8 mt-4">
                <h3>Accounts</h3>
            </div>
            <div class="col-lg-2 mt-4">
                <a href="{{ route('account.create') }}"><i class="fa-solid fa-plus fa-xl"></i></a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12"><i class="fa-regular fa-user fa-xl"></i><span>All Accounts</span></div>
                    </div>
                </div>
                <div class="container overflow-auto mt-5" style="height: 400px;">
                    <div class="row">
                        @foreach($users as $user)
                        <div class="col-lg-10">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-3 text-center">
                                        <img src="{{ asset('user_images/' . $user->user_image) }}" alt="User Image" style="width: 70px; height:70px;">
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-12"><p>{{ $user->name }}</p></div>
                                                <div class="col-lg-12">
                                                    <p>
                                                        @if ($user->role == 'owner') Business owner @elseif ($user->role == 'general') Finance Officer @elseif ($user->role == 'kuwago') Operational Manager @elseif($user->role =='uddesign')
                                                        Operational Manager @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <a href="{{ route('account.show', ['account' => $user->id]) }}">
                                            <i class="fa-regular fa-eye fa-xl"></i>
                                        </a>
                                    </div>
                                    
                                    <div class="col-lg-6 delete-button">
                                        @if ($user->role == 'owner')
                                        <form action="{{ url('/account', $user->id)}}" method="post" style="display: inline-block;">
                                            @csrf @method('DELETE')

                                            <button type="submit" class="btn" onclick="return confirm('Are you sure?')" disabled>
                                                <i class="fa-regular fa-trash-can fa-xl"></i>
                                            </button>
                                        </form>
                                            
                                        @else
                                        <form action="{{ url('/account', $user->id)}}" method="post" style="display: inline-block;">
                                            @csrf @method('DELETE')

                                            <button type="submit" class="btn" onclick="return confirm('Are you sure?')">
                                                <i class="fa-regular fa-trash-can fa-xl"></i>
                                            </button>
                                        </form>
                                            
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
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
@endsection
