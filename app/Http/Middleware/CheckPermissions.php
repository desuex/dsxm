<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $requiredPermission): Response
    {
        $user = $request->user();

        if (!$user || !($user->permissions & $requiredPermission)) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
