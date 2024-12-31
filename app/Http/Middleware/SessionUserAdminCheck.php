<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Carbon;

class SessionUserAdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $loginTime = session('login_time');
        $timeout = 120;        

        if ($loginTime) {
            $elapsedMinutes = Carbon::parse($loginTime)->diffInMinutes(now());

            if ($elapsedMinutes > $timeout) {
                session()->forget(['userData', 'login_time']);
                return redirect('/')->withErrors(['error' => 'Sesi berakhir, silakan login kembali.']);
            }
        } else {
            return redirect('/')->withErrors(['error' => 'Silakan login terlebih dahulu.']);
        }

        return $next($request);
    }
}
