{{--
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
--}}
@extends('general.index-two') @section('content')
    <div class="container account-page">
        <div class="container text-center">
            <div class="row pb-5">
                <div class="col-lg-2 mt-4 mb-4">
                    <a href="{{ url('settings', $user->id) }}/edit"><i class="fa-solid fa-arrow-left fa-xl"></i></a>
                </div>
                <div class="col-lg-8 mt-4 mb-4">
                    <h3>Update Password</h3>
                </div>
                <div class="col-lg-2 mt-4 mb-4"></div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-3 mt-5">

            </div>
            <div class="col-lg-6 mt-5">
                <p class="d-flex justify-content-center mb-5" style="font-size: 18px;">Ensure your account is using a long,
                    random password to stay secure.</p>
                <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('put')

                    <div>
                        <label for="update_password_current_password" class="form-label">Current Password</label>
                        <input id="update_password_current_password" name="current_password" type="password"
                            class="form-control mt-1 changePass" autocomplete="current-password" />
                        @if ($errors->updatePassword->has('current_password'))
                            <div class="text-danger mt-2">
                                {{ $errors->updatePassword->first('current_password') }}
                            </div>
                        @endif
                    </div>

                    <div>
                        <label for="update_password_password" class="form-label">New Password</label>
                        <input id="update_password_password" name="password" type="password"
                            class="form-control mt-1 changePass" autocomplete="new-password" />
                        @if ($errors->updatePassword->has('password'))
                            <div class="text-danger mt-2">
                                {{ $errors->updatePassword->first('password') }}
                            </div>
                        @endif
                    </div>

                    <div>
                        <label for="update_password_password_confirmation" class="form-label">Confirm Password</label>
                        <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                            class="form-control mt-1 changePass" autocomplete="new-password" />
                        @if ($errors->updatePassword->has('password_confirmation'))
                            <div class="text-danger mt-2">
                                {{ $errors->updatePassword->first('password_confirmation') }}
                            </div>
                        @endif
                    </div>

                    <div class="d-flex align-items-center justify-content-center gap-4 mt-4">
                        <button type="submit" class="btn savenewPass">Save</button>
                        @if (session('status') === 'password-updated')
                            <p class="text-success text-sm mt-2" style="transition: opacity 2s ease-out;">
                                Saved.
                            </p>
                        @endif
                    </div>
                </form>
            </div>
            <div class="col-lg-3 mt-5"></div>
        </div>

    </div>
@endsection
