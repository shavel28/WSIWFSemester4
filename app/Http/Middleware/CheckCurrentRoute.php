<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CheckCurrentRoute
{
    public function handle(Request $request, Closure $next)
    {
        $currentRouteName = Route::currentRouteName();

        // Contoh: Blokir akses jika route bukan 'check.route'
        if ($currentRouteName !== 'check.route') {
            return response()->json([
                'message' => 'Akses ditolak! Anda tidak dapat mengakses rute ini.'
            ], 403);
        }

        return $next($request);
    }
}
