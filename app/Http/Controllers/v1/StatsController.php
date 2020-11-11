<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use App\RealEstate;
use App\User;
use App\Http\Resources\StatsResource;

class StatsController extends Controller
{
    public function index()
    {
        $selected = Project::count();

        $selected->real = RealEstate::count();

        // $u = new StatsResource($selected);

        return response()->json($selected,200);

    }
}
