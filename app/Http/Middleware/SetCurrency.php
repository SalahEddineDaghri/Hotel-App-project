<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class SetCurrency
{
    public function handle($request, Closure $next)
    {
        if (!Session::has('currency')) {
            Session::put('currency', 'MAD'); // العملة الافتراضية
        }
        return $next($request);
    }
}
