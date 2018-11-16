<?php
/**
 * ClientManager.
 *
 * @file RedirectIfNotAdmin.php
 * @project ClientManager
 *
 * @author Wayne Brummer
 */

/**
 * ClientManager.
 *
 * @project ClientManager
 * @description
 *
 * @author Wayne Brummer
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @param null|string              $guard
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('admin/login')
                ->with('error', 'You need to log in first!');
        }
//        if (Auth::guard($guard)->check()) {
//            return redirect('admin/home');
//        }

        return $next($request);
    }
}
