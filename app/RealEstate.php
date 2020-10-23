<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RealEstate extends Model
{
    protected $fillable = [
        "title",
        "description",
        "price",
        "country_id",
        "location",
        "contact",
        "email",
        "is_actived",
        "is_archived",
        "media_id",
    ];
}
