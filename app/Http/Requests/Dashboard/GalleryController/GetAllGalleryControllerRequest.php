<?php

namespace App\Http\Requests\Dashboard\GalleryController;

use App\Http\Requests\Base\BaseRequestForm;

class GetAllGalleryControllerRequest extends BaseRequestForm
{
    public function rules()
    {
        return [
            'per_page' => 'integer',
        ];
    }
}
