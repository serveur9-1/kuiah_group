<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = "projects";

    protected $fillable = [
        "title",
        "website",
        "investor_role",
        "total_amount",
        "min_amount",
        "amount_insured",
        "company_description",
        "team_description",
        "company_name",
        "logo",
        "banner",
        "market",

        "proof_or_progres",
        "business_plan_doc",
        "financial_data_doc",
        "objective",
        "executive_summary_doc",
        "executive_summary",
        "offer",
        "is_actived",
        "has_drafted",
        "user_id",
        "country_id",
        "domain_id",
        "stade_id",
    ];

    public function toTags()
    {
        return $this->hasMany('App\Tag');
    }

    public function toUser()
    {
        return $this->belongsTo('App\User');
    }

    public function toCountry()
    {
        return $this->belongsTo('App\User');
    }
}
