<?php

namespace App\Http\Controllers\v1;

use App\Team;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function __construct(Team $instance)
    {
        $this->instance = $instance;
    }

    public function destroy($id)
    {
        $selected = $this->instance->newQuery()->findOrFail($id);
        $selected->delete();

        return response()->json([
            "success" => true,
            "message" => "Deleted successfully",
        ],200);
        
    }
}
