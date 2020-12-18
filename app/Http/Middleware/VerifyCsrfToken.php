<?php

namespace App\Http\Middleware;

use Themosis\Core\Http\Middleware\VerifyCsrfToken as Middleware;

use Illuminate\Session\TokenMismatchException;

class VerifyCsrfToken extends Middleware
{
    /**
     * URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    public function handle($request, \Closure $next)
    {
        if ($this->isReading($request)
        || $this->isGravityFormsPost($request)
        || $this->isRunningUnitTests()
        || $this->inExceptArray($request)
        || $this->tokensMatch($request)) {
            return tap($next($request), function ($response) use ($request) {
                if ($this->addHttpCookie) {
                    $this->addCookieToResponse($request, $response);
                }
            });
        }

        throw new TokenMismatchException();
    }


    public function isGravityFormsPost($request)
    {
        if ($request->isMethod('POST')) {
            if (!empty($request->input('gform_submit'))) {
                return true;
            }
        }
    }
}
