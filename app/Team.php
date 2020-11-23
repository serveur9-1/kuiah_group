<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        "name",
        "picture",
        "link_linkedin",
        "link_twitter",
        "link_facebook",
        "role",
        "biography",
        "project_id",
    ];

    protected $appends = ['picture_url'];

    public function getPictureUrlAttribute()
    {
        $PIC = $this->picture ?? 'default.jpg';

        return asset("public/projects/teams/$PIC");
    }
}
