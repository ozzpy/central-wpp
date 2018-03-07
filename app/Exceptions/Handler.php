<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if($e instanceof \Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException){
            return response()->json([$e->getMessage()], $e->getStatusCode());
        }
        return parent::render($request, $e);
    }
    
    // if($e instanceof \Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException){
    //     if ($e instanceof Tymon\JWTAuth\Exceptions\TokenExpiredException) {
    //         return response()->json(['token_expired'], $e->getStatusCode());
    //     } else if ($e instanceof Tymon\JWTAuth\Exceptions\TokenInvalidException) {
    //         return response()->json(['token_invalid'], $e->getStatusCode());
    //     }
    // }
}
