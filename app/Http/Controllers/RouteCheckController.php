<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class RouteCheckController extends Controller
{
    public function checkRoute(Request $request)
    {
        $currentRouteName = Route::currentRouteName(); // Nama rute
        $currentRouteAction = Route::currentRouteAction(); // Action controller

        return response()->json([
            'route_name' => $currentRouteName,
            'route_action' => $currentRouteAction,
            'full_url' => $request->fullUrl() // URL lengkap
        ]);
    }
}
