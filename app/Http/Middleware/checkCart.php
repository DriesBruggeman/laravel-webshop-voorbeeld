<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class checkCart
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
        if(Session::has('cart') && count(Session::get('cart')->products) > 0) {
            return $next($request);
        }else{
            return redirect(route('viewCart'));
        }
    }
}
