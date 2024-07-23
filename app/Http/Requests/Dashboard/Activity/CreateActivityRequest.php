<?php

namespace App\Http\Requests\Dashboard\Activity;

use App\Http\Requests\Base\BaseRequestForm;

class CreateActivityRequest extends BaseRequestForm
{
    public function rules()
    {
        return [
            "en_title"=> "required",
            'en_description' => 'required|string',
            "ar_title"=> "required|string",
            'ar_description' => 'required|string',
            'en_location'=> 'required|string',
            'ar_location'=> 'required|string',
            'start_date'=> 'required|date|before:end_date',
            'end_date'=> 'required|date',
            'image' => 'required|image|mimes:jpeg,bmp,svg,png|max:10000',
        ];
    }
}
