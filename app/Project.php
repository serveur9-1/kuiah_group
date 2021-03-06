<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


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
        "is_archived",
        "has_drafted",
        "is_first_activation",
        "user_id",
        "country_id",
        "domain_id",
        "stade_id",
        "is_deleted"
    ];

    protected $appends = ['progressbar'];

    public function toTags()
    {
        return $this->hasMany('App\Tag');
    }

    public function toUser()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function toCountry()
    {
        return $this->belongsTo('App\Country', 'country_id');
    }

    public function toDomain()
    {
        return $this->belongsTo('App\Domain', 'domain_id');
    }

    public function toStade()
    {
        return $this->belongsTo('App\Stade', 'stade_id');
    }

    public function toInvestmentPoints()
    {
        return $this->hasMany('App\InvestmentPoint');
    }

    public function toFinancialDatas()
    {
        return $this->hasMany('App\FinancialData');
    }

    public function toTeams()
    {
        return $this->hasMany('App\Team');
    }

    public function toOtherDocs()
    {
        return $this->hasMany('App\OtherDoc');
    }

    public function toDocuments()
    {
        return $this->hasMany('App\Document');
    }

    public function itInterestMe()
    {
        return $this->belongsToMany('App\Investor')->where('user_id', Auth::guard("api")->user()->id ?? null);
    }

    public function getProgressbarAttribute()
    {
        if($this->total_amount && $this->amount_insured)
        {
            return intval((intval($this->amount_insured) * 100) / intval($this->total_amount));
        } else {
            return 0;
        }
    }

    public function getImOwnerAttribute()
    {
        $user_id = Auth::guard("api")->user()->id ?? null;
        return $this->toUser->id == $user_id;
    }

}
