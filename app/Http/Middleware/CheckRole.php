<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user) {
            if($user->roles[0]->name == 'admin'){
                return $next($request);
            }else{
                return redirect()->route('home');
            }
        }

        return redirect()->route('admin.loginPage')->with('error', 'Unauthorized.');
    }
}
