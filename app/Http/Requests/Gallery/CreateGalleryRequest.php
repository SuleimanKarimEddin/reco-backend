<?php

namespace App\Http\Requests\Gallery;

use App\Http\Requests\Base\BaseRequestForm;

class CreateGalleryRequest extends BaseRequestForm
{
    public function rules()
    {
        return [
            'ar_body' => 'string',
            'ar_title' => 'string',
            'en_body' => 'string',
            'en_title' => 'string',
            'hight' => 'integer',
            'type' => 'string',
            'width' => 'integer',
            'image' => 'required|image|mimes:jpeg,bmp,svg,png|max:10000',
            'is_active' => 'string',

        ];
    }
}
