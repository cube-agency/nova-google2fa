@extends('nova-google2fa::layouts.main')

@section('content')
    <form method="POST" action="{{ route('nova.google2fa.recover') }}">
        @csrf
        <h2 class="p-2 text-center font-bold text-xl md:text-2xl">{{ __('nova-google2fa::2fa-auth.register.title') }}</h2>

        <p class="p-2 font-bold text-center">{{ __('nova-google2fa::2fa-auth.recovery.instructions_description') }}</p>

        <div class="text-center pt-3">
            <div class="mb-6 w-1/2 mx-auto">
                <label class="block font-bold mb-2" for="{{ config('nova-google2fa.recovery_input') }}">
                    {{ __('nova-google2fa::2fa-auth.fields.recovery_code') }}
                </label>
                <input class="form-control form-input form-input-bordered w-full" type="text" id="{{ config('nova-google2fa.recovery_input') }}"
                       name="{{ config('nova-google2fa.recovery_input') }}">
                <p class="text-center font-bold text-danger mt-3 help-text-error">
                    {{ $errors->first(config('google2fa.recovery_input')) }}
                </p>
            </div>
            <div
                class="my-8 flex flex-col md:flex-row md:items-center justify-center space-y-2 md:space-y-0 space-x-3">
                <button type="submit"
                        class="shadow relative bg-primary-500 hover:bg-primary-400 text-white dark:text-gray-900 cursor-pointer rounded text-sm font-bold focus:outline-none focus:ring ring-primary-200 dark:ring-gray-600 inline-flex items-center justify-center h-9 px-3 shadow relative bg-primary-500 hover:bg-primary-400 text-white dark:text-gray-900">
                    <span>{{ __('nova-google2fa::2fa-auth.actions.login') }}</span>
                </button>
            </div>
        </div>
    </form>
@endsection
