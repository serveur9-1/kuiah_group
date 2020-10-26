<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'is_investor' => $this->is_investor,
            'is_actived' => $this->is_actived,
            'is_archived' => $this->is_archived,
            'profil' => $this->profil,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'extension' => $this->toInvestor,
            /*Afficher lorsque c'est l'admin*/
            'real_estates' => RealEstateResource::collection($this->toRealEstate)
        ];
    }
}