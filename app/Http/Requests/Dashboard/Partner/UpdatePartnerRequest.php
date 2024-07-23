<?php

namespace App\Http\Requests\Dashboard\Partner;

use App\Http\Requests\Base\BaseRequestForm;

class UpdatePartnerRequest extends BaseRequestForm
{


    public function rules()
    {
        return [
            'image' =>  "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",

        ];
    }
}
