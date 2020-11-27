<?php

namespace App\Http\Controllers\v1;

use App\Http\Resources\ProjectResource;
use App\InvestmentPoint;
use App\Project;
use App\FinancialData;
use App\Tag;
use App\Team;
use App\OtherDoc;
use App\Investor;
use App\Document;
use App\Http\Controllers\Controller;
use App\User;
use App\InterestingProjectStep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Shared\SaveFiles;
use App\Mail\enableOrDisableProject;
use App\Mail\waitAdsValidate;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;



class ProjectController extends Controller
{
    public function __construct(Project $project, SaveFiles $__save)
    {

        //Apply middleware
        $this->middleware('auth:api', [
            'only' => [
                // 'show',
            ]
        ]);

        $this->instance = $project;
        $this->__save = $__save;
    }

    public function index(Request $request)
    {
        return ProjectResource::collection($this->instance->newQuery()->paginate(10));
    }

    public function show($id)
    {
        return response()->json(new ProjectResource($this->instance->newQuery()->find($id)),200);
    }

    //Get project with filters
    public function filtered(Request $request)
    {
        $prj = Project::orderBy('created_at','desc');

        //Project which can interest the current user

        if($request->has('user_id') && $request->filled('user_id'))
        {
            $user = User::where('id', $request->get("user_id"))->first();
            if($user)
            {
                //Filter by user's choosen domains
                $ids = Arr::pluck($user->toDomains, "id");
                $prj = $prj->orWhereIn("domain_id", $ids);

                //filter by user's interesting projects domain_id
                if($user->toInvestor)
                {
                    $ids = Arr::pluck(
                        $user->toInvestor->toInterestedProjects,
                        "domain_id"
                    );

                    if(count($ids) > 0) $prj = $prj->orWhereIn("domain_id", $ids);
                }
            }
        }

        if($request->has('countries') && $request->filled('countries'))
        {
            $prj = $prj->whereIn("country_id", json_decode($request->get('countries'), true));
        }

        if($request->has('domains') && $request->filled('domains'))
        {
            $prj = $prj->whereIn("domain_id", json_decode($request->get('domains'), true));
        }

        if($request->has('stades') && $request->filled('stades'))
        {
            $prj = $prj->whereIn("stade_id", json_decode($request->get('stade_id'), true));
        }

        if($request->has('range') && $request->filled('range'))
        {
            $prj = $prj->whereBetween("total_amount", json_decode($request->get('range'), true));
        }

        $prj = $prj->paginate($request->get('per') ?? 10);

        return ProjectResource::collection($prj);
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

        $request->name = "sande";
        $request->email = "francksande@live.ca";

        // return new waitAdsValidate($request);

        return response()->json($new,200);
    }


