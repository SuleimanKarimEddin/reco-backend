<?php

namespace App\Http\Resources\FQAControoler;

use Illuminate\Http\Resources\Json\JsonResource;

class GetAllFQAControolerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
