<?php

namespace App\Http\Requests\Dashboard\Catgeory;

use App\Http\Requests\Base\BaseRequestForm;

class UpdateCatgeoryRequest extends BaseRequestForm
{
    public function rules()
    {
        return [
            'category_id'=>'required|exists:categories,id',
            'is_active'=>'required|boolean',
            'en_name'=>'required',
            'ar_name'=>'required'
        ];
    }
}