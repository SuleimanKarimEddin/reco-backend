<?php

namespace App\Http\Requests\Dashboard\SocialMedia;

use App\Http\Requests\Base\BaseRequestForm;
use Illuminate\Validation\Rule;

class UpdateSocialMediaStatusRequest extends BaseRequestForm
{


    public function rules()
    {
        return [
            'new_status' => ['required'],
            'social_media_id' => 'required|integer|exists:social_media,id',
        ];
    }
}
