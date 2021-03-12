<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Validator;
use Exception;

class ApiController extends Controller
{
    /**
     * Validate fields
     */
    protected function validateRequest($request, $rule = '', $id = '')
    {
        $rules = $this->getRules($rule, $id);

        $validator = Validator::make($request->all(), $rules);

        $errors = $validator->fails() ? $validator->errors() : [];

        if(count($errors)) {
            $errors = $errors->messages();
            $stringError = '';

            foreach ($errors as $key => $error) {
                foreach ($error as $err) {
                    if($language == 'es') {
                        $arrayValue = explode('_', $key);

                        $oldString = $this->countLabels($arrayValue);
                        $newString = __($key);

                        $replaceString = str_replace($oldString, $newString, $err);
                        $stringError = $replaceString . ' ' . $stringError;
                        continue;
                    }
                    $stringError = $err . ' ' . $stringError;
                }
            }

            throw new Exception($stringError, 422);
        }
        return false;
    }

    /**
     * Obtain Rules Validation
     */
    private function getRules($flag, $id)
    {
        $rule = config('rules.' . $flag);

        if($id) {
            foreach ($rule as $key => $r) {
                if(Str::startsWith($rule[$key], 'unique')) {
                    $rule[$key] = Str::replaceFirst('unique:users,email', 'unique:users,email,'.$id, $rule[$key]);
              }
            }
        }

        if(!$rule) throw new Exception('Rule does not exist', 500);

        return $rule;
    }

    /**
     * Response
     */
    protected function responseApi($message = null, $result = null, $code = 200, $status = 'success')
    {
        return response()->json([
            'status' => $status,
            'result' => $result,
            'message' => $message
        ], $code);
    }

    /**
     * Return Error Code in Exception
     */
    protected function getGeneralError($error)
    {
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
}
