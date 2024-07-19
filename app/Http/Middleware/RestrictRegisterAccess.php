<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class RestrictRegisterAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $userCount = User::count();

        if ($userCount > 0 && (!Auth::check() || Auth::user()->role !== 'Responsable')) {
            return redirect('/');
        }

        return $next($request);
    }
}
