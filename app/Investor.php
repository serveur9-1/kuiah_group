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

    protected $appends = ['min_format', 'max_format'];

    public function getMinFormatAttribute()
    {
        return number_format($this->min, 0, '.', ',')." €";
    }

    public function getMaxFormatAttribute()
    {
        return number_format($this->max, 0, '.', ',')." €";
    }

    public function toInterestedProjects()
    {
        return $this->belongsToMany('App\Project')->withPivot("interesting_project_step_id");
    }
}
