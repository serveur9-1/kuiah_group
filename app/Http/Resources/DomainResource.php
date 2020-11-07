<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DomainResource extends JsonResource
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
            'industry' => $this->industry_id,
            'img_url' => asset("public/domains/$this->img"),
            "projects" => ProjectResource::collection($this->toProjects),
            'created_at' => $this->created_at->format('d-m-Y'),
            'updated_at' => $this->updated_at->format('d-m-Y'),
        ];
    }
}
