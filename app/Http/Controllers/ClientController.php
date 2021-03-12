<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends ApiController
{
    public function list(Request $request)
    {
        try {
            dd($request);
        } catch (Excepcion $e) {
            return $e;
        }
    }
}
