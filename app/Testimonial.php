<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        "name",
        "company",
        "content",
        "is_show"
    ];
}
