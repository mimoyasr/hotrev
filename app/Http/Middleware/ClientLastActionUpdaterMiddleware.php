<?php

namespace App\Http\Middleware;

use App\User;
use Illuminate\Support\Facades\Auth;
use carbon\Carbon as carbon;

use Closure;

class ClientLastActionUpdaterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Auth::user()->update([
            'last_action' => Carbon::now()->timestamp
            ]);
        return $next($request);
    }
}
