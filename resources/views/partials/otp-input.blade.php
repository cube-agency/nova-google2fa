<label class="block font-bold mb-2"
       for="{{ config('google2fa.otp_input') }}">{{ __('nova-google2fa::2fa-auth.fields.one_time_password') }}</label>
<input class="form-control form-input form-input-bordered w-full" type="text"
       name="{{ config('google2fa.otp_input') }}" id="{{ config('google2fa.otp_input') }}">
@if($errors->has(config('google2fa.otp_input')))
    <p class="text-center font-bold text-danger mt-3 help-text-error">
        {{ $errors->first(config('google2fa.otp_input')) }}
    </p>
@endif
