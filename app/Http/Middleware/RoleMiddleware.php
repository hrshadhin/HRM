<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Spatie\Permission\Models\Role;
class RoleMiddleware
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
        if (Auth::guest()) {
            return redirect('/');
        }

        if (! $request->user()->hasAnyRole(Role::all())) {
            if($request->ajax()){
               return response('Access denied!', 401);
            }
            abort(403);
        }
        $routeName = $request->route()->getName();
       // dd($routeName);
        if (! $request->user()->hasPermissionTo($routeName)) {
            if($request->ajax()){
                return response('Access denied!', 401);
            }
            abort(403);
        }

        return $next($request);
    }
}
