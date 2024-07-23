<?php

namespace App\Http\Requests\Dashboard\Activity;

use App\Http\Requests\Base\BaseRequestForm;

class UpdateActivityRequest extends BaseRequestForm
{


    public function rules()
    {
        return [
            'activity_id'=>'required|exists:activities,id',
            
        ];
    }
}
