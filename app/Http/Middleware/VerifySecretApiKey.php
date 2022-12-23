<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VerifySecretApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $secret = $request->header('X-API-KEY');

        if (!$secret || $secret !== env('X_API_KEY'))
        {
            return Response::json([
                "message" => "X-API-KEY missing in request headers"
            ], 403);
        }

        return $next($request);
    }
}
         