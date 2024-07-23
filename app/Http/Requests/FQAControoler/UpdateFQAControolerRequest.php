<?php

namespace App\Http\Requests\FQAControoler;

use App\Http\Requests\Base\BaseRequestForm;

class UpdateFQAControolerRequest extends BaseRequestForm
{
    public function rules()
    {
        return [
            'id' => 'integer|required',
            'en_question' => 'string',
            'ar_question' => 'string',
            'en_answer' => 'string',
            'ar_answer' => 'string',
        ];
    }
}
