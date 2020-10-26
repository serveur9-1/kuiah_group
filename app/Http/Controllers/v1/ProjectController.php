<?php

namespace App\Http\Controllers\v1;

use App\Http\Resources\ProjectResource;
use App\InvestmentPoint;
use App\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function __construct(Project $project)
    {
        $this->instance = $project;
    }

    public function index()
    {
        return response()->json(ProjectResource::collection($this->instance->newQuery()->get()),200);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'title' => 'required',
                'user_id' => 'required',
                'country_id' => 'required',
                'domain_id' => 'required',
                'stade_id' => 'required',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $new = $this->instance->newQuery()->create($request->all());

        return response()->json($new,200);
    }


    public function update($id, Request $request)
    {

        if(!$request->has('step') || !$request->filled('step'))
        {
            return response()->json(['error'=>'param step not filled'], 401);
        }

        $old = $this->instance->newQuery()->findOrFail($id);

        dd(InvestmentPoint::where('project_id', $old->id));

        if($request->get('step') == 1)
        {
            $old->update($request->all());
            return response()->json($old, 200);
        }

        if($request->get('step') == 2)
        {
            $old->update($request->all());

            //Update or create investment_points table
            if(is_array($request->get('investment_points')))
            {
                foreach ($request->get('investment_points') as $item)
                {
                    InvestmentPoint::create([
                        'content' => $item,
                        'project_id' => $old->id
                    ]);
                }
            }
            return response()->json($old, 200);
        }

        if($request->get('step') == 3)
        {

        }

    }

    //When user publish her project #Lorsqu'un utilisateur publish son projet.
    public function publish($id)
    {
        $selected = $this->instance->newQuery()->find($id);

        $selected->update([
            'has_drafted' => false
        ]);

        return response()->json(new ProjectResource($selected),200);
    }


    //When admin able or disable a project #Lorsque l'admin active ou désactive un projet.
    public function switch($id)
    {
        $selected = $this->instance->newQuery()->find($id);

        $selected->update([
            'has_drafted' => !$selected->has_drafted
        ]);

        return response()->json(new ProjectResource($selected),200);
    }

}
