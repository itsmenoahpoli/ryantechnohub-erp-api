<?php

namespace App\Services;

use Laravel\Passport\Token;
use Laravel\Passport\RefreshToken;

use App\Traits\LocationTrait;
use App\Models\User;
use App\Models\Users\UserOtp;
use Auth;
use DB;
use Str;

class AuthService
{
    use LocationTrait;

    public function login(array $credentials, $request)
    {
        if (Auth::attempt($credentials))
        {
            $location = $this->getUserLocation($request->ip());
            $device = $request->header('User-Agent');
            $user = Auth::user();
            $accessToken = $user->createToken(time().$user->id)->accessToken;

            return (object) [
                'authenticated' => true,
                'request' => (object) [
                    'client_ip' => $request->ip(),
                    'client_device' => $device,
                    'client_location' => $location
                ],
                'user' => $user,
                'accessToken' => $accessToken,
            ];
        }
    }

    public function logout(object $user)
    {
        $user->token()->revoke();

        return 'USER_LOGGED_OUT';
    }

    public function logoutAllDevices(object $user)
    {
        $tokens = $user->tokens->pluck('id');
        Token::whereIn('id', $tokens)->update(['revoked' => true]);
        RefreshToken::whereIn('access_token_id', $tokens)->update(['revoked', true]);

        return 'USER_LOGGED_OUT_ALL';
    }

    public function requestOtp(object $data)
    {
        $user = User::whereEmail($data->email)->first();

        if (!$user)
        {
            return 'USER_NOT_FOUND';
        }

        $otp = UserOtp::create([
            'user_id' => $user->id,
            'code' => strtoupper(Str::random(6)),
            'expires_at' => now()->addHours(1)
        ]);

        return 'OTP_CREATED';
    }

    public function verifyOtp(object $data)
    {
        $user = User::whereEmail($data->email)->first();

        if (!$user)
        {
            return 'INVALID_CODE';
        }

        $otp = UserOtp::where([
            'code' => $data->code,
            'user_id' => $user->id
        ])->first();

        if ($otp->exists())
        {
            if ($otp->is_used)
            {
                return 'USED_CODE';
            }

            if ($otp->expires_at > now()->addHours(4))
            {
                return 'EXPIRED_CODE';
            }

            return 'VALID_CODE';
        }

        return 'INVALID_CODE';
    }
}