<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserSimpleResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'profil' => $this->profil,
            'extension' => $this->toInvestor
        ];
    }
}
