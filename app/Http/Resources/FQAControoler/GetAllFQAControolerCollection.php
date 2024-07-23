<?php

namespace App\Http\Resources\FQAControoler;

use Illuminate\Http\Resources\Json\ResourceCollection;

class GetAllFQAControolerCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
