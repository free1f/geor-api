<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use App\Models\User;
use Exception;

class JwtAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        try {
            $token = $request->header('Authorization');
            $token = str_replace('Bearer ', '', $token);

            if(!$token) throw new Exception('Token not provided', 001);

            $user = $this->verifyUser($token, $roles);
            $request->auth = $user;
            return $next($request);

        } catch(ExpiredException $e) {
            return $this->responseApi([
                'error' => 'Provided token is expired',
                'code' => 002
            ], 400);
        } catch(Exception $e) {
            return $this->responseApi([
                'error' => $e->getMessage(),
                'code' => $e->getCode()
            ], 401);
        }
    }

    private function verifyUser($token, $roles)
    {
        $credentials = JWT::decode($token, env('JWT_SECRET'), array('HS256'));

        $user = User::where('id', $credentials->sub)->first();

        if(!$user) throw new Exception('User not found', 003);

        if(count($roles)) {
            $count = 0;
            foreach($roles as $role) {
                if($user->role->slug == $role) {
                    $count++;
                }
            }

            if(!$count) {
                throw new Exception('Unauthorized', 004);
            }
        }

        return $user;
    }

    protected function responseApi($message, $code)
    {
        return response()->json($message, $code);
    }
}
