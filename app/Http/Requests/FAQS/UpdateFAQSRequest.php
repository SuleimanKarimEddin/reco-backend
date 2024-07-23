<?php

namespace App\Http\Requests\FAQS;

use App\Http\Requests\Base\BaseRequestForm;

class UpdateFAQSRequest extends BaseRequestForm
{
    public function rules()
    {
        return [
            'id' => 'required|exists:faqs,id',
            'en_question' => 'string',
            'ar_question' => 'string',
            'en_answer' => 'string',
            'ar_answer' => 'string',
            'is_active' => 'string',
            'priority' => 'integer',
        ];
    }
}
