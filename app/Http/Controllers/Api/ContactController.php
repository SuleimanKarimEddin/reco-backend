<?php

namespace App\Http\Controllers\Api;

use App\Enums\ResponseEnum;
use App\Enums\VolunteerTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AddContactRequet;
use App\Models\ContactUs;
use App\Models\Volunteering;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    public function addContact(AddContactRequet $request){

        $data = ContactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);
        return $this->sendResponse(ResponseEnum::ADD , $data);
    }
    public function addVolunteer(AddContactRequet $request){

        $type = (VolunteerTypeEnum::PRESONAL == $request->type ||$request->type  === VolunteerTypeEnum::COMPANY ) ? $request->type : VolunteerTypeEnum::PRESONAL  ;
        $data = Volunteering::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            "type" =>  $type,
        ]);
        return $this->sendResponse(ResponseEnum::ADD , $data);
    }
}
