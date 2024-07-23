<?php

namespace App\Http\Requests\Dashboard\SocialMedia;

use App\Http\Requests\Base\BaseRequestForm;

class UpdateSocialMediaRequest extends BaseRequestForm
{


    public function rules()
    {
        return [
            // 'sort' => 'nullable|integer|max:1000|min:1',
            'link' => 'nullable|max:500|min:3|string|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'image' => 'nullable|image|mimes:jpeg,bmp,svg,png|max:10000',
            'social_media_id' => 'required|integer|exists:social_media,id',
        ];
    }
}
