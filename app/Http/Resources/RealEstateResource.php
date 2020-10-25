<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CountryResource;
use App\Country;


class RealEstateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {   
        $country = new CountryResource(Country::find($this->country_id));
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'country' => $country->name_fr,
            'location' => $this->location,
            'contact' => $this->contact,
            'email' => $this->email,
            'is_actived' => $this->is_actived,
            'is_archived' => $this->is_archived,
            'user_id' => $this->user_id,
            'Medias' => $this->toMedias
        ];
    }
}
