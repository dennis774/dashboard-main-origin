<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Log in</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        {{--
        <link href="{{ url('assets/css/style.css') }}" rel="stylesheet" />
        --}}
        <script src="{{ url('assets/js/chart.js') }}"></script>
        <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
        <link rel="stylesheet" href="{{url('fontawesome/css/all.min.css')}}" />
        <style>
            body {
                background-image: url("https://t4.ftcdn.net/jpg/07/94/30/45/360_F_794304521_O4o0Y5UrvKtDxBNHY9utMowV2VhuhRpk.jpg");
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
                min-height: 100vh; /* Ensures it covers the full viewport height */
            }

            div.loginForm {
                backdrop-filter: blur(20px);
                border-radius: 20px;
            }

            button.signIn {
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
                width: 100px; /* Fixed width for alignment */
            }

            .form-group .flex-grow-1 {
                position: relative;
                width: 100%;
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
            .form-group input:focus {
                background: rgba(255, 255, 255, 0.2);
                outline: none;
                box-shadow: 0 0 10px rgba(255, 255, 255, 0.1); /* Add a glow effect */
                background: rgba(255, 255, 255, 0.2); /* Ensure the background matches your style */
                color: #fff;
            }

            .form-group button {
                position: absolute;
                right: 10px;
                top: 50%;
                transform: translateY(-50%);
                background: none;
                border: none;
                color: #fff;
                cursor: pointer;
                font-size: 16px;
            }

            #togglePassword {
                right: 40px;
            }

            input[type="password"]::-ms-reveal,
        input[type="password"]::-ms-clear, /* For Internet Explorer and Edge */
        input[type="password"]::-webkit-clear-button,
        input[type="password"]::-webkit-inner-spin-button, /* For Chrome, Safari */
        input[type="password"]::-webkit-outer-spin-button {
                display: none;
                appearance: none;
            }
        </style>
    </head>
    <body>
        <div class="container" style="display: flex; align-items: center; justify-content: center; min-height: 100vh;">
            <div class="container" style="height: 400px;">
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
                                            <div class="form-group d-flex align-items-center">
                                                <label for="email" class="me-3 text-nowrap">Email</label>
                                                <div class="flex-grow-1 position-relative">
                                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="off" />
                                                    <button type="button" onclick="document.getElementById('email').value='';">
                                                        &times;
                                                    </button>
                                                </div>
                                            </div>
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: #fff;" />

                                            <div class="form-group d-flex align-items-center">
                                                <label for="password" class="me-3 text-nowrap">Password</label>
                                                <div class="flex-grow-1 position-relative">
                                                    <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password" />
                                                    <button type="button" id="togglePassword">
                                                        👁️
                                                    </button>
                                                    <button type="button" onclick="document.getElementById('password').value='';">
                                                        &times;
                                                    </button>
                                                </div>
                                            </div>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: #fff;" />

                                            <div class="block mt-4">
                                                <label for="remember_me" class="inline-flex items-center">
                                                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember" />
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
        <script>
            document.getElementById("togglePassword").addEventListener("click", function () {
                const passwordField = document.getElementById("password");
                const type = passwordField.type === "password" ? "text" : "password";
                passwordField.type = type;

                // Change the icon based on the state
                this.textContent = type === "password" ? "👁️" : "🙈";
            });
        </script>
    </body>
</html>
