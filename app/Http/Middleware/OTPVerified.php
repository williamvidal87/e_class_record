<?php

namespace App\Http\Middleware;

use App\Http\Controllers\OTPController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OTPVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && !Auth::user()->is_otp_verified) {
            if (request()->path()!='otp/verify'&&!Auth::user()->is_otp_verified){
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
            }
            return app(OTPController::class)->sendOTP();
        }

        return $next($request);
    }
}
