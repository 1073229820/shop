<?php

namespace App\Http\Middleware;

use Closure;

class AdminCheckLogin
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
        $session = session('adminname');
        if ($session) {
            return $next($request);
        } else {
            return redirect('admin/login');
        }

    }
}
