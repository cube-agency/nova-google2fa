@extends('nova-google2fa::layouts.main')

@section('content')
    <form method="POST" action="{{ route('nova.google2fa.authenticate') }}">
        @csrf
        <h2 class="p-2 text-center font-bold text-xl md:text-2xl">{{ __('nova-google2fa::2fa-auth.register.title') }}</h2>

        <p class="p-2 font-bold text-center">{{ __('nova-google2fa::2fa-auth.login.instructions_description') }}</p>

        <div class="text-center pt-3">
            <div class="mb-6 w-1/2 inline-block">
                @include('nova-google2fa::partials.otp-input')
            </div>
            <div
                class="my-8 flex flex-col md:flex-row md:items-center justify-center space-y-2 md:space-y-0 space-x-3">
                <button type="submit"
                        class="shadow relative bg-primary-500 hover:bg-primary-400 text-white dark:text-gray-900 cursor-pointer rounded text-sm font-bold focus:outline-none focus:ring ring-primary-200 dark:ring-gray-600 inline-flex items-center justify-center h-9 px-3 shadow relative bg-primary-500 hover:bg-primary-400 text-white dark:text-gray-900">
                    <span>{{ __('nova-google2fa::2fa-auth.actions.login') }}</span>
                </button>
                @if($errors->first(config('google2fa.otp_input')))
                    <a href="{{ route('nova.google2fa.recover.index') }}"
                       class="shadow relative bg-primary-500 hover:bg-primary-400 text-white dark:text-gray-900 cursor-pointer rounded text-sm font-bold focus:outline-none focus:ring ring-primary-200 dark:ring-gray-600 inline-flex items-center justify-center h-9 px-3 shadow relative bg-primary-500 hover:bg-primary-400 text-white dark:text-gray-900">
                        {{ __('nova-google2fa::2fa-auth.actions.recovery_login') }}
                    </a>
                @endif
            </div>
        </div>
    </form>
@endsection
