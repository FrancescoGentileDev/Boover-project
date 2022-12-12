<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $skills = Skill::all(['id', 'name', 'description', 'image', 'created_at']);
        return response($skills);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        //
        $search = explode('-', $request->search);

        $skill = Skill::find($id, ['id', 'name', 'description', 'image', 'created_at', ]);
        $skill->users = $skill->users()->where('is_available', '=', '1');


        if($request->has('search')) {
        foreach($search as $param)
        {
            $skill->users ->whereRaw("concat(name, ' ', lastname) like '%" .$param. "%' ");
        }

    }


        $skill->users = $skill->users->paginate(10, ['name', 'lastname', 'avatar', 'slug', 'phone', 'presentation', 'detailed_description', 'birthday_date', 'id',]);

        foreach ($skill->users as $user) {
            $sponsorRecord = DB::table('sponsor_user')->where( 'user_id','=', $user->id )->orderByDesc('created_at')->first();
            if ( $sponsorRecord == null ||  $sponsorRecord->expire_date < date('Y-m-d H:i:s') ) {
                $isUserSponsorized = false;
            }
            else  {
                $isUserSponsorized = true;
             }
            $user->is_sponsorized = $isUserSponsorized;

        }

        return response($skill);
    }

}
