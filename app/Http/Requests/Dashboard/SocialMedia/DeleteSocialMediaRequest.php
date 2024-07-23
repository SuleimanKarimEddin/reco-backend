<?php

namespace App\Http\Requests\Dashboard\SocialMedia;

use App\Http\Requests\Base\BaseRequestForm;

class DeleteSocialMediaRequest extends BaseRequestForm
{


    public function rules()
    {
        return [
            'social_media_id' => 'required|integer|exists:social_media,id',
        ];
    }
}
