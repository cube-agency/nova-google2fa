<?php

namespace CubeAgency\NovaGoogle2fa\Http\Requests;

use CubeAgency\NovaGoogle2fa\Rules\RecoveryCodeRule;
use Illuminate\Foundation\Http\FormRequest;

class ValidateRecoveryRequest extends FormRequest
{
    public function rules()
    {
        return [
            config('nova-google2fa.recovery_input') => ['required', new RecoveryCodeRule()]
        ];
    }
}
