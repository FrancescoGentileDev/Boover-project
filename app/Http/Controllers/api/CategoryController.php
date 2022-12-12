<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Category;
use App\models\Skill;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all(['id', 'name', 'image', 'slug', 'description']);

        foreach($categories as $category) {
           $skills = Skill::query()->where('category_id', '=', $category->id)->get()->makeHidden(['created_at', 'updated_at']);
           $category->skills = $skills;
        }

        return response($categories);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $category = Category::find($id);
        $skills = Skill::query()->where('category_id', '=', $category->id)->get()->makeHidden(['created_at', 'updated_at']);
        $category->skills = $skills;

        return response($category);


    }
}
