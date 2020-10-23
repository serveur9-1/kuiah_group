<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    protected $fillable = [
        "name_fr",
        "name_en",
    ];

    public function toDomains()
    {
        return $this->hasMany('App\Domain');
    }
}
