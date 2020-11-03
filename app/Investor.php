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
        return number_format($this->min, 2, '.', ',')." €";
    }

    public function getMaxFormatAttribute()
    {
        return number_format($this->max, 2, '.', ',')." €";
    }

    public function toInterestedProjects()
    {
        return $this->belongsToMany('App\Project');
    }

    public function toProjects()
    {
        return $this->belongsToMany('App\Project');
    }
}
