<?php

namespace App\Http\Controllers\v1;
use App\Http\Resources\UserResource;
use App\User;
use App\Domain;
use App\Shared\SaveFiles;
use App\Http\Controllers\Controller;
use App\Mail\WelcomeToYou;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\waitAccountValidate;
use App\Mail\waitAdsValidate;
use App\Mail\enableOrDisableAccount;

class UserController extends Controller
{
    // http://localhost:8000/api/v1/users/mail/test?lang=en
    public function testMail(Request $request)
    {
        /*
         * @param array
         *  email: string
         *  name: string*/

        $request->email = "ymjm97@gmail.com";
        $request->name = "Yves";
        $request->title = "le tueur qui tue";
        $request->img = "http://localhost:8000/public/partners/kuiahfinance_profil.jpeg";
        $request->description = "le tueur qui tue";

        //Mail::send(new WelcomeToYou($request));

        //send salutation
         return new waitAdsValidate($request);


     }

    public function __construct(User $user, SaveFiles $__save)
    {
        $this->instance = $user;
        $this->__save = $__save;
    }

    /*
     * Params
     * @bool is_investor
     * @bool paginate
     * @int per
     *  */
    public function index(Request $request)
    {
        $this->r = $request;

        $prj = User::orderBy('created_at','desc');

        //When not a guest
        if($request->user())
        {
            //when not admin
            if($request->user()->is_investor)
            {
                if($request->user()->toInvestor->is_investor)
                {

                    $prj = $prj->whereHas('toInvestor', function ($query) {
                        $query->where("is_investor", false);
                    });

                } else {

                    $prj = $prj->whereHas('toInvestor', function ($query) {
                        $query->where("is_investor", true);
                    });

                }

            } else {
                $prj = $prj->whereHas('toInvestor', function ($query) {
                    $query->where("is_investor", filter_var($this->r->get("investor"), FILTER_VALIDATE_BOOLEAN));
                });

            }
        } else {

            if($request->filled("investor"))
            {
                $prj = $prj->whereHas('toInvestor', function ($query) {
                    $query->where("is_investor", filter_var($this->r->get("investor"), FILTER_VALIDATE_BOOLEAN));
                });

            } else {
                $prj = $prj->where("is_investor", true);
            }
        }

        if(filter_var($request->get("paginate"), FILTER_VALIDATE_BOOLEAN))
        {
            $prj = $prj->paginate($request->get("per") ?? 10);

            return UserResource::collection($prj);
        }

        $prj = $prj->get();

        return response()->json(UserResource::collection($prj), 200);
    }

    public function show($id)
    {
        $selected = $this->instance->newQuery()->find($id);
        return response()->json(new UserResource($selected),200);
    }

    public function update($id, Request $request)
    {
        $selected = $this->instance->newQuery()->findOrFail($id);

        $selected->update($request->all());

        return response()->json(new UserResource($selected), 200);
    }

    public function destroy($id)
    {
        $selected = $this->instance->newQuery()->findOrFail($id);

        $selected->update([
            'is_archived' => true
        ]);

        $selected->is_archived = true;

        return response()->json(new UserResource($selected), 200);
    }

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

        return new enableOrDisableAccount($selected);

    }

    //Upload profile picture

    public function uploadProfilePicture(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'profil' => 'required|max:2048',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        if ($files = $request->file('profil')) {

            $data = $this->__save->save(true,"profiles", "profil", $request->get("profil"), $request);
            // $data[0] return 1st item of array which verify if there are many files (true if an array)
            $id = auth()->user()->id;
            $old = $this->instance->newQuery()->findOrFail($id);

            $old->update($request->all());

            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "profil" => asset($data[1])
            ]);

        }
    }

    //My domains

    public function addDomain(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'domains' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        if($request->user())
        {
            if(is_array($request->get('domains')))
            {
                $request->user()->toDomains()->sync($request->get('domains'));
                return response()->json(['message' => 'Added successful'],200);
            }
        }
    }

}
