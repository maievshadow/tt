<?php
namespace App\Http\Middleware;

use Closure;

class Testzf 
{
    public function handle($request, Closure $next){
        return $next($request);
    }
}
