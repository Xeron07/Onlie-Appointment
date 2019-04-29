<?php

namespace App\Http\Middleware;

use Closure;

class verifyModarator
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
        if(!$request->session()->get("job")=="modarator")
        {
            return redirect("/login");
        }
       
        return $next($request);
    }
}