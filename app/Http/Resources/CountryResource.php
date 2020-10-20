<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
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
            'name' => $request->get('is_fr')?  $this->name_fr :  $this->name_en,
            'name_fr' => $this->name_fr,
            'name_en' => $this->name_en,
        ];
    }
}
