<?php

namespace App\Http\Requests\FAQS;

use App\Http\Requests\Base\BaseRequestForm;

class CreateFAQSRequest extends BaseRequestForm
{
    public function rules()
    {
        return [
            'en_question' => 'required|string',
            'ar_question' => 'required|string',
            'en_answer' => 'required|string',
            'ar_answer' => 'required|string',
            'is_active' => 'required',
            'priority' => 'required|integer',

        ];
    }
}
