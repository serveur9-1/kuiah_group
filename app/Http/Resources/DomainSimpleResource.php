<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DomainSimpleResource extends JsonResource
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
            'name' => $request->get('is_fr')?  $this->name_fr :  $this->name_en,
            'name_fr' => $this->name_fr,
            'name_en' => $this->name_en,
            'img_url' => asset("public/domains/$this->img"),
            'created_at' => $this->created_at->format('d-m-Y'),
            'updated_at' => $this->updated_at->format('d-m-Y'),
            'industry_id' => $this->toIndustry->id
        ];
    }
}
