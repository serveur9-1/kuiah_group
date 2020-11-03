<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        "name_fr",
        "name_en",
        "is_actived"
    ];

}
