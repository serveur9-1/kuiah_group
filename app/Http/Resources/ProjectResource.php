<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CountryResource;
use App\Http\Resources\UserResource;

class ProjectResource extends JsonResource
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
            "title" => $this->title,
            "website" => $this->website,
            "investor_role" => $this->investor_role,
            "total_amount" => $this->total_amount,
            "min_amount" => $this->min_amount,
            "amount_insured" => $this->amount_insured,
            "company_description" => $this->company_description,
            "team_description" => $this->team_description,
            "company_name" => $this->company_name,
            "logo" => $this->logo,
            "banner" => $this->banner,
            "market" => $this->market,
            "proof_or_progres" => $this->proof_or_progres,
            "business_plan_doc" => $this->business_plan_doc,
            "financial_data_doc" => $this->financial_data_doc,
            "objective" => $this->objective,
            "executive_summary_doc" => $this->executive_summary_doc,
            "executive_summary" => $this->executive_summary,
            "offer" => $this->offer,
            "is_actived" => $this->is_actived,
            "has_drafted" => $this->has_drafted,
            "user" => new UserResource($this->toUser),
            "country" => new CountryResource($this->toCountry),
            "domain_id" => $this->domain_id,
            "stade_id" => $this->stade_id,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}