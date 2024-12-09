<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Log in</title>

    <!-- CHART SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{--
        <link href="{{ url('assets/css/style.css') }}" rel="stylesheet" />
    --}}
    <script src="{{ url('assets/js/chart.js') }}"></script>

    <!-- GOOGLE FONT (POPPINS) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- CUSTOM FONT CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/helvetica-font.css') }}">

    <!-- BOOTSTRAP -->
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- ICON STYLESHEET -->
    <link rel="stylesheet" href="{{url('fontawesome/css/all.min.css')}}" />

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
            /* min-height: 100vh; Ensures it covers the full viewport height */
        }

        .login-header {
            font-family: "Helvetica Now Text";
            font-weight: normal;
        }

        .login-form {
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

        #show-pass-toggle {
            position: absolute;
            right: 20px;
            transform: translate(0, -50%);
            top: 50%;
            cursor: pointer;
            font-size: 20px;
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

        .label-login-text {
            white-space: nowrap;
            font-size: clamp(0.75rem, 1.8vw, 1rem);
        }

        .login-button::before {
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

        .login-button::after {
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

        .login-button {
            font-family: "Poppins";
            letter-spacing: 2px;
            border-radius: 12px;
            background-color: transparent;
            backdrop-filter: blur(20px) brightness(80%);
        }

        /*div.loginForm {
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
                margin-bottom: 20px; /* Space between fields 
            }

            .form-group label {
                margin-right: 20px; /* Adjust spacing between label and input 
                color: #fff;
                white-space: nowrap; /* Prevent label text from wrapping 
                width: 100px; /* Fixed width for alignment 
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
                box-shadow: 0 0 10px rgba(255, 255, 255, 0.1); /* Add a glow effect 
                background: rgba(255, 255, 255, 0.2); /* Ensure the background matches your style 
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
            }*/

        input[type="password"]::-ms-reveal,
        input[type="password"]::-ms-clear,
        /* For Internet Explorer and Edge */
        input[type="password"]::-webkit-clear-button,
        input[type="password"]::-webkit-inner-spin-button,
        /* For Chrome, Safari */
        input[type="password"]::-webkit-outer-spin-button {
            display: none;
            appearance: none;
        }
    </style>
</head>

<body>
    <div class="container d-flex flex-column vh-100 align-items-center justify-content-center">
        <!-- ERROR MESSAGES -->
        <x-input-error :messages="$errors->get('email')" class="position-relative my-0 bg-danger-subtle border-3 rounded-3 alert alert-danger" role="alert" style="font-size: 12px; letter-spacing: 1px;" />
        <x-input-error :messages="$errors->get('password')" class="position-relative my-0 bg-danger-subtle border-3 rounded-3 alert alert-danger" role="alert" style="font-size: 12px; letter-spacing: 1px;" />
        <!-- END ERROR MESSAGES -->

        <div class="card rounded-card mt-3 d-flex align-items-center justify-content-center text-white">
            <!-- LOGIN FORM -->
            <p class="h2 fw-normal mb-5 mt-3 login-header">Welcome Back!</p>
            <form method="POST" action="{{ route('login') }}" class="text-center login-form">
                @csrf
                <!-- EMAIL -->
                <div class="row gs-5 px-xl-5 mb-3 mb-lg-4 align-items-center">
                    <label for="login-email" class="col-lg-2 text-start text-lg-end text-white-50 label-login-text">Email</label>
                    <div class="col-12 col-md-10 col-lg-8">
                        <input type="email" class="form-control login-textfield text-white" id="login-email" name="email" value="{{ old('email') }}" required autofocus autocomplete="off">
                    </div>
                    <div class="col-md-2 d-none d-md-block text-center text-lg-start">
                        <button type="button" class="btn rounded-circle border-1 text-white-50 fs-5 clear-btn-email" onclick="document.getElementById('login-email').value='';">✕</button>
                    </div>
                </div>

                <!-- PASSWORD -->
                <div class="row gs-5 px-xl-5 mb-4 align-items-center">
                    <label for="login-password" class="col-md-3 col-lg-2 text-start text-lg-end text-white-50 label-login-text">Password</label>
                    <div class="col-12 col-md-10 col-lg-8 position-relative">
                        <input type="password" class="form-control login-textfield text-white" id="login-password" name="password" required autocomplete="new-password">
                        <span>
                            <ion-icon name="eye-off" id="show-pass-toggle" aria-hidden="true"></ion-icon>
                        </span>
                    </div>
                    <div class="col-md-2 d-none d-md-block text-center text-lg-start">
                        <button type="button" class="btn rounded-circle border-1 text-white-50 fs-5 clear-btn-password" onclick="document.getElementById('login-password').value='';">✕</button>
                    </div>
                </div>

                <!-- REMEMBER ME -->
                <div class="d-flex ps-lg-5 mb-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="form-check-input rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember" />
                        <span class="ms-2 text-white" style="font-size: clamp(0.75rem, 1.8vw, 1rem);">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- FORGOT PASS & SIGN IN -->
                <div class="row">
                    <div class="d-none d-xl-flex col"></div>

                    <!-- FORGOT PASS -->
                    <div class="col-6 col-lg-8 col-xl d-flex justify-content-center align-items-center">
                        @if (Route::has('password.request'))
                        <a class="underline text-sm text-white hover:text-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('password.request') }}"
                            style="font-size: clamp(0.75rem, 1.8vw, 1rem);">
                            {{ __('Forgot password?') }}
                        </a>
                        @endif
                    </div>

                    <!-- SIGN IN BUTTON -->
                    <div class="col-6 col-lg text-end">
                        <button type="submit" class="btn me-md-0 px-4 px-md-5 text-center text-white login-button" style="font-size: clamp(0.75rem, 1.8vw, 1rem);">Sign In</button>
                    </div>
                </div>
            </form>



            <!-- <div class="row">
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
                </div> -->
        </div>
    </div>


    <!-- Link to Icons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- SHOW PASS SCRIPT -->
    <script>
        const showIcon = document.getElementById('show-pass-toggle');
        const password = document.getElementById('login-password');

        showIcon.onclick = function() {
            if (password.type == "password") {
                password.type = "text";
                showIcon.name = "eye";
            } else {
                password.type = "password";
                showIcon.name = "eye-off";
            }
            s
        }

        // document.getElementById("togglePassword").addEventListener("click", function () {
        //     const passwordField = document.getElementById("password");
        //     const type = passwordField.type === "password" ? "text" : "password";
        //     passwordField.type = type;

        //     // Change the icon based on the state
        //     this.textContent = type === "password" ? "👁️" : "🙈";
        // });
    </script>
</body>

</html>