<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CountryResource;
use App\Http\Resources\UserSimpleResource;
use App\Country;
use App\User;


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
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'price_format' => number_format($this->price, 0, '.', ',')." €",
            'country' => new CountryResource(Country::find($this->country_id)),
            'location' => $this->location,
            'contact' => $this->contact,
            'email' => $this->email,
            'is_actived' => $this->is_actived,
            'is_archived' => $this->is_archived,
            'is_deleted' => $this->is_deleted,
            "is_first_activation" => $this->is_first_activation,
            'created_at' => $this->created_at->format('d-m-Y'),
            'updated_at' => $this->updated_at->format('d-m-Y'),
            'user' => new UserSimpleResource(User::find($this->user_id)),
            'medias' => $this->toMedias
        ];
    }
}
