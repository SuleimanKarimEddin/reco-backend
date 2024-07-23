<?php

namespace App\Repositories;

use App\Constants\AuthConstant;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthRepository
{

    public function login($email, $password) :array | bool
    {

        $admin  =  User::where('email', $email)->first();

        if(!Hash::check($password, $admin->password)){
            return false;
        }
        $token = $admin->createToken(AuthConstant::TOKEN_APP)->plainTextToken;

        return [
            "token" => $token ,
            "admin" => $admin
        ];
    }
}
