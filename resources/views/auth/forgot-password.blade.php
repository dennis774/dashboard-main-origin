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

        <!-- CHART SCRIPT -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        {{-- <link href="{{ url('assets/css/promos.css') }}" rel="stylesheet" /> --}}
        <script src="{{ url('assets/js/chart.js') }}"></script>

        <!-- FONT -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- CUSTOM FONT CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/helvetica-font.css') }}">

        <!-- BOOTSTRAP -->
        <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>

        <!-- ICON STYLESHEET -->
        <link rel="stylesheet" href="{{ url('fontawesome/css/all.min.css') }}" />
    </head>
    <style>
        body {
                /* background-image: url("https://t4.ftcdn.net/jpg/07/94/30/45/360_F_794304521_O4o0Y5UrvKtDxBNHY9utMowV2VhuhRpk.jpg"); */
                background: url("/assets/images/login-bg-img.png") no-repeat center center fixed;
                background-size: cover;
                margin: 0;
                padding: 0;
                overflow: auto;
                font-family: "Poppins";
                letter-spacing: 3px;
            }

            .login-header {
                font-family: "Helvetica Now Text";
                font-weight: normal;
            }

            .forgot-pass-content {
                width: 55vw;
            }

            .login-textfield {
                background-color: transparent;
                border: none;
                border-bottom: 0.05rem solid white;
                border-radius: 0px;
                font-size: clamp(0.75rem, 1.8vw, 1rem);
                letter-spacing: 3px;
            }

            .login-textfield:focus {
                background-color: transparent;
                border: none;
                border-bottom: 0.05rem solid white;
                border-radius: 0px;
                box-shadow: none;
            }

            .rounded-card {
                /*max-height: 55%;*/
                max-width: 65vw;
                width: 100%;
                height: 400px;
                margin-top: 10vh;
                background-color: transparent;
                backdrop-filter: blur(20px) brightness(60%);
                border: 0.001rem solid rgba(255, 255, 255, 0.311);
                border-radius: 20px;
            }

            .forgot-pass-subtext, .label-login-text {
                white-space: wrap;
                font-size: clamp(0.75rem, 1.8vw, 1rem);
                letter-spacing: 2px;
            }

            .send-button::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                border-radius: 12px;
                background: url("/assets/images/login-bg-img.png") no-repeat center center fixed;
                background-size: cover;
                backdrop-filter: blur(20px) brightness(70%);
                z-index: -1;
            }

            .send-button::after {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: transparent;
                backdrop-filter: blur(15px) brightness(120%) contrast(90%);
                border-radius: 12px;
                z-index: -1;
            }

            .send-button {
                font-family: "Poppins";
                letter-spacing: 2px;
                border-radius: 10px;
                background-color: transparent;
                backdrop-filter: blur(20px) brightness(80%);
            }
        /* body {
            background-image: url("https://t4.ftcdn.net/jpg/07/94/30/45/360_F_794304521_O4o0Y5UrvKtDxBNHY9utMowV2VhuhRpk.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            min-height: 100vh; 
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
        } */

    </style>

<body>

    <div class="container d-flex flex-column vh-100 align-items-center justify-content-center">
        <div class="card rounded-card mt-3 d-flex align-items-center justify-content-center text-white">
            <!-- LOGIN FORM -->
            <p class="h2 fw-normal mb-5 login-header">Forgot Password</p>
            <div class="text-center forgot-pass-content">
                <!-- DESCRIPTION -->
                <div class="row gs-5 px-xl-5 align-items-center">
                    <p class="text-center text-white-50 forgot-pass-subtext">
                        Enter the email address associated with your account.
                    </p>
                    <!-- <label for="login-email" class="col-lg-2 text-start text-lg-end text-white-50 label-login-text">Email</label>
                    <div class="col-12 col-md-10 col-lg-8">
                        <input type="email" class="form-control login-textfield text-white" id="login-email" name="email" value="{{ old('email') }}" required autofocus autocomplete="off">
                    </div>
                    <div class="col-md-2 d-none d-md-block text-center text-lg-start">
                        <button type="button" class="btn rounded-circle border-1 text-white-50 fs-5 clear-btn-email" onclick="document.getElementById('login-email').value='';">✕</button>
                    </div> -->
                </div>
                @if (session('status'))
                    <div class="mb-1 text-success fst-italic fw-bold" style="font-size: 0.75rem">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <!-- EMAIL -->
                    <div class="row gs-5 px-xl-5 mb-4 align-items-center">
                        <label for="login-email" class="col-lg-2 text-start text-lg-end text-white-50 label-login-text">Email</label>
                        <div class="col-12 col-md-10 col-lg-8">
                            <input type="email" class="form-control login-textfield text-white" id="login-email" name="email" value="{{ old('email') }}" required autofocus autocomplete="off">
                            
                        </div>
                        <div class="col-md-2 d-none d-md-block text-center text-lg-start">
                            <button type="button" class="btn rounded-circle border-1 text-white-50 fs-5 clear-btn-email" onclick="document.getElementById('login-email').value='';">✕</button>
                        </div>
                        @error('email')
                            <span class="text-danger fst-italic fw-bold mt-1" style="font-size: 0.75rem">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- FORGOT PASS & SIGN IN -->
                    <div class="row">
                        <!-- SIGN IN BUTTON -->
                        <div class="col text-center">
                            <button type="submit" class="btn me-md-0 px-4 px-md-5 py-2 text-center text-white send-button" style="font-size: clamp(0.75rem, 1.8vw, 1rem);">
                                Send Password Reset Link
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


        <!-- Link to Icons -->
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


    <!-- <div class="d-flex align-items-center justify-content-center min-vh-100">
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
    
                                    <!-- Email Address 
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
    </div> -->
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