<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class adminUserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('adminUser') && ($request->path() != 'admin/login')) {
            return redirect()->route("admin.login")->with('error','Login first');
        }

        if (session()->has('adminUser') && ($request->path() == 'admin/login')) {
            return back();
        }
        return $next($request);
    }
}
