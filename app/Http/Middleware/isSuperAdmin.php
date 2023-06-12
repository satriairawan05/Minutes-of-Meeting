<?php

namespace App\Http\Middleware;

use App\Models\GroupPage;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!auth()->user()->group_id == 1 || !GroupPage::where('group_id',1)){
            return abort(403);
        }

        return $next($request);
    }
}
