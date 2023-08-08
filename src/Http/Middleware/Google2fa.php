<?php

namespace CubeAgency\NovaGoogle2fa\Http\Middleware;

use Closure;
use CubeAgency\NovaGoogle2fa\Google2FaAuthenticator;
use Illuminate\Support\Facades\Hash;
use PragmaRX\Google2FA\Google2FA as G2fa;
use PragmaRX\Recovery\Recovery;

class Google2fa
{
    public function handle($request, Closure $next)
    {
        if (!config('nova-google2fa.enabled')) {
            return $next($request);
        }

        $user = auth()->user();

        if ($this->userHasNotFinishedSetup($request, $user)) {
            return redirect()->to(route('nova.google2fa.register.index'));
        }

        if ($this->userHasFinishedSetup($request, $user)) {
            return redirect()->to(route('nova.google2fa.authenticate.index'));
        }

        if ($this->userIsAuthenticating($request) || $this->userIsAuthenticated($request)) {
            return $next($request);
        }

        if ($this->twoFactorAuthNotSetup($user)) {
            $google2fa = new G2fa();
            $recovery = new Recovery();
            $data['recovery'] = $recovery
                ->setCount(config('nova-google2fa.recovery_codes.count'))
                ->setBlocks(config('nova-google2fa.recovery_codes.blocks'))
                ->setChars(config('nova-google2fa.recovery_codes.chars_in_block'))
                ->toArray();

            $user2faModel = config('nova-google2fa.models.user2fa');
            $user2faModel::where('user_id', $user->id)->delete();

            $recoveryHashes = $data['recovery'];
            array_walk($recoveryHashes, function (&$value) {
                $value = Hash::make($value);
            });

            $user2faModel::create([
                'user_id' => $user->id,
                'google2fa_secret' => $google2fa->generateSecretKey(),
                'recovery' => $recoveryHashes,
            ]);

            return response(view('nova-google2fa::controllers.setup', $data));
        }

        return redirect()->to(route('nova.google2fa.authenticate.index'));
    }

    private function userIsAuthenticating($request): bool
    {
        $novaPath = trim(config('nova.path'), '/') . '/';
        return $request->path() === $novaPath . 'google2fa/authenticate' || $request->path() === $novaPath . 'google2fa/register'
            || $request->path() === $novaPath . 'google2fa/recover';
    }

    private function userHasNotFinishedSetup($request, $user): bool
    {
        return $request->path() === config('nova.path') . 'google2fa/authenticate' && (bool)$user->user2fa->google2fa_enable === false;
    }

    private function userHasFinishedSetup($request, $user): bool
    {
        return $request->path() === config('nova.path') . 'google2fa/register' && (bool)$user->user2fa->google2fa_enable === true;
    }

    private function userIsAuthenticated($request): bool
    {
        $authenticator = app(Google2FaAuthenticator::class)->boot($request);

        return auth()->guest() || $authenticator->isAuthenticated();
    }

    private function twoFactorAuthNotSetup($user): bool
    {
        return !$user->user2fa || $user->user2fa->google2fa_enable === 0;
    }
}
