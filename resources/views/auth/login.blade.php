{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Log in</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- <link href="{{ url('assets/css/style.css') }}" rel="stylesheet" /> --}}
    <script src="{{ url('assets/js/chart.js') }}"></script>
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{url('fontawesome/css/all.min.css')}}" />
    <style>
        body{
    background-image: url('https://t4.ftcdn.net/jpg/07/94/30/45/360_F_794304521_O4o0Y5UrvKtDxBNHY9utMowV2VhuhRpk.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    min-height: 100vh; /* Ensures it covers the full viewport height */
}


div.loginForm{
    backdrop-filter: blur(20px);
    border-radius:20px;
}


button.signIn{
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            text-align: center;
        }

        button.signIn:hover {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        
    .form-group {
        display: flex;
        align-items: center;
        margin-bottom: 20px; /* Space between fields */
    }

    .form-group label {
        margin-right: 20px; /* Adjust spacing between label and input */
        color: #fff;
        white-space: nowrap; /* Prevent label text from wrapping */
    }

    .form-group input {
        background: rgba(255, 255, 255, 0.2);
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            padding: 10px;
            width: 100%;
            outline: none;
            transition: all 0.3s ease;
    }
    .form-group input:focus{
        background: rgba(255, 255, 255, 0.2);
            outline: none;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1); /* Add a glow effect */
    background: rgba(255, 255, 255, 0.2); /* Ensure the background matches your style */
    color: #fff;
    }

    .form-group button {
        position: absolute;
        right: 5px;
        background: none;
        border: none;
        color: #fff;
        cursor: pointer;
        font-size: 16px;
    }





    </style>
</head>
<body>
    <div class="container" style="display: flex; align-items: center; justify-content: center; min-height: 100vh;">
        <div class="container" style="height:400px;">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="container loginForm" style="padding: 20px;">
                        <div class="row d-flex justify-content-around">
                            <div class="col-lg-12 mb-3 d-flex justify-content-center loginNav">
                                <h1 style="color: #fff;">Sign In</h1>
                            </div>
                        </div>


                        <div id="signIn" class="section">
                            <div class="row">
                                <div class="col-lg-1 mt-3"></div>
                                <div class="col-lg-10 mt-3">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group position-relative">
                                            <label for="email">Email</label>
                                            <input
                                                type="email"
                                                class="form-control"
                                                id="email"
                                                name="email"
                                                value="{{ old('email') }}"
                                                required
                                                autofocus
                                                autocomplete="off"
                                            />
                                            <button
                                                type="button"
                                                onclick="document.getElementById('email').value='';"
                                            >
                                                &times;
                                            </button>
                                        </div>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: #fff;" />
                                       
                                            <div class="form-group position-relative">
                                                <label for="password">Password</label>
                                                <input
                                                    type="password"
                                                    class="form-control"
                                                    id="password"
                                                    name="password"
                                                    required
                                                    autocomplete="new-password"
                                                />
                                                <button
                                                    type="button"
                                                    onclick="document.getElementById('password').value='';"
                                                >
                                                    &times;
                                                </button>
                                            </div>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: #fff;" />
                                       
                                        <div class="block mt-4">
                                            <label for="remember_me" class="inline-flex items-center">
                                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                                <span class="ms-2 text-sm text-white">{{ __('Remember me') }}</span>
                                            </label>
                                        </div>
                       
                                        <div class="row mt-2">
                                            <div class="col-lg-12 d-flex justify-content-center">
                                                @if (Route::has('password.request'))
                                                    <a class="underline text-sm text-white hover:text-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                                        {{ __('Forgot password?') }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                       
                                        <div class="row mt-3">
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-4 d-flex justify-content-end">
                                                <button type="submit" class="signIn">Sign in</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-1 mt-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </div>

</body>
</html>

