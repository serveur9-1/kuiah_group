<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected  $table = "domains";

    protected $fillable = [
        "name_fr",
        "name_en",
        "img",
        "industry_id",
    ];

    public function toProjects()
    {
        return $this->hasMany('App\Project');
    }

    public function toIndustry()
    {
        return $this->belongsTo('App\Industry', 'industry_id');
    }
    

}
