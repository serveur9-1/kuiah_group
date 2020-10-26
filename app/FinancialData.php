<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinancialData extends Model
{
    protected $table = "financial_datas";
    protected $fillable = [
        "year",
        "turnover",
        "profit",
        "project_id",
    ];
}
