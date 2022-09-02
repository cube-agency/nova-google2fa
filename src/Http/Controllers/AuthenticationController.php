<?php

namespace CubeAgency\NovaGoogle2fa\Http\Controllers;

use CubeAgency\NovaGoogle2fa\Http\Requests\ValidateOtpRequest;
use Illuminate\Routing\Controller;
use CubeAgency\NovaGoogle2fa\Google2FaAuthenticator;

class AuthenticationController extends Controller
{
    public function index()
    {
        return view('nova-google2fa::controllers.authentication');
    }

    public function authenticate(ValidateOtpRequest $request)
    {
        if (app(Google2FaAuthenticator::class)->isAuthenticated()) {
            return response()->redirectTo(config('nova.path'));
        }

        return redirect()->to(route('nova.google2fa.show.authenticate'));
    }
}
