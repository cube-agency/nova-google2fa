<?php

namespace CubeAgency\NovaGoogle2fa\Http\Requests;

use CubeAgency\NovaGoogle2fa\Rules\ValidCodeRule;
use Illuminate\Foundation\Http\FormRequest;

class ValidateOtpRequest extends FormRequest
{
    public function rules()
    {
        return [
            config('google2fa.otp_input') => ['required', 'digits:6', new ValidCodeRule()]
        ];
    }
}
