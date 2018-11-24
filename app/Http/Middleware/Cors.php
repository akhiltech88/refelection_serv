<?php

namespace App\Http\Middleware;

use Closure;
use Response;

class Cors
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
        
        if ($request->getMethod() === "OPTIONS") {
            $response = $next($request);
            $response->headers->set('Access-Control-Allow-Origin' , '*');
            $response->headers->set('Access-Control-Allow-Methods', 'GET ,POST, PUT, DELETE, OPTIONS');
            $response->headers->set('Access-Control-Allow-Headers', '*,content-type,users_id,access_token');
            return $response;
        }
            $response = $next($request);
            $response->headers->set('Access-Control-Allow-Origin' , '*');
            $response->headers->set('Access-Control-Allow-Methods', 'GET ,POST, PUT, DELETE, OPTIONS');
            $response->headers->set('Access-Control-Allow-Headers', '*,content-type,users_id,access_token');
            return $response;
    }
}
