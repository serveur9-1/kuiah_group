<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherDoc extends Model
{
    public $timestamps = false;

    protected $fillable = [
        "title",
        "project_id",
    ];
}
