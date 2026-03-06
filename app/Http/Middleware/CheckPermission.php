<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $permission
     */
    public function handle(Request $request, Closure $next, string $permission): Response
    {
        $user = auth()->user();

        // Vérifie que l'utilisateur est connecté et a la permission
        if (!$user || !$user->can($permission)) {
            abort(403, "Vous n'avez pas la permission requise.");
        }

        return $next($request);
    }
}
