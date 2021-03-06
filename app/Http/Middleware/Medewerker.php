<?php

namespace App\Http\Middleware;

use Closure;

class Medewerker
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
        if (auth()->user()->type_id == 3 || auth()->user()->type_id == 4){
            return $next($request);
        }
        return abort(403, 'Alleen medewerkers hebben toegang tot deze pagina!');
    }
}
