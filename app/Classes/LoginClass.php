<?php

namespace App\Classes;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginClass
{
    public function login(Request $request)
    {
        try {
            $email = $request->get('email');
            $password = $request->get('password');

            if ($email == null) {
                return ["status" => false, "message" => "Email alanı boş olamaz."];
            }

            if ($password == null) {
                return ["status" => false, "message" => "Şifre alanı boş olamaz."];
            }


            $user = User::where('email', $email)->first();
            if ($user == null) {
                return ["status" => false, "message" => "Kullanıcı bulunamadı."];
            }

            if (!Hash::check($password, $user->password)) {
                return ["status" => false, "message" => "Şifre hatalı."];
            }

            Auth::login($user);

            if (Auth::check()) {
                return ["status" => true, "message" => "Giriş işlemi başarılı."];
            }
        } catch (\Throwable $th) {
            return ["status" => false, "message" => "Giriş işlemi başarısız."];
        }
    }
}
