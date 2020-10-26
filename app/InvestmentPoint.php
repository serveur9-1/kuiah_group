<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvestmentPoint extends Model
{
    protected $fillable = [
        'content',
        'project_id'
    ];
}
