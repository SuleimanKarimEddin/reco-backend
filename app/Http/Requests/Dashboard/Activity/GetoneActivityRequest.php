<?php

namespace App\Http\Requests\Dashboard\Activity;

use App\Http\Requests\Base\BaseRequestForm;

class GetoneActivityRequest extends BaseRequestForm
{


    public function rules()
    {
        return [
            'activity_id' => 'required|integer|exists:activities,id',
        ];
    }
}
