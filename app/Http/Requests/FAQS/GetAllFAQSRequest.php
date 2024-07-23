<?php

namespace App\Http\Requests\FAQS;

use App\Http\Requests\Base\BaseRequestForm;

class GetAllFAQSRequest extends BaseRequestForm
{
    

    public function rules()
    {
        return [
            "per_page"=> "string",
        ];
    }
}