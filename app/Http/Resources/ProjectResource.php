<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CountryResource;
use App\Http\Resources\UserSimpleResource;
use App\Http\Resources\StadeResource;
use App\Http\Resources\DomainSimpleResource;
use App\Country;
use App\Stade;
use App\Domain;


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
        $LOGO = $this->logo ?? 'default.jpeg';
        $BANNER = $this->banner ?? 'default.jpeg';

        return [
            "id" => $this->id,
            "title" => $this->title,
            "website" => $this->website,
            "investor_role" => $this->investor_role,
            "total_amount" => $this->total_amount,
            "total_amount_format" => number_format($this->total_amount, 0, '.', ',')." €",
            "min_amount" => $this->min_amount,
            "min_amount_format" => number_format($this->min_amount, 0, '.', ',')." €",
            "amount_insured" => $this->amount_insured,
            "amount_insured_format" => number_format($this->amount_insured, 0, '.', ',')." €",
            "progressbar" => $this->progressbar,
            "company_description" => $this->company_description,
            "team_description" => $this->team_description,
            "company_name" => $this->company_name,
            "logo_url" => asset("public/projects/media/$LOGO"),
            "banner" => asset("public/projects/media/$BANNER"),
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
            "is_first_activation" => $this->is_first_activation,
            "user" => new UserSimpleResource($this->toUser),
            "country" => new CountryResource($this->toCountry),
            "domain" => new DomainSimpleResource($this->toDomain),
            "stade" => new StadeResource($this->toStade),
            "investment_points" => $this->toInvestmentPoints,
            "financial_data" => $this->toFinancialDatas,
            "tags" => $this->toTags,
            "teams" => $this->toTeams,
            "medias" => $this->toOtherDocs,
            "documents" => $this->toDocuments,
            "created_at" => $this->created_at,
            "created_at_format" => $this->created_at->format('d-m-Y'),
            "updated_at" => $this->updated_at,
            "updated_at_format" => $this->updated_at->format('d-m-Y'),
            'interesting_project_step_id' => $this->whenPivotLoaded('investor_project', function () {
                return $this->pivot->interesting_project_step_id;
            }),
            "it_interest_me" => count($this->itInterestMe) > 0,
            "im_owner" => $this->im_owner,
        ];
    }
}
