<?php

namespace CubeAgency\NovaGoogle2fa\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class RecoveryCodeRule implements Rule
{
    public function passes($attribute, $value)
    {
        foreach (auth()->user()->user2fa->recovery as $recoveryCode) {
            if (Hash::check($value, $recoveryCode)) {
                return true;
            }
        }

        return false;
    }

    public function message()
    {
        return __('nova-google2fa::2fa-auth.validation.recovery_code_invalid');
    }
}
