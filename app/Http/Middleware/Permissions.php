<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Permissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $code, $attribute)
    {
        if ($request->user() && !$request->user()->IsPermitted($code, $attribute) || !$request->user()) {
            request()->session()->flash('alert-danger', __('messages.access_denied'));
            if ($request->user()) return redirect('/home');
            return redirect('/');
        }

        return $next($request);
    }
}
