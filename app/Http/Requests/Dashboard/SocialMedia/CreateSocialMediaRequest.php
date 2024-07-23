<?php

namespace App\Http\Requests\Dashboard\SocialMedia;

use App\Http\Requests\Base\BaseRequestForm;

class CreateSocialMediaRequest extends BaseRequestForm
{
    public function rules()
    {
        return [
            // 'social_media_sort' => 'nullable|integer|max:1000|min:1',
            'link' => 'nullable|max:500|min:3|string|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'image' => 'required|image|mimes:jpeg,bmp,svg,png|max:10000',
        ];
    }
}
