<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CountryResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\StadeResource;
use App\Http\Resources\DomainResource;

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
            "logo_url" => asset("public/projects/media/$this->logo_url"),
            "banner" => asset("public/projects/media/$this->banner"),
            "market" => $this->market,
            "proof_or_progres" => $this->proof_or_progres,
            "business_plan_doc" => $this->business_plan_doc,
            "financial_data_doc" => $this->financial_data_doc,
            "objective" => $this->objective,
            "executive_summary_doc" => $this->executive_summary_doc,
            "executive_summary" => $this->executive_summary,
            "offer" => $this->offer,
            "is_actived" => $this->is_actived,
            "is_archived" => $this->is_archived,
            "has_drafted" => $this->has_drafted,
            "user" => new UserResource($this->toUser),
            "country" => new CountryResource($this->toCountry),
            "domain" => new DomainResource($this->toDomain),
            "stade" => new StadeResource($this->toStade),
            "investment_points" => $this->toInvestmentPoints,
            "financial_data" => $this->toFinancialDatas,
            "tags" => $this->toTags,
            "teams" => $this->toTeams,
            "medias" => $this->toOtherDocs,
            "documents" => $this->toDocuments,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
