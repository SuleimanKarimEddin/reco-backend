<?php

namespace App\Http\Requests\Dashboard\Catgeory;

use App\Http\Requests\Base\BaseRequestForm;

class UpdateCategoryStatusRequest extends BaseRequestForm
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category_id'=>'required|exists:categories,id',
            'new_status'=>'required'
        ];
    }
}
