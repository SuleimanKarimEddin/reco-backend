<?php

namespace App\Http\Requests\Dashboard\GalleryController;

use App\Http\Requests\Base\BaseRequestForm;

class CreateGalleryControllerRequest extends BaseRequestForm
{
    

    public function rules()
    {
      return [
        'is_active' => 'required|boolean',
        'width' => 'required|string',
        'height' => 'required|string',
        'type' => 'required|string',
        'URL' => 'required|string|url',
        'translations' => 'required|array',
        'translations.*.locale' => 'required|string',
        'translations.*.title' => 'required|string',
        'translations.*.body' => 'nullable|string',
    ];
    }
}