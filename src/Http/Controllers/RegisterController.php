<?php

namespace CubeAgency\NovaGoogle2fa\Http\Controllers;

use CubeAgency\NovaGoogle2fa\Http\Requests\ValidateOtpRequest;
use Illuminate\Routing\Controller;
use PragmaRX\Google2FAQRCode\Google2FA;

class RegisterController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $google2fa = new Google2FA();

        $image = $google2fa->getQRCodeInline(
            config('app.name'),
            $user->email,
            $user->user2fa->google2fa_secret
        );

        if (!str_starts_with($image, 'data:image/')) {
            $image = $this->encodeAsImageUrl($image);
        }

        return view('nova-google2fa::controllers.register', [
            'qr' => $image,
            'secret' => $user->user2fa->google2fa_secret
        ]);
    }

    public function register(ValidateOtpRequest $request)
    {
        auth()->user()->user2fa->update(['google2fa_enable' => true]);

        return response()->redirectTo(route('nova.google2fa.authenticate.index'));
    }


    private function encodeAsImageUrl($inlineSvg): string
    {
        return sprintf('data:image/svg+xml;base64,%s', base64_encode($inlineSvg));
    }
}
