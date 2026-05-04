<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Backend\Setting;
use Illuminate\Support\Facades\Auth;

class CheckMaintenanceMode
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $web_cfg = Setting::first();

        if ($web_cfg && $web_cfg->maintenance_mode == 1) {
            
            if (!Auth::check() || Auth::user()->level !== 'admin') {

                if (!$request->is('maintenance') && !$request->is('login*') && !$request->is('logout')) {
                    return redirect()->route('maintenance');
                }
            }
        }

        return $next($request);
    }
}