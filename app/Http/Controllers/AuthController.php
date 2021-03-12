<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;
use App\Models\User;
use Exception;
use DB;

class AuthController extends ApiController
{
    private function jwt($user_id)
    {
        $time_expired = (int) env('JWT_TIME_EXPIRED');
        $payload = [
            'iss' => 'geor-jwt',
            'sub' => $user_id,
            'iat' => time(),
            'exp' => time() + $time_expired
        ];

        $jwt = JWT::encode($payload, env('JWT_SECRET'));
    }

    public function login(Request $request)
    {
        try {
            $this->validateRequest($request, 'login');

            $user = User::whereEmail($request->email)->first();

            if($user) {
                if(Hash::check($request->password, $user->password)) {
                        $token = $this->jwt($user->id);

                        $user = [
                            'api_token' => $token,
                            'user' => $user
                        ];

                        return $this->responseApi(null, $user);
                }
                throw new Exception('invalid_password', 401);
            }
            throw new Exception('invalid_email', 401);


        } catch(Exception $e) {
            $error = $this->getGeneralError($e);
            return $this->responseApi($error['message'], null, $error['code'], 'error');
        }
    }
}