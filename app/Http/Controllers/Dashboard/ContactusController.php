<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\ResponseEnum;
use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    public function getAll(Request $request){

        return $this->sendResponse(ResponseEnum::GET , ContactUs::paginate($request->per_page ?? 10));
    }
}
