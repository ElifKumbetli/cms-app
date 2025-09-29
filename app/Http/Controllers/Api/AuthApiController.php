<?php

namespace App\Http\Controllers\Api;

use App\Classes\LoginClass;
use Illuminate\Http\Request;


class AuthApiController
{
    public function login(Request $request)
    {
        $class = new LoginClass();
        return response()->json($class->login($request));
    }
}
