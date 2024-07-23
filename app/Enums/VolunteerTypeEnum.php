<?php 
namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

final class  VolunteerTypeEnum  extends Enum
{
    const COMPANY = 'company';
    const PRESONAL = 'personal';

}