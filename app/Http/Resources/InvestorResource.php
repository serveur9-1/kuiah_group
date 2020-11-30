<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvestorResource extends JsonResource
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
            "id" => $this->id,
            "id" => $this->id,
            "is_investor" => $this->is_investor,
            "receive_mail" => $this->receive_mail,
            "is_deleted" => $this->is_deleted,
            "country" => $this->country,
            "city" => $this->city,
            "f_number" => $this->f_number,
            "p_number" => $this->p_number,
            "linkedin" => $this->f_number,
            "twitter" => $this->twitter,
            "facebook" => $this->facebook,
            "biography" => $this->biography,
            "website" => $this->website,
            "company_name" => $this->company_name,
            "role" => $this->role,
            "domain" => $this->domain,
            "min" => $this->min,
            "max" => $this->max,
            "min_format" => $this->min_format,
            "max_format" => $this->max_format,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "interessed_projects" => ProjectResource::collection($this->toInterestedProjects)
        ];
    }
}
