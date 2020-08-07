<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

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
        // $allowedOrigins = '*';
        $allowedOrigins = 'http://localhost:8080';
        header('Access-Control-Allow-Origin: '. $allowedOrigins);
        $headers = [
            'Access-Control-Allow-Methods'=> 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers'=> 'Content-Type, X-Auth-Token, Origin',
            'Access-Control-Allow-Credentials' => true
        ];
        if($request->getMethod() == 'OPTIONS'){
            return response('', 200)->withHeaders($headers);
        }
        return $next($request);
    }
}