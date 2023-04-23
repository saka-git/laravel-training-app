<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $groups = Group::all();
        $introduced_groups = DB::select("SELECT invitations.id, group_id, name FROM invitations, groups WHERE invitations.group_id=groups.id and invitations.user_id = $user_id");
        return view('groups.index',compact('groups','introduced_groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
    
        $group = new Group();
        $group->user_id = Auth::id();
        $group->name = $request->input('name');
        $group->save();

        // グループ作成時、作成者がグループに加入
        $group->users()->attach($group->user_id);

        return redirect()->route('groups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group, Request $request)
    {
        $introduced_users = Invitation::where('group_id',$group->id)->get();
        
        $users = User::paginate(20);

        $search = $request->input('search');
                
        $query = User::query();

        if ($search) {
            $spaceConversion = mb_convert_kana($search, 's');
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            foreach($wordArraySearched as $value) {
                $query->where('name', 'like', '%'.$value.'%');
            }
            $users = $query->paginate(20);
        }

        return view('groups.show', compact('group', 'users', 'search', 'introduced_users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $group->user_id = Auth::user()->id;
        $group->name = $request->input('name');
        $group->update();

        return redirect()->route('groups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();
        
        return redirect()->route('groups.index');    }
}