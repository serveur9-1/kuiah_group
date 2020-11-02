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

    protected $appends = ['turnover_format', 'profit_format'];

    public function getTurnoverFormatAttribute()
    {
        return number_format($this->turnover, 2, '.', ',')." €";
    }

    public function getProfitFormatAttribute()
    {
        return number_format($this->profit, 2, '.', ',')." €";
    }

}
