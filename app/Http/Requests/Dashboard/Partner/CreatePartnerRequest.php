<?php

namespace App\Http\Requests\Dashboard\Partner;

use App\Http\Requests\Base\BaseRequestForm;

class CreatePartnerRequest extends BaseRequestForm
{


    public function rules()
    {
        return [
        'image' =>  "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ];
    }
}
