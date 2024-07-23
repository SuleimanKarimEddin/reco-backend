<?php

namespace App\Http\Controllers\Api;

use App\Enums\ResponseEnum;
use App\Http\Controllers\Controller;
use App\Models\Faqs;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    public function faqs()
    {
        $data = Faqs::all();
        return $this->sendResponse(ResponseEnum::GET ,$data);
    }
}
