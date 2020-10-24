<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        "name",
        "real_estate_id",
    ];
    protected $table = "medias";
}
