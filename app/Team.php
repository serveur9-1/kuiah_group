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
}
