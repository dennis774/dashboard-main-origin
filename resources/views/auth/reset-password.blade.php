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
    <title>Reset Password</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
    <link rel="stylesheet" href="{{ url('fontawesome/css/all.min.css') }}" />

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

            .reset-pass-header {
                font-family: "Helvetica Now Text";
                font-weight: normal;
                font-size: clamp(1.5rem, 1.8vw, 3.5rem);
            }

            .reset-pass-form {
                width: 60vw;
            }

            .reset-pass-textfield {
                background-color: transparent;
                border: none;
                border-bottom: 0.05rem solid white;
                border-radius: 0px;
                font-size: clamp(0.7rem, 1.8vw, 0.9rem);
                letter-spacing: 3px;
            }

            .reset-pass-textfield:focus {
                background-color: transparent;
                border: none;
                border-bottom: 0.05rem solid white;
                border-radius: 0px;
                box-shadow: none;
            }

            #show-newpass-toggle, #show-confirmpass-toggle {
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

            .label-reset-text {
                font-size: clamp(0.75rem, 1.8vw, 1rem);
                letter-spacing: 2px;
            }

            .reset-button::before {
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

            .reset-button::after {
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

            .reset-button {
                font-family: "Poppins";
                letter-spacing: 2px;
                border-radius: 12px;
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
            
        } */
    </style>
</head>
<body>

    <div class="container d-flex flex-column vh-100 align-items-center justify-content-center">
            <!-- ERROR MESSAGES -->
            <x-input-error :messages="$errors->get('email')" class="position-relative my-0 bg-danger-subtle border-3 rounded-3 alert alert-danger" role="alert" style="font-size: 12px; letter-spacing: 1px;" />
            <x-input-error :messages="$errors->get('password')" class="position-relative my-0 bg-danger-subtle border-3 rounded-3 alert alert-danger" role="alert" style="font-size: 12px; letter-spacing: 1px;" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="position-relative my-0 bg-danger-subtle border-3 rounded-3 alert alert-danger" role="alert" style="font-size: 12px; letter-spacing: 1px;" />
            <!-- END ERROR MESSAGES -->

            <div class="card rounded-card mt-3 d-flex align-items-center justify-content-center text-white">
            <!-- LOGIN FORM -->
            <p class="h2 fw-normal mb-4 mb-md-5 mt-1 text-center reset-pass-header">Create Your <br class="d-md-none"/>New Password</p>
            <form method="POST" action="{{ route('password.store') }}" class="text-center px-3 px-md-1 reset-pass-form">
                @csrf
                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- EMAIL -->
                <div class="row gs-5 px-xl-5 mb-2 mt-1 mt-md-0 align-items-center">
                    <label for="reset-email" class="col-md-3 col-lg-4 text-start text-md-end text-white-50 flex-wrap flex-lg-nowrap label-reset-text">Email</label>
                    <div class="col-12 col-md position-relative">
                        <input type="email" class="form-control reset-pass-textfield text-white" id="reset-email" name="email" value="{{ old('email', $request->email) }}" required autocomplete="username">
                    </div>
                    <div class="col-md-2 d-none d-md-block text-center text-lg-start">
                        <button type="button" class="btn rounded-circle border-1 text-white-50 fs-5 clear-btn-email" onclick="document.getElementById('reset-email').value='';">✕</button>
                    </div>
                </div>

                <!-- NEW PASSWORD -->
                <div class="row gs-5 px-xl-5  mb-2 align-items-center">
                    <label for="reset-new-password" class="col-md-3 col-lg-4 text-start text-md-end text-white-50 flex-wrap flex-lg-nowrap label-reset-text">New Password</label>
                    <div class="col-12 col-md position-relative">
                        <input type="password" class="form-control reset-pass-textfield text-white" id="reset-new-password" name="password" required autocomplete="new-password">
                        <span>
                            <ion-icon name="eye-off" id="show-newpass-toggle" aria-hidden="true"></ion-icon>
                        </span>
                    </div>
                    <div class="col-md-2 d-none d-md-block text-center text-lg-start">
                        <button type="button" class="btn rounded-circle border-1 text-white-50 fs-5 clear-btn-password" onclick="document.getElementById('reset-new-password').value='';">✕</button>
                    </div>
                </div>

                <!-- CONFIRM PASSWORD -->
                <div class="row gs-5 px-xl-5 mb-3 mb-md-5 align-items-center">
                    <label for="reset-confirm-password" class="col-md-3 col-lg-4 text-start text-md-end text-white-50 flex-wrap flex-lg-nowrap label-reset-text">Confirm Password</label>
                    <div class="col-12 col-md position-relative">
                        <input type="password" class="form-control reset-pass-textfield text-white" id="reset-confirm-password" name="password_confirmation" required autocomplete="new-password">
                        <span>
                            <ion-icon name="eye-off" id="show-confirmpass-toggle" aria-hidden="true"></ion-icon>
                        </span>
                    </div>
                    <div class="col-md-2 d-none d-md-block text-center text-lg-start">
                        <button type="button" class="btn rounded-circle border-1 text-white-50 fs-5 clear-btn-password" onclick="document.getElementById('reset-confirm-password').value='';">✕</button>
                    </div>
                </div>

                <!-- RESET BUTTON -->
                <div class="row">
                <div class="d-none d-xl-flex col-xl-1"></div>
                    
                    <!-- PASS REQUIREMENT -->
                    <div class="col-12 col-md-8 d-flex ps-0 ps-md-4 ps-lg-0 justify-content-center align-items-center">
                        <p class="text-white-50 text-center text-md-start flex-nowrap" style="font-size: clamp(0.55rem, 1vw, 0.7rem); letter-spacing: 2px;">
                            Password Requirements:</br>
                            <span class="text-white">8 characters, mix of uppercase/lowercase, numbers</span>
                        </p>
                    </div>
                    <!-- CONFIRM BUTTON -->
                    <div class="col-12 col-md col-xl-2 d-flex align-items-center justify-content-center justify-content-md-end">
                        <button type="submit" class="btn me-md-0 px-4 px-lg-5 text-center text-white reset-button" style="font-size: clamp(0.7rem, 1.8vw, 1rem);">Confirm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

        <!-- Link to Icons -->
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

        <!-- SHOW NEW PASS SCRIPT -->
        <script>
            const showIcon = document.getElementById('show-newpass-toggle');
            const newPass = document.getElementById('reset-new-password');
                
            showIcon.onclick = function() {
                if (newPass.type == "password") {
                    newPass.type = "text";
                    showIcon.name = "eye";
                } else {
                    newPass.type = "password";
                    showIcon.name = "eye-off";
                }
s
            }
        </script>

        <!-- SHOW CONFIRM PASS SCRIPT -->
        <script>
            const showIconConfirm = document.getElementById('show-confirmpass-toggle');
            const confirmPass = document.getElementById('reset-confirm-password');
                
            showIconConfirm.onclick = function() {
                if (confirmPass.type == "password") {
                    confirmPass.type = "text";
                    showIconConfirm.name = "eye";
                } else {
                    confirmPass.type = "password";
                    showIconConfirm.name = "eye-off";
                }
s
            }
        </script>

{{--
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
    </div>--}}

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