    public function update($id, Request $request)
    {
        if(!$request->has('step') || !$request->filled('step'))
        {
            return response()->json(['error'=>'param step not filled'], 401);
        }

        $old = $this->instance->newQuery()->findOrFail($id);

        if($request->get('step') == 1)
        {
            $old->update($request->all());
            return response()->json($old, 200);
        }

        if($request->get('step') == 2)
        {
            $validator = Validator::make($request->all(),
                [
                    'investment_points' => 'required',
                ]
            );

            if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()], 401);
            }

            $old->update($request->all());

            //Update or create investment_points table
            if(is_array($request->get('investment_points')))
            {
                foreach ($request->get('investment_points') as $item)
                {
                    //Update or create current investment if exist nor
                    if(isset($item))
                    {
                        InvestmentPoint::updateOrCreate(
                            [
                                'project_id' => $old->id,
                                'content' => $item
                            ],
                            [
                                'content' => $item
                            ]
                        );
                    }
                }
            }

            //Update or create financial_data table
            if(is_array($request->get('financial_data')))
            {
                foreach ($request->get('financial_data') as $it)
                {
                    $item = json_decode($it, true);
                    //Update or create current investment if exist nor
                    if(isset($item['year']) && isset($item['turnover']) && isset($item['profit']))
                    {
                        FinancialData::updateOrCreate(
                            [
                                'project_id' => $old->id,
                                'year' => $item['year']
                            ],
                            [
                                'year' => $item['year'],
                                'turnover' => $item['turnover'],
                                'profit' => $item['profit'],
                            ]
                        );
                    } else {
                        return response()->json(['error'=>'year, turn, profit are required'], 401);
                    }
                }
            }

            //Update tags table
            if(is_array($request->get('tags')))
            {
                
                foreach ($request->get('tags') as $it)
                {
                    $item = json_decode($it, true);

                    //Update or create current investment if exist nor
                    if(isset($item))
                    {
                        Tag::updateOrCreate(
                            [
                                'project_id' => $old->id,
                                'title' => $item
                            ],
                            [
                                'title' => $item
                            ]
                        );
                    }
                }
            }

            return response()->json($old, 200);
        }

        if($request->get('step') == 3)
        {
            $old->update($request->all());
            $pic = null;

            //Update or create investment_points table
            if(is_array($request->get('teams')))
            {

                //Upload profile picture
                if ($files = $request->file("teamPictures")) {
                    $pic = $this->__save->save(true, "projects/teams", "teamPictures", "team_pic_$old->id". now(), $request);
                }

                //dd($request->all());
                foreach ($request->get('teams') as $key => $ite)
                {
                    $item = json_decode($ite, true);

                    //Update or create current teams if exist nor
                    if(isset($item['name']) && isset($item['role']))
                    {

                        Team::updateOrCreate(
                            [
                                'project_id' => $old->id,
                                'id' => $item['team_id'],
                            ],
                            [
                                'name' => $item['name'],
                                "role" => $item['role'],
                                "picture" => $pic[$key+1] ?? null,
                                "link_linkedin" => $item['link_linkedin'] ?? null,
                                "biography" => $item['biography'] ?? null,
                            ]
                        );
                    } else {
                        return response()->json(['error'=>'name and role are required'], 401);
                    }
                }
            }
        }

        $logo = null;
        $cover = null;

        if($request->get('step') == 4)
        {
            try {

                if ($request->file('logo')) {

                    $logo = $this->__save->save(true,"projects/media", "logo", "logo_$old->id", $request);
                    // $data[0] return 1st item of array which verify if there are many files (true if an array)
                    //Update logo
                    $old->update([
                        "logo" => $logo[2],
                    ]);
                }

                if ($request->file('cover')) {

                    $cover = $this->__save->save(true,"projects/media", "cover", "cover_$old->id" ,$request);
                    // $data[0] return 1st item of array which verify if there are many files (true if an array)

                    $old->update([
                        "banner" => $cover[2],
                    ]);

                }

                return response()->json([
                    "success" => true,
                    "message" => "Logo and Cover are successfully uploaded",
                ],200);

            } catch (Exception $exception) {
                return response()->json($exception->getMessage(),$exception->getCode());
            }
        }

        if($request->get('step') == 5)
        {
            try {

                if ($request->file('documents')) {
                    $docs = $this->__save->save(true,"projects/documents", "documents", "doc_project_$old->id", $request);
                    // $data[0] return 1st item of array which verify if there are many files (true if an array)
                    //Update logo
                    if($docs[0]){
                        for($i = 1; $i < count($docs); $i++)
                        {
                            Document::updateOrCreate(
                                [
                                    'project_id' => $old->id,
                                    'title' => $docs[$i]
                                ],
                                [
                                    'title' => $docs[$i],
                                ]
                            );
                        }

                        return response()->json([
                            "success" => true,
                            "message" => "Documents are successfully uploaded",
                        ],200);
                    }
                } else {
                    return response()->json([
                        "success" => false,
                        "message" => "Documents are not files",
                    ],401);
                }

            } catch (Exception $exception) {
                return response()->json($exception->getMessage(),$exception->getCode());
            }
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

    public function destroy($id)
    {

        $selected = $this->instance->newQuery()->findOrFail($id);

        $selected->update([
            'is_deleted' => true
        ]);

        return response()->json(["message" => "Project is deleted"],200);
    }


    //When admin able or disable a project #Lorsque l'admin active ou désactive un projet.

    public function switchStatus($id, Request $request)
    {
        $selected = $this->instance->newQuery()->findOrFail($id);

        $selected->update([
            'is_actived' => !$selected->is_actived
        ]);

        // new UserResource($selected)

        // Send mail

        if($selected->is_first_activation)
        {
            $selected->update([
                'is_first_activation' => false
            ]);
        }

        $selected->is_fr = $request->is_fr;

        $selected->name = "sande";
        $selected->email = "francksande@live.ca";

        // new ProjectResource($selected);

        return new ProjectResource($selected);

    }


    //When user archives or actives his project.

    public function archiveProject($id, Request $request)
    {
        $selected = $this->instance->newQuery()->findOrFail($id);

        $selected->update([
            'is_archived' => !$selected->is_archived
        ]);

        $status = !$selected->is_archived? 'actived' : 'archived';

        // new UserResource($selected)

        // Send mail

        $selected->is_fr = $request->is_fr;

        $selected->name = "sande";
        $selected->email = "francksande@live.ca";

        return response()->json(["message" => "Project has been $status"],200);

    }


    //Add a project to my interessing projects
    public function itInterestMe($id, Request $request)
    {
        $project = Project::find($id);

        if(!$project)
        {
            return response()->json(["message" => "Project not found"],401);
        }

        if($request->user())
        {
            $investor = Investor::where('user_id', $request->user()->id)->first();

            if(!$request->has("interestMe"))
            {
                return response()->json(["message" => "interestMe @boolean is required"],401);
            }

            $firstStep = InterestingProjectStep::first();
            if(!$firstStep)
            {
                return response()->json(["message" => "interesting project steps are empty"],401);
            }

            if($request->get("interestMe"))
            {
                $investor->toInterestedProjects()->attach($project, ["interesting_project_step_id" => $firstStep->id]);

                $request->user()->add_friend($project->toUser->id); //Networking
                //Notify here

                return response()->json(["message" => "Added from interesting projects"],200);

            } else {

                $investor->toInterestedProjects()->detach($project);

                return response()->json(["message" => "Removed from interesting projects"],200);
            }
        }
    }

    //Change project looking step for investor (for example study documents ...)
    public function changeStep($id, Request $request)
    {
        if(!$request->has("interesting_project_step_id"))
        {
            return response()->json(["message" => "interesting_project_step_id is required"],401);
        }

        $stepInfo = InterestingProjectStep::find($request->get("interesting_project_step_id"));

        if(!$stepInfo)
        {
            return response()->json(["message" => "Step not found"],401);
        }

        $project = $this->instance->newQuery()->findOrFail($id);

        if($request->user())
        {
            $investor = Investor::where('user_id', $request->user()->id)->first();
            $investor->toInterestedProjects()->updateExistingPivot($project, ["interesting_project_step_id" => $request->get("interesting_project_step_id")]);
            //Notify project owner
            return response()->json(["message" => "At this step: ". Str::lower($stepInfo->name_fr)],200);
        }
    }

}
