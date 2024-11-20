{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
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
        <title>Forgot Password</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        {{-- <link href="{{ url('assets/css/promos.css') }}" rel="stylesheet" /> --}}
        <script src="{{ url('assets/js/chart.js') }}"></script>
        <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
        <link rel="stylesheet" href="{{ url('fontawesome/css/all.min.css') }}" />
    </head>
    <style>
        body {
            background-image: url("https://t4.ftcdn.net/jpg/07/94/30/45/360_F_794304521_O4o0Y5UrvKtDxBNHY9utMowV2VhuhRpk.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            min-height: 100vh; /* Ensures it covers the full viewport height */
        }

        div.forgotPassword{
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(20px);
            padding: 30px;
            padding-top: 20px;
        }
        input[type="email"] {
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            padding: 10px;
            width: 100%;
            outline: none;
            transition: all 0.3s ease;
        }

        input[type="email"]:focus {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: 0 0 8px rgba(255, 255, 255, 0.5);
        }
        button {
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

        button:hover {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

    </style>

<body>
    <div class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="container forgotPassword">
                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h2 style="color: #fff;">Forgot Password</h2>
                                    </div>
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-7">
                                <p class="text-sm" style="color: #fff;">
                                    Forgot your password? No problem. Just let us know your
                                    email address and we will email you a password reset link that
                                    will allow you to choose a new one.
                                </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (session('status'))
                        <div class="mb-4 text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                        @endif
    
                        <div class="row">
                            <div class="col-lg-12">
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
    
                                    <!-- Email Address -->
                                    <div class="mb-4">
                                        <label for="email" class="block text-gray-700 text-sm font-medium mb-2" style="color: #fff;"><strong>Email</strong></label>
                                        <input
                                            id="email"
                                            type="email"
                                            name="email"
                                            value="{{ old('email') }}"
                                            required
                                            autofocus
                                            class="block w-full px-4 py-2 border rounded-md shadow-sm focus:ring focus:ring-indigo-300 focus:border-indigo-500"
                                        />
                                        @error('email')
                                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
    
                                    <div class="row">
                                        <div class="col-lg-3"></div>
                                        <div class="col-lg-6">
                                            <div class="flex items-center justify-between">
                                                <button type="submit">
                                                    Email Password Reset Link
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-3"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </div>
</body>

</html>








{{-- 




<body class="container">

    <div class="row">
        <h2>Forgot Password</h2>
        <p class="text-sm text-gray-600 mb-4">
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
        </p>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="block w-full px-4 py-2 border rounded-md shadow-sm focus:ring focus:ring-indigo-300 focus:border-indigo-500">
                @error('email')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="w-full px-4 py-2 text-white bg-indigo-600 hover:bg-indigo-700 rounded-md shadow">
                    Email Password Reset Link
                </button>
            </div>
        </form>
    </div>

</body> --}}