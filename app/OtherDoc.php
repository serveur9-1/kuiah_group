<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherDoc extends Model
{
    protected $fillable = [
        "title",
        "project_id",
    ];
}
