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
            'id' => $this->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'is_investor' => $this->is_investor,
            'is_actived' => $this->is_actived,
            'is_archived' => $this->is_archived,
            'is_first_activation' => $this->is_first_activation,
            'profil' => $this->profil,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'extension' => new InvestorResource($this->toInvestor),
            'real_estates' => RealEstateResource::collection($this->toRealEstate),
            'projects' => ProjectResource::collection($this->toProject),
            'domains' => DomainSimpleResource::collection($this->toDomains),
            'friends' => UserSimpleResource::collection($this->friends)
        ];
    }
}
