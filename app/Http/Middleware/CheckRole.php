<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role)
    {

        $roles = [
            'superadmin' => ['superadmin'],
            'masjiduser' => ['masjiduser', 'superadmin']
        ];
        $authrole_id = auth()->user() != null ? auth()->user()->user_group_id : ['guest'];
        $role_id = $roles[$role] ?? [];
        if (!in_array($authrole_id, $role_id)) {
            abort(403);
        }
        return $next($request);
    }
}
