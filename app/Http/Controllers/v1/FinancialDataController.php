<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FinancialData;

class FinancialDataController extends Controller
{
    public function __construct(FinancialData $instance)
    {
        $this->instance = $instance;
    }

    public function destroy($id)
    {
        $selected = $this->instance->newQuery()->findOrFail($id);
        $selected->delete();
        return response()->json(null,200);
    }
}
