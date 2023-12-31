<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!session()->isStarted()) session()->start();
        if(!session()->has("logged", "id_user")) {
            return redirect()->route('login')->withErrors([
                "msg" => "Silahkan Login Sebagai User MWC"
            ]);
        }
        return $next($request);
    }
}
