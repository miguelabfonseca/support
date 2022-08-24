{{-- Extends layout --}}
@extends('tenant.layout.guest')

{{-- Content --}}
@section('content')
    <div class="col-md-6">
        <div class="authincation-content">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <div class="auth-form">
                        <div class="text-center mb-3">
                            <a href="{!! url('/index') !!}"><img
                                    src="{{ global_asset('storage/resources/images/logo-full.png') }}" alt=""></a>
                        </div>
                        <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                        <form method="POST" action="{{ route('tenant.verify') }}">
                            @csrf
                            <div class="form-group">
                                <x-label for="email" class="mb-1 text-white" :value="__('Email')" />
                                <x-input id="email" class="block mt-1 w-full form-control" type="email" name="email"
                                    :value="old('email')" required autofocus />
                            </div>
                            <div class="form-group">
                                <x-label for="password" class="mb-1 text-white" :value="__('Password')" />
                                <x-input id="password" class="block mt-1 w-full form-control" type="password"
                                    name="password" required autocomplete="current-password" />
                            </div>
                            <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox ml-1 text-white">
                                        <label for="remember_me" class="inline-flex items-center">
                                            <input id="remember_me" type="checkbox"
                                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                name="remember">
                                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a class="text-white" href="{!! url('/forgot-password') !!}">{{ __('Forgot Password?') }}</a>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit"
                                    class="btn bg-white text-primary btn-block">{{ __('Sign Me In') }}</button>
                            </div>
                        </form>
                        <div class="new-account mt-3">
                            <p class="text-white">{{ __('Don\'t have an account?') }} <a class="text-white"
                                    href="{!! url('/sign-up') !!}">{{ __('Sign up') }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
