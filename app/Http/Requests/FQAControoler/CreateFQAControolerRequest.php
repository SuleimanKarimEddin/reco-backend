<?php

namespace App\Http\Requests\FQAControoler;

use App\Http\Requests\Base\BaseRequestForm;

class CreateFQAControolerRequest extends BaseRequestForm
{
    public function rules()
    {
        return [
            'en_question' => 'required|string',
            'en_answer' => 'required|string',
            'ar_question' => 'required|string',
            'ar_answer' => 'required|string',
        ];
    }
}
