@extends('nova-google2fa::layouts.main')

@section('content')
    <div class="flex justify-center">
        <div>
            <h2 class="mt-8 text-center font-bold text-xl md:text-2xl">
                {{ __('nova-google2fa::2fa-auth.setup.install') }}
            </h2>

            <div class="flex items-center my-8">
                <a href="{{ config('nova-google2fa.app_store_links.ios') }}" target="_blank" class="w-1/2 mx-2">
                    <img
                        src="{{ asset('vendor/nova-google2fa/images/badge-app-store.png') }}"
                        alt="App store"
                    >
                </a>

                <a href="{{ config('nova-google2fa.app_store_links.android') }}" target="_blank" class="w-1/2 mx-2">
                    <img
                        src="{{ asset('vendor/nova-google2fa/images/badge-google-play.png') }}"
                        alt="Google play"
                    >
                </a>
            </div>
        </div>
    </div>


    <h2 class="p-2 font-normal text-xl md:text-2xl">{{ __('nova-google2fa::2fa-auth.setup.recovery_title') }}</h2>
    @csrf
    <p class="p-2 font-bold">
        {{ __('nova-google2fa::2fa-auth.setup.recovery_description') }}
    </p>
    <p class="p-2 help-text-error font-bold">
        {{ __('nova-google2fa::2fa-auth.setup.recovery_warning') }}
    </p>
    <div class="p-3">
        <div>
            @foreach ($recovery as $recoveryCode)
                <ul>
                    <li class="p-2">{{ $recoveryCode }}</li>
                </ul>
            @endforeach
        </div>
    </div>

    <div
        class="my-8 flex flex-col md:flex-row md:items-center justify-center md:justify-end space-y-2 md:space-y-0 space-x-3">
        <button type="button"
                class="shadow relative bg-primary-500 hover:bg-primary-400 text-white dark:text-gray-900 cursor-pointer rounded text-sm font-bold focus:outline-none focus:ring ring-primary-200 dark:ring-gray-600 inline-flex items-center justify-center h-9 px-3 shadow relative bg-primary-500 hover:bg-primary-400 text-white dark:text-gray-900"
                onclick="window.print()"
        >
            <span>{{ __('nova-google2fa::2fa-auth.actions.print') }}</span>
        </button>
        <a href="{{ route('nova.google2fa.register.index') }}"
           class="shadow relative bg-primary-500 hover:bg-primary-400 text-white dark:text-gray-900 cursor-pointer rounded text-sm font-bold focus:outline-none focus:ring ring-primary-200 dark:ring-gray-600 inline-flex items-center justify-center h-9 px-3 shadow relative bg-primary-500 hover:bg-primary-400 text-white dark:text-gray-900">
            <span>{{ __('nova-google2fa::2fa-auth.actions.continue') }}</span>
        </a>
    </div>
@endsection
