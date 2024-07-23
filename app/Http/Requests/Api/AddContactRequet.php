<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Base\BaseRequestForm;
use Illuminate\Foundation\Http\FormRequest;

class AddContactRequet extends BaseRequestForm
{
      public function rules()
    {
        return [
            'name' => "required",
            'email' => "required",
            'message' => "required",
        ];
    }
}
