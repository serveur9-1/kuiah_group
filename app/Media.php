<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    public $timestamps = false;

    protected $fillable = [
        "name",
        "real_estate_id",
    ];
    protected $table = "medias";

    protected $appends = ['img_url'];

    public function getImgUrlAttribute()
    {
        return asset("public/realestates/$this->name");
    }
}
