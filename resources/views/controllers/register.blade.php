@extends('nova-google2fa::layouts.main')

@section('content')
    <form method="POST" action="{{ route('nova.google2fa.register') }}">
        @csrf
        <h2 class="p-2 text-center font-bold text-xl md:text-2xl">{{ __('nova-google2fa::2fa-auth.register.title') }}</h2>

        <p class="p-2">{{ __('nova-google2fa::2fa-auth.register.description') }}</p>
        <p class="p-2">{{ __('nova-google2fa::2fa-auth.register.instruction_description') }}</p>

        <p class="px-2">{{ __('nova-google2fa::2fa-auth.register.step_one', ['secret' => $secret]) }}</p>
        <p class="px-2">{{ __('nova-google2fa::2fa-auth.register.step_two') }}</p>

        <div class="flex items-center justify-center my-8">
            <img src="{{ $qr }}" alt="QR code">
        </div>

        <div class="text-center">
            <div class="inline-block mb-6 w-1/2">
                @include('nova-google2fa::partials.otp-input')
            </div>
            <div
                class="my-8 flex flex-col md:flex-row md:items-center justify-center space-y-2 md:space-y-0 space-x-3">
                <button type="submit"
                        class="shadow relative bg-primary-500 hover:bg-primary-400 text-white dark:text-gray-900 cursor-pointer rounded text-sm font-bold focus:outline-none focus:ring ring-primary-200 dark:ring-gray-600 inline-flex items-center justify-center h-9 px-3 shadow relative bg-primary-500 hover:bg-primary-400 text-white dark:text-gray-900">
                    <span>{{ __('nova-google2fa::2fa-auth.actions.confirm') }}</span>
                </button>
            </div>
        </div>
    </form>
@endsection
