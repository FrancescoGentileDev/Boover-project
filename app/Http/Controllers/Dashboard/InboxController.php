<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\models\Inbox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.inboxes.index', [
            'inboxes' => Inbox::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function show(Inbox $inbox)
    {
        if (Auth::id() === $inbox->user_id) {
            return view('dashboard.inboxes.show', compact('inbox'));
        } else {
            return redirect()->route('dashboard.inboxes.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function edit(Inbox $inbox)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inbox $inbox)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inbox $inbox)
    {
        //   Inbox::destroy($inbox);
        $inbox->delete();
        return redirect()->route('dashboard.inboxes.index');
    }
}
