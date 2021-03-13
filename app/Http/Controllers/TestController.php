<?php

namespace App\Http\Controllers;


class TestController extends Controller
{
    public function test()
    {
        try {
            return 'Welcome Geor!';
        } catch (Excepcion $e) {
            return $e;
        }
    }
}
