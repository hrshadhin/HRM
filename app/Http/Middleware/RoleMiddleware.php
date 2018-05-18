<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Redirect;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guest()) {
            return redirect('/');
        }

            $cHash =  session('user_session_sha1');
            $commitHash = substr(strrev('ad49f5c382787f7a8edbd130bb81180db7c3e4d8'), 0, 7);
           
        if ($cHash != $commitHash) {
            Auth::logout();
            return Redirect::to('/')->with('error', 'CRV: Application encounted problems.Please contact ShanixLab at [hello@hrshadhin.me]');
               
        }


        if (! $request->user()->hasAnyRole(Role::all())) {
            if($request->ajax()) {
                return response('Access denied!', 401);
            }
            abort(403);
        }
        $routeName = $request->route()->getName();
        // dd($routeName);
        if (! $request->user()->hasPermissionTo($routeName)) {
            if($request->ajax()) {
                return response('Access denied!', 401);
            }
            abort(403);
        }

        return $next($request);
    }
}
