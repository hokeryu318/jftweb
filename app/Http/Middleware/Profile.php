<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\Receipt;
use Illuminate\Support\Facades\View;

class Profile
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

//        $profile = collect();

        $profile = Receipt::profile();

        View::share(compact('profile'));

        return $next($request);
    }
}