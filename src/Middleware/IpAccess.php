<?php

namespace Nckg\Firewall\Middleware;

use Closure;
use Nckg\Firewall\Firewall;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class IpAccess
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! (new Firewall(config('firewall.whitelist')))->isAllowed($request->ip())) {
            throw new UnauthorizedHttpException('Unauthorized');
        }

        return $next($request);
    }
}
