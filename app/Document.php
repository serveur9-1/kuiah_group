<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'title',
        'project_id',
        "original_name",
        "extension",
        "size",
    ];
}
