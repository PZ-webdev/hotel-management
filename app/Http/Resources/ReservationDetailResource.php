<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'address' => $this->address,
            'city' => $this->city,
            'phone' => $this->phone,
            'verified_at' => $this->verified_at == null ? '-' : $this->verified_at,
            'name'  => $this->rooms->name,
        ];
    }
}
