<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Logger;
use Validator;
use Exception;

class ApiController extends Controller
{
    /**
     * Validate fields
     */
    protected function validateRequest($request, $rule = '', $id = '') {
        $rules = $this->getRules($rule, $id);
        
        $validator = Validator::make($request->all(), $rules);
        
        $errors = $validator->fails() ? $validator->errors() : [];
        
        if(count($errors)) {
            $errors = $errors->messages();
            $stringError = '';
            
            foreach ($errors as $key => $error) {
                foreach ($error as $err) {
                    $stringError = $err.' '.$stringError;
                }
            }

            throw new Exception($stringError, 422);
        }
        return false;
    }

    /**
     * Obtain Rules Validation
     */
    private function getRules($flag, $id) {
        $rule = config('rules.' . $flag);

        if(!$rule) throw new Exception('Rule does not exist', 500);

        return $rule;
    }

    /**
     * Response
     */
    protected function responseApi($message = null, $result = null, $code = 200, $status = 'success') {
        return response()->json([
            'status' => $status,
            'result' => $result,
            'message' => $message
        ], $code);
    }

    /**
     * Return Error Code in Exception
     */
    protected function getGeneralError($error) {
        $code = $error->getCode();
        $message = $error->getMessage();

        if($code >= 300 && $code <= 505) {
            return [
                'code' => $code,
                'message' => $message
            ];
        }

        return [
            'code' => 500,
            'message' => $message
        ];
    }

    protected function logger($action, $ip) {
        Logger::create(['action' => $action, 'ip' => $ip]);
    }
}
