<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stade extends Model
{
    protected $fillable = [
        "name_fr",
        "name_en",
    ];
}
