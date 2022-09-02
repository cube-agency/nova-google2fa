<?php

namespace CubeAgency\NovaGoogle2fa\Rules;

use Illuminate\Contracts\Validation\Rule;
use PragmaRX\Google2FALaravel\Support\Authenticator;

class ValidCodeRule implements Rule
{
    public function passes($attribute, $value)
    {
        $secret = auth()->user()->user2fa->google2fa_secret;

        $authenticator = app(Authenticator::class)->boot($this);

        return $authenticator->verifyGoogle2FA(
            $secret,
            $value
        );
    }

    public function message()
    {
        return __('nova-google2fa::2fa-auth.validation.otp_invalid');
    }
}
