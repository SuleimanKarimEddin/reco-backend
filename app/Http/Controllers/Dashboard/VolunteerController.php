<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\ResponseEnum;
use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Volunteering;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function getAll(Request $request){

        return $this->sendResponse(ResponseEnum::GET , Volunteering::paginate($request->per_page ?? 10));
    }
}
