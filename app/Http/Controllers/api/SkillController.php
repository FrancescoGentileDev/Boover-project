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
        $skills = Skill::all(['id', 'name', 'description', 'image', 'created_at', 'slug']);
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

        $skill = Skill::find($id, ['id', 'name', 'description', 'image', 'created_at', 'slug']);



        return response($skill);
    }

}
