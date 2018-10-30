<?php

namespace App\Http\Middleware;

use App\Exceptions\ApiException;
use Closure;
use JWTAuth;
use Exception;

class authJWT
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
           $a = JWTAuth::parseToken();

             $user = JWTAuth::toUser($request->input('token'));
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                throw new ApiException('Token is Invalid',401);
                return response()->json(['error'=>'Token is Invalid']);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                throw new ApiException('Token is Expired',401);

                return response()->json(['error'=>'Token is Expired']);
            }else{
                throw new ApiException('Something is wrong',401);
                return response()->json(['error'=>'Something is wrong']);
            }
        }
        return $next($request);
    }
}
