<?php

namespace App\Http\Requests\Dashboard\Auth;

use App\Http\Requests\Base\BaseRequestForm;

class LoginRequest extends BaseRequestForm
{


    public function rules()
    {
        return [
            'email' => 'required|string|email|max:255|exists:users,email',
            'password' => 'required|string|min:6',
        ];
    }
}
