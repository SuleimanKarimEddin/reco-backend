<?php

namespace App\Http\Requests\Dashboard\Catgeory;

use App\Http\Requests\Base\BaseRequestForm;

class CreateCatgeoryRequest extends BaseRequestForm
{
    

    public function rules()
    {
        return [
            'is_active' =>'required',
            'en_name'=>'required',
            'ar_name'=>'required'
        ];
    }
}