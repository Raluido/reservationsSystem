<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $permission = null, $guard = null)
    {
        $authGuard = auth()->guard($guard);

        if (!$authGuard) {
            throw UnauthorizedException::notLoggedIn();
        }

        // no entiendo que hace exactamente

        // if (!is_null($permission)) {                 
        //     $permissions = is_array($permission)
        //         ? $permission
        //         : explode('|', $permission);
        // }

        if (is_null($permission)) {
            $permission = $request->route()->getName();

            $permissions = array($permission);
        }

        foreach ($permissions as $permission) {
            if (User::find(auth()->id())->can($permission)) {
                return $next($request);
            }
        }

        throw UnauthorizedException::forPermissions($permissions);
    }
}
