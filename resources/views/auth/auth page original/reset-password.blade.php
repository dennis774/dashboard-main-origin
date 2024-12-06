{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
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
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{ url('fontawesome/css/all.min.css') }}" />
    <style>
        body {
            background-image: url("https://t4.ftcdn.net/jpg/07/94/30/45/360_F_794304521_O4o0Y5UrvKtDxBNHY9utMowV2VhuhRpk.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            min-height: 100vh;
        }

        div.resetPassword {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(20px);
            padding: 30px;
            padding-top: 20px;
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
        }

        button:hover {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        input {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
            border-radius: 10px;
            padding: 10px;
            transition: all 0.3s ease;
            width: 100%;
        }

        input:focus {
            background: rgba(255, 255, 255, 0.2);
            outline: none;
        }

        label {
            color: #fff;
            font-size: 0.9rem;
            
        }
    </style>
</head>
<body>
    <div class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="container resetPassword">
                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-center mb-2">
                                <h3 style="color: #fff;">Reset Password</h3>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('password.store') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="row mb-4">
                                <div class="col-lg-12">
                                    <label for="email" class="d-block mb-2"><strong>Email</strong></label>
                                    <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                                    @error('email')
                                        <span class="text-danger text-sm mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-lg-12">
                                    <label for="password" class="d-block mb-2"><strong>Password</strong></label>
                                    <input id="password" type="password" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="text-danger text-sm mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-lg-12">
                                    <label for="password_confirmation" class="d-block mb-2"><strong>Confirm Password</strong></label>
                                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                                    @error('password_confirmation')
                                        <span class="text-danger text-sm mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-4">
                                    <button type="submit">
                                        <strong>Reset Password</strong>
                                    </button>
                                </div>
                                <div class="col-lg-4"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </div>
</body>
</html>







{{-- <body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 text-center mb-4">Reset Password</h2>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username"
                    class="block w-full px-4 py-2 border rounded-md shadow-sm focus:ring focus:ring-indigo-300 focus:border-indigo-500">
                @error('email')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="block w-full px-4 py-2 border rounded-md shadow-sm focus:ring focus:ring-indigo-300 focus:border-indigo-500">
                @error('password')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 text-sm font-medium mb-2">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                    class="block w-full px-4 py-2 border rounded-md shadow-sm focus:ring focus:ring-indigo-300 focus:border-indigo-500">
                @error('password_confirmation')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end">
                <button type="submit"
                    class="w-full px-4 py-2 text-white bg-indigo-600 hover:bg-indigo-700 rounded-md shadow">
                    Reset Password
                </button>
            </div>
        </form>
    </div>

</body> --}}