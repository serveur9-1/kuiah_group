<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        "object",
        "content",
        "status",
        "investor_id",
    ];
}