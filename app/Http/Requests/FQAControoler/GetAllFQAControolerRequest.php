<?php

namespace App\Http\Requests\FQAControoler;

use App\Http\Requests\Base\BaseRequestForm;

class GetAllFQAControolerRequest extends BaseRequestForm
{
    

    public function rules()
    {
        return [
            "per_page" => "nullable|integer",

        ];
    }
}