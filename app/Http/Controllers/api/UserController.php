<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private $sendParams = ['name', 'lastname', 'avatar', 'slug', 'phone', 'presentation', 'detailed_description', 'birthday_date', 'id' ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::query()->where('is_available', '1');

        if($request->has('search')){
            $users->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('lastname', 'like', '%' . $request->search . '%');
        }

        $users = $users->paginate(15, $this->sendParams);

        foreach ($users as $user) {
            $user->skills->makeHidden(['pivot', 'updated_at', 'created_at']);// hide pivot table
            $sponsorRecord = DB::table('sponsor_user')->where( 'user_id','=', $user->id )->orderByDesc('created_at')->first() ;
            if ( $sponsorRecord == null ||  $sponsorRecord->expire_date < date('Y-m-d H:i:s') ) {
                $isUserSponsorized = false;
            }
            else  {
                $isUserSponsorized = true;
             }
            $user->is_sponsorized = $isUserSponsorized;

        }
        return response($users);


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
        $user = User::find($id);
        $user = $user->makeHidden(['password', 'remember_token', 'created_at', 'updated_at', 'email_verified_at', 'id']); // hide useless params
        $user->skills->makeHidden(['created_at', 'updated_at', 'pivot', 'category_id', 'description', 'image', 'slug']); // hide pivot table
        $user->reviews->makeHidden(['created_at', 'updated_at', 'pivot', 'id', 'user_id']); // hide pivot table
        return response($user);
    }
}
