<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    protected $fillable = [
        "is_investor",
        "receive_mail",
        "is_deleted",
        "country",
        "city",
        "f_number",
        "p_number",
        "linkedin",
        "twitter",
        "facebook",
        "biography",
        "website",
        "company_name",
        "role",
        "domain",
        "min",
        "max",
        "user_id",
    ];

    public function toInterestedProjects()
    {
        return $this->belongsToMany('App\Project');
    }
}
