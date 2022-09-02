<?php

namespace CubeAgency\NovaGoogle2fa\Http\Controllers;

use CubeAgency\NovaGoogle2fa\Http\Requests\ValidateRecoveryRequest;
use Illuminate\Routing\Controller;
use PragmaRX\Google2FALaravel\Google2FA;
use PragmaRX\Google2FALaravel\Support\Authenticator;

class RecoveryController extends Controller
{
    public function index()
    {
        return view('nova-google2fa::controllers.recovery');
    }

    public function recover(ValidateRecoveryRequest $request)
    {
        $authenticator = app(Authenticator::class);

        $authenticator->login();

        return response()->redirectTo(config('nova.path'));
    }

    public function destroy()
    {
        auth()->user()->user2fa->delete();

        app(Google2FA::class)->logout();

        return response()->redirectTo(config('nova.path'));
    }
}
