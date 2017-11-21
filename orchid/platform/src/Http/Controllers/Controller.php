<?php

namespace Orchid\Platform\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param string $permission
     */
    protected function checkPermission(string $permission)
    {
        $this->middleware(function ($request, $next) use ($permission) {
            if (Auth::user()->hasAccess($permission)) {
                return $next($request);
            }
            abort(403);
        });
    }
}
