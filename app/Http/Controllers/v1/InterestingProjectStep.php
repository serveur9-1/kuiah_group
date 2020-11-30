<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\InterestingProjectStep;
use App\Http\Resources\InterestingProjectStepResource;

class InterestingProjectStepController extends Controller
{
    public function __construct(InterestingProjectStep $instance)
    {
        $this->instance = $instance;
    }

    public function index (Request $r)
    {
        return response()->json(
            InterestingProjectStepResource::collection($this->instance->newQuery()->get()),
            200
        );
    }
}
