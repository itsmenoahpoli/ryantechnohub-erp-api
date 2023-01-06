<?php

namespace App\Http\Controllers\Api\Core;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Services\AuthService;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\OtpRequest;
use App\Http\Requests\Auth\VerifyOtpRequest;

class AuthController extends Controller
{
    private $authService;

    public function __construct(
        AuthService $authService
    )
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request) : JsonResponse
    {
        try
        {
            $credentials = $request->validated();
            $user = $this->authService->login($credentials, $request);

            return response()->json($user, 200);
        }
        catch (Exception $e)
        {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }

    public function logout(Request $request)
    {
        try
        {
            $data = $this->authService->logout($request->user());

            return response()->json($data, 200);
        } catch (Exception $e)
        {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }

    public function requestOtp(OtpRequest $request)
    {
        try
        {  
            $data = $this->authService->requestOtp((object) $request->validated());

            return response()->json($data, $data === 'OTP_CREATED' ? 200 : 400);
        } catch (Exception $e)
        {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }

    public function verifyOtp(VerifyOtpRequest $request)
    {
        try
        {  
            $data = $this->authService->verifyOtp((object) $request->validated());

            return response()->json($data, $data === 'VALID_CODE' ? 200 : 400);
        } catch (Exception $e)
        {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }
}
